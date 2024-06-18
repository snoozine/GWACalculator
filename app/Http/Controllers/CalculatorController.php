<?php

namespace App\Http\Controllers;

use App\Models\Computation;
use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Profile;
use App\Models\Target;

use Illuminate\Support\Facades\Auth;

class CalculatorController extends Controller
{
    public function compute()
    {
        $id = Auth::id();
        $data = [];

        for ($year = 1; $year <= 4; $year++) {
            $yearData = Year::where('year', $year)->where('user_id', $id)->orderBy('term', 'asc')->get();
            if ($yearData->isNotEmpty()) {
                $data[$year] = $yearData;
            }
        }
        return view('compute', compact('data'));
    }


    public function computation($id)
    {
        $uid =  Auth::id();
        $module = Year::where('id', $id)->first();
        if (!$module) {
            return redirect()->route('compute');
        }
        $profile = Profile::where('user_id', $uid)->first();
        $num =  $module->subjects;
        $computation = Computation::where('user_id', $uid)->where('year', $module->year)->where('term', $module->term)->first();
        $target = Target::where('user_id', $uid)->where('year', $module->year)->where('term', $module->term)->first();

        $finals = [];
        if ($computation) {
            $midterms = explode(',', $computation->midterm);
            $subject = explode(',', $computation->subject);

            $units = explode(',', $computation->units);
            $totalunits = array_sum(array_map('intval', $units));
            $midtermsCount = count($midterms);
            $currentGrades = array_map('floatval', $midterms);

            if ($computation->finals === NULL) {
                $finals = NULL;
                $text = "midterms.";
            } else {
                $finals = explode(',', $computation->finals);
                $text = "finals.";
            }

            if ($target) {
                $targetGwa = $target->gwa;
                $gwa = $computation->total;
                $divide = $gwa / $targetGwa;
                $total = $divide * 100;
                $target->percentage = round($total, 2);


                if ($finals == NULL) {
                    $TotalGrades = array_sum(array_map('intval', $midterms));
                    $remaining = explode(',', $computation->midterms);
                    $subjects = explode(',', $computation->midterms);
                    $gradescount = count(array_filter($midterms, function ($value) {
                        return trim($value) !== '';
                    }));
                    $remaining = 0;
                    foreach ($subjects as $grade) {
                        if ($grade === '' || $grade === null) {
                            $remaining++;
                        }
                    }
                } else {
                    $TotalGrades = array_sum(array_map('intval', $finals));
                    $remaining = explode(',', $computation->finals);
                    $finals = explode(',', $computation->finals);
                    $subjects = explode(',', $computation->finals);
                    $gradescount = count(array_filter($finals, function ($value) {
                        return trim($value) !== '';
                    }));

                    $remaining = 0;
                    foreach ($subjects as $grade) {
                        if ($grade === ' ' || $grade === null) {
                            $remaining++;
                        }
                    }
                }


                $currentAverage = $gwa;
                $possibleGrades = [1, 1.5, 2, 2.5, 3, 3.5, 4];
                $totalCurrentGradePoints = $TotalGrades;
                $roundedGrade = '';
                if ($remaining > 0) {
                    $totalRequiredGradePoints = ($gradescount + $remaining) * $targetGwa;
                    $requiredGradePointsForRemaining = $totalRequiredGradePoints - $totalCurrentGradePoints;
                    $possibleGrades = [1, 1.5, 2, 2.5, 3, 3.5, 4];
                    $totalneededGrades = $requiredGradePointsForRemaining / $remaining;
                    function closestGrade($neededGrade, $possibleGrades)
                    {

                        if ($neededGrade > 4) {
                            return "Even you got 4 in remainig subject you can't reach you target GWA for ";
                        }
                        foreach ($possibleGrades as $grade) {
                            if ($grade >= $neededGrade) {
                                return "You need to get a grade of " . $grade . " on the remaining subjects for";
                            }
                        }
                        return end($possibleGrades);
                    }

                    $roundedGrade = closestGrade($totalneededGrades, $possibleGrades);
                }
                return view('computation', compact('module', 'profile', 'computation', 'midterms', 'subject', 'finals', 'units', 'totalunits', 'target', 'roundedGrade', 'text'));
            } else {
                return view('computation', compact('module', 'profile', 'computation', 'midterms', 'subject', 'finals', 'units', 'totalunits', 'target'));
            }
        } else {
            return view('computation', compact('module', 'profile', 'computation'));
        }
    }


    public function submitComputation(Request $request)
    {

        $uid =  Auth::id();
        $subjects = $request->input('subjects');
        $grades = $request->input('grades');
        $units = $request->input('units');
        $total = array_sum($grades);
        $count = count($grades);
        $average = $count > 0 ? round($total / $count, 2) : 0;

        $year = Year::where('user_id', $uid)->where('year', $request->year)->where('term', $request->term)->first();
        $id = $year->id;
        $gradesString = implode(', ', $grades);
        $subjectsString = implode(', ', $subjects);
        $unitStrings = implode(', ', $units);

        $compute = Computation::where('user_id', $uid)->where('year', $request->year)->where('term', $request->term)->first();
        if ($compute) {
            return redirect()->back()->with('error');
        } else {
            Computation::create([
                'user_id' => Auth::id(),
                'year' => $request->year,
                'term' => $request->term,
                'subject' => $subjectsString,
                'midterm' => $gradesString,
                'units' => $unitStrings,
                'total' => $average,
            ]);
        }

        return redirect()->route('computation', compact('id'));
    }

    public function submitEdit(Request $request)
    {
        $grades = $request->input('final');
        $total = array_sum($grades);
        $count = count($grades);
        $average = $count > 0 ? round($total / $count, 2) : 0;
        $gradesString = implode(', ', $grades);
        Computation::where('id', $request->id)->update([
            'finals' => $gradesString,
            'total' => $average,
        ]);

        return redirect()->back()->with('success');
    }


    public function submitgrades(Request $request)
    {
        $grades = $request->input('grades');
        $finals = $request->input('final');

        $finalscheck = Computation::where('id', $request->id)->first();
        if ($finalscheck->finals == NULL) {

            $total = array_sum($grades);
            $count = count($grades);
            $average = $count > 0 ? round($total / $count, 2) : 0;
            $gradesString = implode(', ', $grades);

            Computation::where('id', $request->id)->update([
                'midterm' => $gradesString,
                'total' => $average,
            ]);
        } else {
            $total = array_sum($finals);
            $count = count($finals);
            $average = $count > 0 ? round($total / $count, 2) : 0;
            $gradesfinals = implode(', ', $finals);
            $gradesString = implode(', ', $grades);
            Computation::where('id', $request->id)->update([
                'finals' => $gradesfinals,
                'midterm' => $gradesString,
                'total' => $average,
            ]);
        }

        return redirect()->back()->with('success');
    }

    public function submitsubjects(Request $request)
    {
        $subjects = $request->input('subjects');

        $subjectsString = implode(', ', $subjects);
        Computation::where('id', $request->id)->update([
            'subject' =>  $subjectsString,
        ]);

        return redirect()->back()->with('success');
    }

    public function moduledelete(Request $request)
    {
        Year::where('id', $request->year_id)->delete();
        Computation::where('id', $request->computation_id)->delete();
        return redirect()->route('compute');
    }
}
