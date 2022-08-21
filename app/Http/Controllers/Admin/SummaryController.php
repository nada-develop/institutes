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
 
    // discuss
    public function index()
    {
        abort_if(Gate::denies('summary_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = [];
        $data['regions'] = Region::all();
        return view('admin.summary.index', compact('data'));
    }

    public function get_summary(Request $request)
    {
        $data = [];
        $data['regions'] = Region::all();
        $data['managements'] =  Management::where('region_code', $request->region)->get();
        $data['institutes'] = Institute::where('management_code', $request->management)->get();
        $data['teacher_count'] = Teacher::where('institute_code',$request->institute)
        ->orWhere('another_institute_code',$request->institute)->count();
        $data['teachers'] = Teacher::where('institute_code',$request->institute)
        ->orWhere('another_institute_code',$request->institute)->get();
        return $data;
    }

    public function fetch_summary(Request $request)
    {
        $data = self::get_summary($request);
        return view('admin.summary.index', compact('data'));
    }
    public function print_fetch_summary(Request $request)
    {
        $data = self::get_summary($request);
        return view('admin.print.index', compact('data'));
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


    // teacher_with_places
    public function get_teacher_from_places(Request $request){
        $data = [];
        $data['regions'] = Region::all();
        $data['subjects'] = Subject::all();
        if ($request->region && $request->subject) {
            if ($request->region == 'all' && $request->subject == 'all') {
                $data['region_selected'] = 'all';
                $data['subject_selected'] = 'all';
                $data['teacher_count'] = Teacher::count();
                $data['teachers'] = Teacher::paginate(env('PAGINATION_LENGTH', 5));
            } elseif ($request->region != 'all' && $request->subject == 'all') {
                $data['teacher_count'] = Teacher::where('region_code', $request->region)->count();
                $data['region_selected'] = Region::where('code', $request->region)->first();
                $data['subject_selected'] = 'all';
                $data['teachers'] = Teacher::where('region_code', $request->region)->paginate(env('PAGINATION_LENGTH', 5));
            } elseif ($request->region == 'all' && $request->subject != 'all') {
                $data['teacher_count'] = Teacher::where('subject_code', $request->subject)->count();
                $data['region_selected'] = 'all';
                $data['subject_selected'] = Subject::where('code', $request->subject)->first();
                $data['teachers'] = Teacher::where('subject_code', $request->subject)->paginate(env('PAGINATION_LENGTH', 5));
            } elseif ($request->region != 'all' && $request->subject != 'all') {
                $data['teacher_count'] = Teacher::where('subject_code', $request->subject)
                ->where('region_code', $request->region)->count();
                $data['region_selected'] =Region::where('code', $request->region)->first();
                $data['subject_selected'] = Subject::where('code', $request->subject)->first();
                $data['teachers'] = Teacher::where('subject_code', $request->subject)
                ->where('region_code', $request->region)->paginate(env('PAGINATION_LENGTH', 5));

            }
        }
        return $data;
    }
    public function fetch_teacher_with_places(Request $request){
        $length = request()->length ?? env('PAGINATION_LENGTH', 5);
        $searchContent = request()->search_content ?? '';
        $pageType = request()->page_type;
        $teachers = [];
        if ($request->ajax()) {
                if ($length == -1) {
                    $length = Teacher::count();
                }
                if (strlen($searchContent)) {

                    if ($request->region && $request->subject) {
                        if ($request->region == 'all' && $request->subject == 'all') {
                            $data['teachers'] = Teacher::where('region_code', auth()->user()->region_code)->where('teacher_name', 'like', '%' . $searchContent . '%')
                            ->orWhere('record_number', 'like', '%' . $searchContent . '%')
                            ->orWhere('institute', 'like', '%' . $searchContent . '%')
                            ->orWhere('another_institute', 'like', '%' . $searchContent . '%')->paginate($length);
                        } elseif ($request->region != 'all' && $request->subject == 'all') {
                            $data['teachers'] = Teacher::where('region_code', $request->region)->where('region_code', auth()->user()->region_code)->where('teacher_name', 'like', '%' . $searchContent . '%')
                            ->orWhere('record_number', 'like', '%' . $searchContent . '%')
                            ->orWhere('institute', 'like', '%' . $searchContent . '%')
                            ->orWhere('another_institute', 'like', '%' . $searchContent . '%')->paginate($length);
                        } elseif ($request->region == 'all' && $request->subject != 'all') {
                            $data['teachers'] = Teacher::where('subject_code', $request->subject)->where('region_code', auth()->user()->region_code)->where('teacher_name', 'like', '%' . $searchContent . '%')
                            ->orWhere('record_number', 'like', '%' . $searchContent . '%')
                            ->orWhere('institute', 'like', '%' . $searchContent . '%')
                            ->orWhere('another_institute', 'like', '%' . $searchContent . '%')->paginate($length);
                        } elseif ($request->region != 'all' && $request->subject != 'all') {
                            $data['teachers'] = Teacher::where('subject_code', $request->subject)
                            ->where('region_code', $request->region)->where('region_code', auth()->user()->region_code)->where('teacher_name', 'like', '%' . $searchContent . '%')
                            ->orWhere('record_number', 'like', '%' . $searchContent . '%')
                            ->orWhere('institute', 'like', '%' . $searchContent . '%')
                            ->orWhere('another_institute', 'like', '%' . $searchContent . '%')->paginate($length);

                        }
                    }

                } else {
                    if ($request->region && $request->subject) {
                        if ($request->region == 'all' && $request->subject == 'all') {
                            $data['teachers'] = Teacher::where('region_code', auth()->user()->region_code)->where('teacher_name', 'like', '%' . $searchContent . '%')
                            ->orWhere('record_number', 'like', '%' . $searchContent . '%')
                            ->orWhere('institute', 'like', '%' . $searchContent . '%')
                            ->orWhere('another_institute', 'like', '%' . $searchContent . '%')->paginate($length);
                        } elseif ($request->region != 'all' && $request->subject == 'all') {
                            $data['teachers'] = Teacher::where('region_code', $request->region)->where('region_code', auth()->user()->region_code)->where('teacher_name', 'like', '%' . $searchContent . '%')
                            ->orWhere('record_number', 'like', '%' . $searchContent . '%')
                            ->orWhere('institute', 'like', '%' . $searchContent . '%')
                            ->orWhere('another_institute', 'like', '%' . $searchContent . '%')->paginate($length);
                        } elseif ($request->region == 'all' && $request->subject != 'all') {
                            $data['teachers'] = Teacher::where('subject_code', $request->subject)->where('region_code', auth()->user()->region_code)->where('teacher_name', 'like', '%' . $searchContent . '%')
                            ->orWhere('record_number', 'like', '%' . $searchContent . '%')
                            ->orWhere('institute', 'like', '%' . $searchContent . '%')
                            ->orWhere('another_institute', 'like', '%' . $searchContent . '%')->paginate($length);
                        } elseif ($request->region != 'all' && $request->subject != 'all') {
                            $data['teachers'] = Teacher::where('subject_code', $request->subject)
                            ->where('region_code', $request->region)->where('region_code', auth()->user()->region_code)->where('teacher_name', 'like', '%' . $searchContent . '%')
                            ->orWhere('record_number', 'like', '%' . $searchContent . '%')
                            ->orWhere('institute', 'like', '%' . $searchContent . '%')
                            ->orWhere('another_institute', 'like', '%' . $searchContent . '%')->paginate($length);

                        }
                    }

                }

            return view('admin.teachers.pagination_data', compact('teachers', 'pageType'))->render();
        }
    }
    public function teacher_with_places(Request $request)
    {
        abort_if(Gate::denies('summary_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = self::get_teacher_from_places($request);
        return view('admin.summary.teacher_with_places', compact('data'));
    }
    public function print_teacher_with_places(Request $request){
        $data = self::get_teacher_from_places($request);
        return view('admin.print.teacher_with_places',compact('data'));
    }

    // teacher_with_managements
    public function get_teacher_with_managements(Request $request)
    {
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
        return $data;
    }
    public function teacher_with_managements(Request $request)
    {
        abort_if(Gate::denies('summary_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = self::get_teacher_with_managements($request);
        return view('admin.summary.teacher_with_managements', compact('data'));
    }
    public function print_teacher_with_managements(Request $request)
    {
        $data = self::get_teacher_with_managements($request);
        return view('admin.print.teacher_with_managements',compact('data'));
    }


    public function get_teacher_with_institutes(Request $request)
    {
         $data = [];
        $data['institutes'] = Institute::all();
        $data['subjects'] = Subject::all();

        if ($request->institute && $request->subject) {
            if ($request->institute != 'all' && $request->subject == 'all') {
                $data['teacher_count'] = Teacher::where('institute_code', $request->institute)->count();
                $data['institute_selected'] = Institute::where('code', $request->institute)->first();
                $data['subject_selected'] = 'all';
            } elseif ($request->institute != 'all' && $request->subject != 'all') {
                $data['teacher_count'] = Teacher::where('subject_code', $request->subject)
                ->where('institute_code', $request->institute)->count();
                $data['teachers'] = Teacher::where('subject_code',$request->subject)
                ->where('institute_code',$request->institute)->get();
                $data['institute_selected'] =Institute::where('code', $request->institute)->first();
                $data['subject_selected'] = Subject::where('code', $request->subject)->first();
            }
        }

        return $data;
    }
    public function teacher_with_institutes(Request $request)
    {
        abort_if(Gate::denies('summary_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data = self::get_teacher_with_institutes($request);
        return view('admin.summary.teacher_with_institutes', compact('data'));
    }

    public function print_teacher_with_institutes(Request $request)
    {
        $data = self::get_teacher_with_institutes($request);
        return view('admin.print.teacher_with_institutes',compact('data'));
    }



}
