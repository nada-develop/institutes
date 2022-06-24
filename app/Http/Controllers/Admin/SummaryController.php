<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institute;
use App\Models\Management;
use App\Models\Region;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SummaryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('summary_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = [];
        $data['regions'] = Region::all();
        $data['managements_count'] =  Management::count();
        $data['institutes_count'] = Institute::count();
        return view('admin.summary.index', compact('data'));
    }
    public function fetch_summary(Request $request)
    {
        $data = [];
        $data['regions'] = Region::all();
        $data['managements'] =  Management::where('region_code', $request->region)->get();
        $data['institutes'] = Institute::where('management_code', $request->management)->get();
        return view('admin.summary.index', compact('data'));
    }
    public function fetch_management_from_region(Request $request)
    {
        $managements = Management::where('region_code', $request->region_code)->pluck('code', 'name');
        return json_decode($managements);
    }
    public function fetch_institute_from_management(Request $request)
    {
        $institutes = Institute::where('management_code', $request->management_code)->pluck('code', 'name');
        return json_decode($institutes);
    }

    public function teacher_with_places(Request $request)
    {
        abort_if(Gate::denies('summary_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = [];
        $data['regions'] = Region::all();
        $data['subjects'] = Subject::all();
        if ($request->region && $request->subject) {
            if ($request->region == 'all' && $request->subject == 'all') {
                $data['region_selected'] = 'all';
                $data['subject_selected'] = 'all';
                $data['teacher_count'] = Teacher::count();
            } elseif ($request->region != 'all' && $request->subject == 'all') {
                $data['teacher_count'] = Teacher::where('region_code', $request->region)->count();
                $data['region_selected'] = Region::where('code', $request->region)->first();
                $data['subject_selected'] = 'all';
            } elseif ($request->region == 'all' && $request->subject != 'all') {
                $data['teacher_count'] = Teacher::where('subject_code', $request->subject)->count();
                $data['region_selected'] = 'all';
                $data['subject_selected'] = Subject::where('code', $request->subject)->first();
            } elseif ($request->region != 'all' && $request->subject != 'all') {
                $data['teacher_count'] = Teacher::where('subject_code', $request->subject)
                ->where('region_code', $request->region)->count();
                $data['region_selected'] =Region::where('code', $request->region)->first();
                $data['subject_selected'] = Subject::where('code', $request->subject)->first();
            }
        }
        return view('admin.summary.teacher_with_places', compact('data'));
    }
    public function teacher_with_managements(Request $request)
    {
        abort_if(Gate::denies('summary_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = [];
        $data['managements'] = Management::all();
        $data['subjects'] = Subject::all();
        if ($request->management && $request->subject) {
            if ($request->management == 'all' && $request->subject == 'all') {
                $data['management_selected'] = 'all';
                $data['subject_selected'] = 'all';
                $data['teacher_count'] = Teacher::count();
            } elseif ($request->management != 'all' && $request->subject == 'all') {
                $data['teacher_count'] = Teacher::where('management_code', $request->management)->count();
                $data['management_selected'] = Management::where('code', $request->management)->first();
                $data['subject_selected'] = 'all';
            } elseif ($request->management == 'all' && $request->subject != 'all') {
                $data['teacher_count'] = Teacher::where('subject_code', $request->subject)->count();
                $data['management_selected'] = 'all';
                $data['subject_selected'] = Subject::where('code', $request->subject)->first();
            } elseif ($request->management != 'all' && $request->subject != 'all') {
                $data['teacher_count'] = Teacher::where('subject_code', $request->subject)
                ->where('management_code', $request->management)->count();
                $data['management_selected'] =Management::where('code', $request->management)->first();
                $data['subject_selected'] = Subject::where('code', $request->subject)->first();
            }
        }
        return view('admin.summary.teacher_with_managements', compact('data'));
    }


}
