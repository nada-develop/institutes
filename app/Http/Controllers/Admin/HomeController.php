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

        // if (!auth()->user()->isAdmin()) {
        //     if (auth()->user()->active_region == 1) {
        //         $data['region_selected'] =  Region::where('code',auth()->user()->region_code)->first();
        //     } elseif (auth()->user()->active_management == 1) {
        //         $data['region_selected'] =  Region::where('code',auth()->user()->region_code)->first();
        //         $data['management_selected'] =  true;
        //     } else {
        //         $data['region_selected'] =  Region::where('code',auth()->user()->region_code)->first();
        //         $data['management_selected'] =  true;
        //         $data['institute_selected'] =  true;
        //     }
        // } else {
        //     $data['region_selected'] =  Region::where('code',113)->first();
        // }
        // $data['regions'] =  Region::all();

        //  $teachers1 = Teacher::where('region_code',113)->groupBy('subject')
        // ->selectRaw('count(*) as total, subject')
        // ->pluck('total','subject');


        $regionCount = Region::count();
        $instituteCount = Institute::count();
        $managementCount = Management::count();
        $teacherCount = Teacher::count();



        if (!auth()->user()->isAdmin()) {
            if (auth()->user()->active_region == 1) {
                $data['managements'] = Management::where('region_code', auth()->user()->region_code)->pluck('code', 'name');
                $data['region_teacher_count'] =  Teacher::where('region_code',auth()->user()->region_code)->count();
                $data['management_teacher_count'] =  0;
                $data['institute_teacher_count'] =  0;
                $data['subjects'] = Teacher::where('region_code',auth()->user()->region_code)->groupBy('subject')
                ->selectRaw('count(*) as total, subject')
                ->pluck('total','subject');
                $data['qualifications'] = Teacher::where('region_code',auth()->user()->region_code)->groupBy('qualification_name')
                ->selectRaw('count(*) as total, qualification_name')
                ->pluck('total','qualification_name');
                $data['job_attitudes'] = Teacher::where('region_code',auth()->user()->region_code)->groupBy('job_attitude')
                ->selectRaw('count(*) as total, job_attitude')
                ->pluck('total','job_attitude');
                $data['efficiencies'] = Teacher::where('region_code',auth()->user()->region_code)->groupBy('efficiency_name')
                ->selectRaw('count(*) as total, efficiency_name')
                ->pluck('total','efficiency_name');
                $data['job_staff'] = Teacher::where('region_code',auth()->user()->region_code)->groupBy('job_staff')
                ->selectRaw('count(*) as total, job_staff')
                ->pluck('total','job_staff');
                $data['group_types'] = Teacher::where('region_code',auth()->user()->region_code)->groupBy('group_type')
                ->selectRaw('count(*) as total, group_type')
                ->pluck('total','group_type');
                $data['jobs'] = Teacher::where('region_code',auth()->user()->region_code)->groupBy('job_name')
                ->selectRaw('count(*) as total, job_name')
                ->pluck('total','job_name');
            } elseif (auth()->user()->active_management == 1) {
                $data['subjects'] = Teacher::where('management_code',auth()->user()->management_code)->groupBy('subject')
                ->selectRaw('count(*) as total, subject')
                ->pluck('total','subject');
                $data['qualifications'] = Teacher::where('management_code',auth()->user()->management_code)->groupBy('qualification_name')
                ->selectRaw('count(*) as total, qualification_name')
                ->pluck('total','qualification_name');
                $data['job_attitudes'] = Teacher::where('management_code',auth()->user()->management_code)->groupBy('job_attitude')
                ->selectRaw('count(*) as total, job_attitude')
                ->pluck('total','job_attitude');
                $data['efficiencies'] = Teacher::where('management_code',auth()->user()->management_code)->groupBy('efficiency_name')
                ->selectRaw('count(*) as total, efficiency_name')
                ->pluck('total','efficiency_name');
                $data['job_staff'] = Teacher::where('management_code',auth()->user()->management_code)->groupBy('job_staff')
                ->selectRaw('count(*) as total, job_staff')
                ->pluck('total','job_staff');
                $data['group_types'] = Teacher::where('management_code',auth()->user()->management_code)->groupBy('group_type')
                ->selectRaw('count(*) as total, group_type')
                ->pluck('total','group_type');
                $data['jobs'] = Teacher::where('management_code',auth()->user()->management_code)->groupBy('job_name')
                ->selectRaw('count(*) as total, job_name')
                ->pluck('total','job_name');
            } else {
                $data['subjects'] = Teacher::where('institute_code',auth()->user()->institute_code)->groupBy('subject')
                ->selectRaw('count(*) as total, subject')
                ->pluck('total','subject');
                $data['qualifications'] = Teacher::where('institute_code',auth()->user()->institute_code)->groupBy('qualification_name')
                ->selectRaw('count(*) as total, qualification_name')
                ->pluck('total','qualification_name');
                $data['job_attitudes'] = Teacher::where('institute_code',auth()->user()->institute_code)->groupBy('job_attitude')
                ->selectRaw('count(*) as total, job_attitude')
                ->pluck('total','job_attitude');
                $data['efficiencies'] = Teacher::where('institute_code',auth()->user()->institute_code)->groupBy('efficiency_name')
                ->selectRaw('count(*) as total, efficiency_name')
                ->pluck('total','efficiency_name');
                $data['job_staff'] = Teacher::where('institute_code',auth()->user()->institute_code)->groupBy('job_staff')
                ->selectRaw('count(*) as total, job_staff')
                ->pluck('total','job_staff');
                $data['group_types'] = Teacher::where('institute_code',auth()->user()->institute_code)->groupBy('group_type')
                ->selectRaw('count(*) as total, group_type')
                ->pluck('total','group_type');
                $data['jobs'] = Teacher::where('institute_code',auth()->user()->institute_code)->groupBy('job_name')
                ->selectRaw('count(*) as total, job_name')
                ->pluck('total','job_name');
            }
        } else {
            $data['managements'] = Management::pluck('code', 'name');
            $data['region_teacher_count'] =  Teacher::count();
            $data['management_teacher_count'] =  0;
            $data['institute_teacher_count'] =  0;
            $data['subjects'] = Teacher::groupBy('subject')
                ->selectRaw('count(*) as total, subject')
                ->pluck('total', 'subject');
            $data['qualifications'] = Teacher::groupBy('qualification_name')
                ->selectRaw('count(*) as total, qualification_name')
                ->pluck('total', 'qualification_name');
            $data['job_attitudes'] = Teacher::groupBy('job_attitude')
                ->selectRaw('count(*) as total, job_attitude')
                ->pluck('total', 'job_attitude');
            $data['efficiencies'] = Teacher::groupBy('efficiency_name')
                ->selectRaw('count(*) as total, efficiency_name')
                ->pluck('total', 'efficiency_name');
            $data['job_staff'] = Teacher::groupBy('job_staff')
                ->selectRaw('count(*) as total, job_staff')
                ->pluck('total', 'job_staff');
            $data['group_types'] = Teacher::groupBy('group_type')
                ->selectRaw('count(*) as total, group_type')
                ->pluck('total', 'group_type');
            $data['jobs'] = Teacher::groupBy('job_name')
                ->selectRaw('count(*) as total, job_name')
                ->pluck('total', 'job_name');

        }




        $data['subjects_names'] = collect();
        $data['subjects_count'] = collect();
        foreach ($data['subjects'] as $key => $subject) {
            $data['subjects_names']->push($key);
            $data['subjects_count']->push($subject);
        }
        $data['qualifications_names'] = collect();
        $data['qualifications_count'] = collect();
        foreach ($data['qualifications'] as $key => $qualification) {
            $data['qualifications_names']->push($key);
            $data['qualifications_count']->push($qualification);
        }
        $data['job_attitudes_names'] = collect();
        $data['job_attitudes_count'] = collect();
        foreach ($data['job_attitudes'] as $key => $job_attitude) {
            $data['job_attitudes_names']->push($key);
            $data['job_attitudes_count']->push($job_attitude);
        }
        $data['efficiencies_names'] = collect();
        $data['efficiencies_count'] = collect();
        foreach ($data['efficiencies'] as $key => $efficiencie) {
            $data['efficiencies_names']->push($key);
            $data['efficiencies_count']->push($efficiencie);
        }
        $data['job_staff_names'] = collect();
        $data['job_staff_count'] = collect();
        foreach ($data['job_staff'] as $key => $job_staf) {
            $data['job_staff_names']->push($key);
            $data['job_staff_count']->push($job_staf);
        }
        $data['group_types_names'] = collect();
        $data['group_types_count'] = collect();
        foreach ($data['group_types'] as $key => $group_type) {
            $data['group_types_names']->push($key);
            $data['group_types_count']->push($group_type);
        }
        $data['jobs_names'] = collect();
        $data['jobs_count'] = collect();
        foreach ($data['jobs'] as $key => $job) {
            $data['jobs_names']->push($key);
            $data['jobs_count']->push($job);
        }

        return view('home', compact('data', 'regionCount', 'instituteCount', 'managementCount', 'teacherCount'));
    }
}
