<?php

namespace App\Http\Controllers\Admin;

use App\Models\Institute;
use App\Models\Management;
use App\Models\Region;
use App\Models\Teacher;

class HomeController
{
    public function index()
    {
        $regionCount = Region::count();
        $instituteCount = Institute::count();
        $managementCount = Management::count();
        $teacherCount = Teacher::count();
        return view('home',compact('regionCount','instituteCount','managementCount','teacherCount'));
    }
}
