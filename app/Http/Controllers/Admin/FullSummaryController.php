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
        if (!auth()->user()->isAdmin()) {
            if (auth()->user()->active_region == 1) {
                $data['region_selected'] = auth()->user()->region_code;
            } elseif (auth()->user()->active_management == 1) {
                $data['region_selected'] = auth()->user()->region_code;
                $data['management_selected'] =  true;
            } else {
                $data['region_selected'] = auth()->user()->region_code;
                $data['management_selected'] =  true;
                $data['institute_selected'] =  true;
            }
        } else {
            $data['region_selected'] =  "all";
        }
        $data['regions'] =  Region::all();

        $regionCount = Region::count();
        $instituteCount = Institute::count();
        $managementCount = Management::count();
        $teacherCount = Teacher::count();
        return view('admin.summary.index',compact('data','regionCount','instituteCount','managementCount','teacherCount'));
    }

    public function fetch_summary_from_region(Request $request){
        if (!auth()->user()->isAdmin()) {
            if (auth()->user()->active_management == 1) {
                $data['management_selected'] = auth()->user()->management_code;
            } elseif (auth()->user()->active_management != 1 && auth()->user()->active_region != 1) {
                $data['management_selected'] = auth()->user()->management_code;
                $data['institute_selected'] = true;
            }
        }
        if($request->region_code == "all"){
            $data['managements'] = Management::pluck('code', 'name');
            $data['region_teacher_count'] =  Teacher::count();
            $data['management_teacher_count'] =  '---';
            $data['institute_teacher_count'] =  '---';
            $data['subjects'] = Teacher::groupBy('subject')
            ->selectRaw('count(*) as total, subject')
            ->pluck('total','subject');
            $data['qualifications'] = Teacher::groupBy('qualification_name')
            ->selectRaw('count(*) as total, qualification_name')
            ->pluck('total','qualification_name');
            $data['job_attitudes'] = Teacher::groupBy('job_attitude')
            ->selectRaw('count(*) as total, job_attitude')
            ->pluck('total','job_attitude');
            $data['efficiencies'] = Teacher::groupBy('efficiency_name')
            ->selectRaw('count(*) as total, efficiency_name')
            ->pluck('total','efficiency_name');
            $data['job_staff'] = Teacher::groupBy('job_staff')
            ->selectRaw('count(*) as total, job_staff')
            ->pluck('total','job_staff');
            $data['group_types'] = Teacher::groupBy('group_type')
            ->selectRaw('count(*) as total, group_type')
            ->pluck('total','group_type');
            $data['jobs'] = Teacher::groupBy('job_name')
            ->selectRaw('count(*) as total, job_name')
            ->pluck('total','job_name');
        }else{
            $data['managements'] = Management::where('region_code', $request->region_code)->pluck('code', 'name');
            $data['region_teacher_count'] =  Teacher::where('region_code',$request->region_code)->count();
            $data['management_teacher_count'] =  '---';
            $data['institute_teacher_count'] =  '---';
            $data['subjects'] = Teacher::where('region_code',$request->region_code)->groupBy('subject')
            ->selectRaw('count(*) as total, subject')
            ->pluck('total','subject');
            $data['qualifications'] = Teacher::where('region_code',$request->region_code)->groupBy('qualification_name')
            ->selectRaw('count(*) as total, qualification_name')
            ->pluck('total','qualification_name');
            $data['job_attitudes'] = Teacher::where('region_code',$request->region_code)->groupBy('job_attitude')
            ->selectRaw('count(*) as total, job_attitude')
            ->pluck('total','job_attitude');
            $data['efficiencies'] = Teacher::where('region_code',$request->region_code)->groupBy('efficiency_name')
            ->selectRaw('count(*) as total, efficiency_name')
            ->pluck('total','efficiency_name');
            $data['job_staff'] = Teacher::where('region_code',$request->region_code)->groupBy('job_staff')
            ->selectRaw('count(*) as total, job_staff')
            ->pluck('total','job_staff');
            $data['group_types'] = Teacher::where('region_code',$request->region_code)->groupBy('group_type')
            ->selectRaw('count(*) as total, group_type')
            ->pluck('total','group_type');
            $data['jobs'] = Teacher::where('region_code',$request->region_code)->groupBy('job_name')
            ->selectRaw('count(*) as total, job_name')
            ->pluck('total','job_name');
        }

        return $data;
    }

    public function fetch_summary_from_management(Request $request){
        if (!auth()->user()->isAdmin()) {
            if (auth()->user()->active_management != 1 && auth()->user()->active_region != 1) {
                 $data['institute_selected'] =  Institute::where('code',auth()->user()->institute_code)->first()->code;
            }
        }
            $data['institutes'] = Institute::where('management_code',$request->management_code)->pluck('code', 'name');
            if($request->region_code == 'all'){
                $data['region_teacher_count'] =  Teacher::count();
            }else{
                $data['region_teacher_count'] =  Teacher::where('region_code',$request->region_code)->count();
            }
            $data['management_teacher_count'] = Teacher::where('management_code',$request->management_code)->count();
            $data['institute_teacher_count'] =  '---';

            $data['subjects'] = Teacher::where('management_code',$request->management_code)->groupBy('subject')
            ->selectRaw('count(*) as total, subject')
            ->pluck('total','subject');

            $data['qualifications'] = Teacher::where('management_code',$request->management_code)->groupBy('qualification_name')
            ->selectRaw('count(*) as total, qualification_name')
            ->pluck('total','qualification_name');
            $data['job_attitudes'] = Teacher::where('management_code',$request->management_code)->groupBy('job_attitude')
            ->selectRaw('count(*) as total, job_attitude')
            ->pluck('total','job_attitude');
            $data['efficiencies'] = Teacher::where('management_code',$request->management_code)->groupBy('efficiency_name')
            ->selectRaw('count(*) as total, efficiency_name')
            ->pluck('total','efficiency_name');
            $data['job_staff'] = Teacher::where('management_code',$request->management_code)->groupBy('job_staff')
            ->selectRaw('count(*) as total, job_staff')
            ->pluck('total','job_staff');
            $data['group_types'] = Teacher::where('management_code',$request->management_code)->groupBy('group_type')
            ->selectRaw('count(*) as total, group_type')
            ->pluck('total','group_type');
            $data['jobs'] = Teacher::where('management_code',$request->management_code)->groupBy('job_name')
            ->selectRaw('count(*) as total, job_name')
            ->pluck('total','job_name');

        return $data;
    }

    public function fetch_summary_from_institute(Request $request){
    
            $data['institutes'] = Institute::where('management_code',$request->management_code)->pluck('code', 'name');
            if($request->region_code == 'all'){
                $data['region_teacher_count'] =  Teacher::count();
            }else{
                $data['region_teacher_count'] =  Teacher::where('region_code',$request->region_code)->count();
            }
            $data['management_teacher_count'] = Teacher::where('management_code',$request->management_code)->count();
            if($request->institute_code == 'all'){
                $data['institute_teacher_count'] = Teacher::where('management_code',$request->management_code)->count();
                $data['subjects'] = Teacher::where('management_code',$request->management_code)->groupBy('subject')
                ->selectRaw('count(*) as total, subject')
                ->pluck('total','subject');
                $data['qualifications'] = Teacher::where('management_code',$request->management_code)->groupBy('qualification_name')
                ->selectRaw('count(*) as total, qualification_name')
                ->pluck('total','qualification_name');
                $data['job_attitudes'] = Teacher::where('management_code',$request->management_code)->groupBy('job_attitude')
                ->selectRaw('count(*) as total, job_attitude')
                ->pluck('total','job_attitude');
                $data['efficiencies'] = Teacher::where('management_code',$request->management_code)->groupBy('efficiency_name')
                ->selectRaw('count(*) as total, efficiency_name')
                ->pluck('total','efficiency_name');
                $data['job_staff'] = Teacher::where('management_code',$request->management_code)->groupBy('job_staff')
                ->selectRaw('count(*) as total, job_staff')
                ->pluck('total','job_staff');
                $data['group_types'] = Teacher::where('management_code',$request->management_code)->groupBy('group_type')
                ->selectRaw('count(*) as total, group_type')
                ->pluck('total','group_type');
                $data['jobs'] = Teacher::where('management_code',$request->management_code)->groupBy('job_name')
                ->selectRaw('count(*) as total, job_name')
                ->pluck('total','job_name');

            }else{
                $data['institute_teacher_count'] =  Teacher::where('institute_code',$request->institute_code)->count();
                $data['subjects'] = Teacher::where('institute_code',$request->institute_code)->groupBy('subject')
                ->selectRaw('count(*) as total, subject')
                ->pluck('total','subject');
                $data['qualifications'] = Teacher::where('institute_code',$request->institute_code)->groupBy('qualification_name')
                ->selectRaw('count(*) as total, qualification_name')
                ->pluck('total','qualification_name');
                $data['job_attitudes'] = Teacher::where('institute_code',$request->institute_code)->groupBy('job_attitude')
                ->selectRaw('count(*) as total, job_attitude')
                ->pluck('total','job_attitude');
                $data['efficiencies'] = Teacher::where('institute_code',$request->institute_code)->groupBy('efficiency_name')
                ->selectRaw('count(*) as total, efficiency_name')
                ->pluck('total','efficiency_name');
                $data['job_staff'] = Teacher::where('institute_code',$request->institute_code)->groupBy('job_staff')
                ->selectRaw('count(*) as total, job_staff')
                ->pluck('total','job_staff');
                $data['group_types'] = Teacher::where('institute_code',$request->institute_code)->groupBy('group_type')
                ->selectRaw('count(*) as total, group_type')
                ->pluck('total','group_type');
                $data['jobs'] = Teacher::where('institute_code',$request->institute_code)->groupBy('job_name')
                ->selectRaw('count(*) as total, job_name')
                ->pluck('total','job_name');
            }
        return $data;
    }
}
