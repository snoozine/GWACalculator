<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Profile;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function manage()
    {
        return view('manage');
    }
    public function addmodule()
    {
        return view('addmodule');
    }
    public function addgwa()
    {
        return view('addgwa');
    }    
}
