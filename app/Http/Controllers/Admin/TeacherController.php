<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institute;
use App\Models\Job;
use App\Models\Management;
use App\Models\Qualification;
use App\Models\Region;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('teacher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $teachers = Teacher::paginate(env('PAGINATION_LENGTH', 5));
        return view('admin.teachers.index', compact('teachers'));
    }

    function fetch_data(Request $request)
    {
        // dd($request->all());
        /* Request
        [
            page, // page number
            legnth, // items per page
            search_content,
            page_type => ['index', 'trashed']
        ]
        */

        $length = request()->length ?? env('PAGINATION_LENGTH', 5);
        $searchContent = request()->search_content ?? '';
        $pageType = request()->page_type;
        $teachers = [];
        if ($request->ajax()) {
            if ($pageType == 'index') {
                if ($length == -1) {
                    $length = Teacher::count();
                }
                if (strlen($searchContent)) {
                    $teachers = Teacher::where('teacher_name', 'like', '%' . $searchContent . '%')
                        ->orWhere('teacher_code', 'like', '%' . $searchContent . '%')
                        ->orWhere('institute', 'like', '%' . $searchContent . '%')->paginate($length);
                } else {
                    $teachers = Teacher::paginate($length);
                }
            }

            return view('admin.teachers.pagination_data', compact('teachers', 'pageType'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $data['regions'] = Region::all();
        $data['subjects'] = Subject::all();
        $data['qualifications'] = Qualification::all();
        $data['qualifications_type'] = Qualification::select('type')->groupBy('type')->get();
        $data['jobs'] = Job::all();
        return view('admin.teachers.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->gender == 'male')
            $request['gender_code'] = 1;
        else
            $request['gender_code'] = 2;

        Teacher::create($request->all());

        return redirect()->route('admin.teachers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);
        return view('admin.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['teacher'] = Teacher::find($id);
        $data['regions'] = Region::all();
        $data['managements'] = Management::where('region_code', $data['teacher']['region_code'])->get();
        $data['institutes'] = Institute::where('management_code', $data['teacher']['management_code'])->get();
        $data['subjects'] = Subject::all();
        $data['qualifications'] = Qualification::where('type', $data['teacher']['qualification_type'])->get();
        $data['qualifications_type'] = Qualification::select('type')->groupBy('type')->get();
        $data['jobs'] = Job::all();
        return view('admin.teachers.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        if ($request->gender == 'male')
            $request['gender_code'] = 1;
        else
            $request['gender_code'] = 2;

        $teacher->update($request->all());

        return redirect()->route('admin.teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::find($id)->delete();
        return redirect()->route('admin.teachers.index');
    }

    public function fetch_qualification_from_type(Request $request)
    {
        $qualifications = Qualification::where('type', $request->qualification_type)->pluck('code', 'name');
        return json_decode($qualifications);
    }
}
