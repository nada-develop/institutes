<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\Management;
use App\Models\Region;
use App\Models\Teacher;
use Illuminate\Http\Request;

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

   
        $regionCount = Region::count();
        $instituteCount = Institute::count();
        $managementCount = Management::count();
        $teacherCount = Teacher::count();
        return view('home',compact('regionCount','instituteCount','managementCount','teacherCount'));
    }
}
