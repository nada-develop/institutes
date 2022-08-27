<?php

namespace App\Http\Controllers\Admin;

use App\Models\Institute;
use App\Models\Management;
use App\Models\Region;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {

        if (!auth()->user()->idAdmin()) {
            if (auth()->user()->active_region == 1) {
                $data['region_selected'] =  Region::where('code',auth()->user()->region_code)->first();
            } elseif (auth()->user()->active_management == 1) {
                $data['region_selected'] =  Region::where('code',auth()->user()->region_code)->first();
                $data['management_selected'] =  true;
            } else {
                $data['region_selected'] =  Region::where('code',auth()->user()->region_code)->first();
                $data['management_selected'] =  true;
                $data['institute_selected'] =  true;
            }
        } else {
            $data['region_selected'] =  Region::where('code',113)->first();
        }
        $data['regions'] =  Region::all();

        // $teachers1 = Teacher::where('region_code',113)->select('subject_code')->groupBy('subject_code')->get();
        $teachers1 = Teacher::where('region_code',113)->groupBy('subject')
        ->selectRaw('count(*) as total, subject')
        ->pluck('total','subject');

        // dd($teachers1);
        $regionCount = Region::count();
        $instituteCount = Institute::count();
        $managementCount = Management::count();
        $teacherCount = Teacher::count();
        return view('home',compact('data','regionCount','instituteCount','managementCount','teacherCount','teachers1'));
    }

    public function fetch_summary_from_region(Request $request){
        if (!auth()->user()->idAdmin()) {
            if (auth()->user()->active_management == 1) {
                $data['management_selected'] =  Management::where('code',auth()->user()->management_code)->first()->code;
            } else {
                $data['management_selected'] =  Management::where('code',auth()->user()->management_code)->first()->code;
            }
        } else {
            $data['region_selected'] =  Region::where('code',113)->first();
        }
        $data['managements'] = Management::where('region_code', $request->region_code)->pluck('code', 'name');
        $data['subjects'] = Teacher::where('region_code',$request->region_code)->groupBy('subject')
        ->selectRaw('count(*) as total, subject')
        ->pluck('total','subject');
        return $data;
    }

    public function fetch_summary_from_management(Request $request){
        if (!auth()->user()->idAdmin()) {
            if (auth()->user()->active_management != 1 && auth()->user()->active_region != 1) {
                 $data['institute_selected'] =  Institute::where('code',auth()->user()->institute_code)->first()->code;
            }
        } else {
            $data['region_selected'] =  Region::where('code',113)->first();
        }
        $data['institutes'] = Institute::where('management_code',$request->management_code)->pluck('code', 'name');
        $data['subjects'] = Teacher::where('region_code',$request->region_code)->groupBy('subject')
        ->selectRaw('count(*) as total, subject')
        ->pluck('total','subject');
        return $data;
    }
}
