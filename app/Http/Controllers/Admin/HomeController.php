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

        $regionCount = Region::count();
        $instituteCount = Institute::count();
        $managementCount = Management::count();
        $teacherCount = Teacher::count();

        if (!auth()->user()->isAdmin()) {
            if (auth()->user()->active_region == 1) {
                $subjects = Teacher::where('region_code', auth()->user()->region_code)->groupBy('subject')
                    ->selectRaw('count(*) as total, subject')
                    ->pluck('total', 'subject');
                $qualifications = Teacher::where('region_code', auth()->user()->region_code)->groupBy('qualification_name')
                    ->selectRaw('count(*) as total, qualification_name')
                    ->pluck('total', 'qualification_name');
                $job_attitudes = Teacher::where('region_code', auth()->user()->region_code)->groupBy('job_attitude')
                    ->selectRaw('count(*) as total, job_attitude')
                    ->pluck('total', 'job_attitude');
                $efficiencies = Teacher::where('region_code', auth()->user()->region_code)->groupBy('efficiency_name')
                    ->selectRaw('count(*) as total, efficiency_name')
                    ->pluck('total', 'efficiency_name');
                $job_staff = Teacher::where('region_code', auth()->user()->region_code)->groupBy('job_staff')
                    ->selectRaw('count(*) as total, job_staff')
                    ->pluck('total', 'job_staff');
                $group_types = Teacher::where('region_code', auth()->user()->region_code)->groupBy('group_type')
                    ->selectRaw('count(*) as total, group_type')
                    ->pluck('total', 'group_type');
                $jobs = Teacher::where('region_code', auth()->user()->region_code)->groupBy('job_name')
                    ->selectRaw('count(*) as total, job_name')
                    ->pluck('total', 'job_name');
            } elseif (auth()->user()->active_management == 1) {
                $subjects = Teacher::where('management_code', auth()->user()->management_code)->groupBy('subject')
                    ->selectRaw('count(*) as total, subject')
                    ->pluck('total', 'subject');
                $qualifications = Teacher::where('management_code', auth()->user()->management_code)->groupBy('qualification_name')
                    ->selectRaw('count(*) as total, qualification_name')
                    ->pluck('total', 'qualification_name');
                $job_attitudes = Teacher::where('management_code', auth()->user()->management_code)->groupBy('job_attitude')
                    ->selectRaw('count(*) as total, job_attitude')
                    ->pluck('total', 'job_attitude');
                $efficiencies = Teacher::where('management_code', auth()->user()->management_code)->groupBy('efficiency_name')
                    ->selectRaw('count(*) as total, efficiency_name')
                    ->pluck('total', 'efficiency_name');
                $job_staff = Teacher::where('management_code', auth()->user()->management_code)->groupBy('job_staff')
                    ->selectRaw('count(*) as total, job_staff')
                    ->pluck('total', 'job_staff');
                $group_types = Teacher::where('management_code', auth()->user()->management_code)->groupBy('group_type')
                    ->selectRaw('count(*) as total, group_type')
                    ->pluck('total', 'group_type');
                $jobs = Teacher::where('management_code', auth()->user()->management_code)->groupBy('job_name')
                    ->selectRaw('count(*) as total, job_name')
                    ->pluck('total', 'job_name');
            } else {
                $subjects = Teacher::where('institute_code', auth()->user()->institute_code)->groupBy('subject')
                    ->selectRaw('count(*) as total, subject')
                    ->pluck('total', 'subject');
                $qualifications = Teacher::where('institute_code', auth()->user()->institute_code)->groupBy('qualification_name')
                    ->selectRaw('count(*) as total, qualification_name')
                    ->pluck('total', 'qualification_name');
                $job_attitudes = Teacher::where('institute_code', auth()->user()->institute_code)->groupBy('job_attitude')
                    ->selectRaw('count(*) as total, job_attitude')
                    ->pluck('total', 'job_attitude');
                $efficiencies = Teacher::where('institute_code', auth()->user()->institute_code)->groupBy('efficiency_name')
                    ->selectRaw('count(*) as total, efficiency_name')
                    ->pluck('total', 'efficiency_name');
                $job_staff = Teacher::where('institute_code', auth()->user()->institute_code)->groupBy('job_staff')
                    ->selectRaw('count(*) as total, job_staff')
                    ->pluck('total', 'job_staff');
                $group_types = Teacher::where('institute_code', auth()->user()->institute_code)->groupBy('group_type')
                    ->selectRaw('count(*) as total, group_type')
                    ->pluck('total', 'group_type');
                $jobs = Teacher::where('institute_code', auth()->user()->institute_code)->groupBy('job_name')
                    ->selectRaw('count(*) as total, job_name')
                    ->pluck('total', 'job_name');
            }
        } else {
            $subjects = Teacher::groupBy('subject')
                ->selectRaw('count(*) as total, subject')
                ->pluck('total', 'subject');
            $qualifications = Teacher::groupBy('qualification_name')
                ->selectRaw('count(*) as total, qualification_name')
                ->pluck('total', 'qualification_name');
            $job_attitudes = Teacher::groupBy('job_attitude')
                ->selectRaw('count(*) as total, job_attitude')
                ->pluck('total', 'job_attitude');
            $efficiencies = Teacher::groupBy('efficiency_name')
                ->selectRaw('count(*) as total, efficiency_name')
                ->pluck('total', 'efficiency_name');
            $job_staff = Teacher::groupBy('job_staff')
                ->selectRaw('count(*) as total, job_staff')
                ->pluck('total', 'job_staff');
            $group_types = Teacher::groupBy('group_type')
                ->selectRaw('count(*) as total, group_type')
                ->pluck('total', 'group_type');
            $jobs = Teacher::groupBy('job_name')
                ->selectRaw('count(*) as total, job_name')
                ->pluck('total', 'job_name');
        }

        // dump($subjects);
        $data['subjects_names'] = collect();
        // dump($data['subjects_names']);
        $data['subjects_count'] = collect();
        foreach ($subjects as $name => $count) {
            $data['subjects_names']->push($name);
            $data['subjects_count']->push($count);
        }
        // ['أخصائى إجتماعى','أخصائى إجتماعى','أخصائى إجتماعى']
        // dd($data['subjects_names']);
        // [15,20,30]
        // dd($data['subjects_count']);
        $data['qualifications_names'] = collect();
        $data['qualifications_count'] = collect();
        foreach ($qualifications as $name => $count) {
            $data['qualifications_names']->push($name);
            $data['qualifications_count']->push($count);
        }
        $data['job_attitudes_names'] = collect();
        $data['job_attitudes_count'] = collect();
        foreach ($job_attitudes as $name => $count) {
            $data['job_attitudes_names']->push($name);
            $data['job_attitudes_count']->push($count);
        }
        $data['efficiencies_names'] = collect();
        $data['efficiencies_count'] = collect();
        foreach ($efficiencies as $name => $count) {
            $data['efficiencies_names']->push($name);
            $data['efficiencies_count']->push($count);
        }
        $data['job_staff_names'] = collect();
        $data['job_staff_count'] = collect();
        foreach ($job_staff as $name => $count) {
            $data['job_staff_names']->push($name);
            $data['job_staff_count']->push($count);
        }
        $data['group_types_names'] = collect();
        $data['group_types_count'] = collect();
        foreach ($group_types as $name => $count) {
            $data['group_types_names']->push($name);
            $data['group_types_count']->push($count);
        }
        $data['jobs_names'] = collect();
        $data['jobs_count'] = collect();
        foreach ($jobs as $name => $count) {
            $data['jobs_names']->push($name);
            $data['jobs_count']->push($count);
        }
        // dd($data);

        return view('home', compact('data', 'regionCount', 'instituteCount', 'managementCount', 'teacherCount'));
    }
}
