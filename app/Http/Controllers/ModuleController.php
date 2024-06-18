<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;
use App\Models\Target;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function addmodule(Request $request)
    {
        $id = Auth::id();
        $year =  Year::where('user_id', $id)->where('year', $request->year)->where('term', $request->term)->first();
        if ($year) {
            return redirect()->back()->with('error',  __('validation.addmoduleerror'));
        } else {
            Year::create([
                'user_id' => Auth::id(),
                'year' => $request->year,
                'term' => $request->term,
                'subjects' => $request->subjects,
            ]);
            return redirect()->route('manage');
        }
    }

    public function addtarget(Request $request)
    {
        $id = Auth::id();
        $year =  Target::where('user_id', $id)->where('year', $request->year)->where('term', $request->term)->first();
        if ($year) {
            return redirect()->back()->with('error',  __('validation.addgwaerror'));
        } else {
            Target::create([
                'user_id' => Auth::id(),
                'year' => $request->year,
                'term' => $request->term,
                'gwa' => $request->gwa,
            ]);
            return redirect()->route('target');
        }
    }

    public function target()
    {
        $id = Auth::id();
        for ($year = 1; $year <= 4; $year++) {
            $targetData = Target::where('year', $year)->where('user_id', $id)->orderBy('term', 'asc')->get();
            if ($targetData->isNotEmpty()) {
                $data[$year] = $targetData;
                return view('target', compact('data'));
            } else {
                return view('addgwa');
            }
        }
    }


    public function targetdelete(Request $request)
    {
        Target::where('id', $request->id)->delete();
        return redirect()->back();
    }

    public function editgwa($id)
    {
        $gwa = Target::where('id', $id)->first();
        return view('editgwa', compact('gwa'));
    }

    public function submiteditgwa(Request $request)
    {
        Target::where('id', $request->id)->update([
            'gwa' => $request->gwa,
        ]);
        return redirect()->route('target');
    }
}
