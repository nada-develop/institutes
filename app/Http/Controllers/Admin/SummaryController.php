<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institute;
use App\Models\Management;
use App\Models\Region;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SummaryController extends Controller
{
    public function index(){
        abort_if(Gate::denies('summary_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $data =[];
        $data['regions']= Region::all();
        $data['managements_count'] =  Management::count();
        $data['institutes_count'] = Institute::count();
        return view('admin.summary.index',compact('data'));
    }
    public function fetch_summary(Request $request){
        $data =[];
        $data['regions'] = Region::all();
        $data['managements'] = Management::all();
        $data['institutes'] = Institute::all();
        $data['managements_count'] =  Management::where('region_code',$request->region)->count();
        $data['institutes_count'] = Institute::where('management_code',$request->management)->count();
        return view('admin.summary.index',compact('data'));
    }
    public function fetch_management_from_region(Request $request){
        $managements = Management::where('region_code',$request->region_code)->pluck('code','name');
        return json_decode($managements);
    }
    public function fetch_institute_from_management(Request $request){
        $institutes = Institute::where('management_code',$request->management_code)->pluck('code','name');
        return json_decode($institutes);
    }


}
