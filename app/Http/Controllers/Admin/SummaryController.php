<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SummaryController extends Controller
{
    public function index(){

        abort_if(Gate::denies('summary_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.summary.index');
    }
}
