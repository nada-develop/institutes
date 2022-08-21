@extends('layouts.admin')
@section('content')

                <div class="content">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active"> @lang('dashboard.Dashboard')</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"> @lang('dashboard.Dashboard')</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded bg-soft-primary">
                                                    <i class="dripicons-view-thumb font-24 avatar-title text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $regionCount }}</span></h3>
                                                    <a ><p class="text-muted mb-1 text-truncate"> المناطق</p></a>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded bg-soft-info">

                                                    <i class=" dripicons-mail font-24 avatar-title text-info"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $managementCount }}</span></h3>
                                                    <a ><p class="text-muted mb-1 text-truncate">الادارات</p></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded bg-soft-success">
                                                    <i class="dripicons-blog font-24 avatar-title text-success"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $instituteCount }}</span></h3>
                                                    <a ><p class="text-muted mb-1 text-truncate">المعاهد</p></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded bg-soft-warning">
                                                    <i class="dripicons-photo-group font-24 avatar-title text-warning"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $teacherCount }}</span></h3>
                                                    <a ><p class="text-muted mb-1 text-truncate">المعلمين</p></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div> 



@endsection
