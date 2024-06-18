<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function profile()
    {
        $id =  Auth::id();
        $profile = Profile::where('user_id', $id)->first();
        return view('profile', compact('profile'));
    }
    public function createprofile()
    {
        $id =  Auth::id();
        $profile = Profile::where('user_id', $id)->first();
        if ($profile) {
            return redirect()->route('profile');
        }
        return view('addprofile');
    }



    public function submitprofile(Request $request)
    {
        $id =  Auth::id();
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'bday' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $existingUser = Profile::where('user_id', $id)->first();

        $imagePath = $request->file('image')->store('images', 'public');
        if ($existingUser) {
            return redirect()->back()->with('error');
        } else {
            Profile::create([
                'user_id' =>  $id,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'age' => $request->age,
                'program' => $request->program,
                'year' => $request->year,
                'email' => $request->email,
                'bday' => $request->bday,
                'nationality' => $request->nationality,
                'status' => $request->status,
                'gender' => $request->gender,
                'address' => $request->address,
                'image' => $imagePath,
            ]);

            return redirect()->route('profile');
        }
    }
    public function profileDelete(Request $request)
    {
        $id =  Auth::id();
        $tenant = Profile::where('user_id', $id)->first();
        Storage::disk('public')->delete($tenant->image);
        User::where('id', $id)->delete();
        Profile::where('user_id', $id)->delete();
        return redirect()->route('logout');
    }


    public function editprofile($id)
    {
        $profile = Profile::where('user_id', $id)->first();
        if (!$profile) {
            return redirect()->back();
        }
        return view('editprofile', compact('profile'));
    }
    public function submitedit(Request $request)
    {

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'bday' => 'required|string|max:255',
            'age' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $id =  Auth::id();
        $tenant = Profile::where('user_id', $id)->first();
        Storage::disk('public')->delete($tenant->image);

        $imagePath = $request->file('image')->store('images', 'public');
        Profile::where('id', $id)->update([
            'user_id' =>  $id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'age' => $request->age,
            'program' => $request->program,
            'year' => $request->year,
            'email' => $request->email,
            'bday' => $request->bday,
            'nationality' => $request->nationality,
            'status' => $request->status,
            'gender' => $request->gender,
            'address' => $request->address,
            'image' => $imagePath,
        ]);
        return redirect()->route('profile');
    }



    
}
