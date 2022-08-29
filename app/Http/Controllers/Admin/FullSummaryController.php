<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institute;
use App\Models\Management;
use App\Models\Region;
use App\Models\Teacher;
use Illuminate\Http\Request;

class FullSummaryController extends Controller
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
            $data['region_selected'] =  "all";
        }
        $data['regions'] =  Region::all();


        $subjects = Teacher::where('region_code',110)->groupBy('subject')
    ->selectRaw('count(*) as total, subject')
    ->pluck('total','subject');


        // dd($subjects);
        $regionCount = Region::count();
        $instituteCount = Institute::count();
        $managementCount = Management::count();
        $teacherCount = Teacher::count();
        return view('admin.summary.index',compact('data','regionCount','instituteCount','managementCount','teacherCount','subjects'));
    }

    public function fetch_summary_from_region(Request $request){
        if (!auth()->user()->idAdmin()) {
            if (auth()->user()->active_management == 1) {
                $data['management_selected'] =  Management::where('code',auth()->user()->management_code)->first()->code;
            } else {
                $data['management_selected'] =  "all";
            }
        } else {
            $data['region_selected'] =  "all";
        }
        if($request->region_code == "all"){
            $data['managements'] = Management::pluck('code', 'name');
            $data['subjects'] = Teacher::groupBy('subject')
            ->selectRaw('count(*) as total, subject')
            ->pluck('total','subject');
        }else{
            $data['managements'] = Management::where('region_code', $request->region_code)->pluck('code', 'name');
            $data['subjects'] = Teacher::where('region_code',$request->region_code)->groupBy('subject')
            ->selectRaw('count(*) as total, subject')
            ->pluck('total','subject');
        }

        return $data;
    }

    public function fetch_summary_from_management(Request $request){
        if (!auth()->user()->idAdmin()) {
            if (auth()->user()->active_management != 1 && auth()->user()->active_region != 1) {
                 $data['institute_selected'] =  Institute::where('code',auth()->user()->institute_code)->first()->code;
            }
        } else {
            $data['region_selected'] =  Region::where('code',auth()->user()->region_code)->first();
        }
        if($request->management_code == "all" && $request->region_code == "all"){
            $data['institutes'] = Institute::pluck('code', 'name');
            $data['subjects'] = Teacher::groupBy('subject')
            ->selectRaw('count(*) as total, subject')
            ->pluck('total','subject');
        }elseif($request->management_code == "all" && $request->region_code != "all"){
            $data['institutes'] = Institute::pluck('code', 'name');
            $data['subjects'] = Teacher::where('region_code',$request->region_code)->groupBy('subject')
            ->selectRaw('count(*) as total, subject')
            ->pluck('total','subject');
        }else{
            $data['institutes'] = Institute::where('management_code',$request->management_code)->pluck('code', 'name');
            $data['subjects'] = Teacher::where('management_code',$request->management_code)->groupBy('subject')
            ->selectRaw('count(*) as total, subject')
            ->pluck('total','subject');
        }

        return $data;
    }
    public function fetch_summary_from_institute(Request $request){
        if (!auth()->user()->idAdmin()) {
            if (auth()->user()->active_management != 1 && auth()->user()->active_region != 1) {
                 $data['institute_selected'] =  Institute::where('code',auth()->user()->institute_code)->first()->code;
            }
        } else {
            $data['region_selected'] =  Region::where('code',auth()->user()->region_code)->first();
        }
        if($request->management_code == "all" && $request->region_code == "all"){
            $data['institutes'] = Institute::pluck('code', 'name');
            $data['subjects'] = Teacher::groupBy('subject')
            ->selectRaw('count(*) as total, subject')
            ->pluck('total','subject');
        }elseif($request->management_code == "all" && $request->region_code != "all"){
            $data['institutes'] = Institute::pluck('code', 'name');
            $data['subjects'] = Teacher::where('region_code',$request->region_code)->groupBy('subject')
            ->selectRaw('count(*) as total, subject')
            ->pluck('total','subject');
        }else{
            $data['institutes'] = Institute::where('management_code',$request->management_code)->pluck('code', 'name');
            $data['subjects'] = Teacher::where('management_code',$request->management_code)->groupBy('subject')
            ->selectRaw('count(*) as total, subject')
            ->pluck('total','subject');
        }

        return $data;
    }
}
