@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('admin.summary.fetch_summary') }}" method="get" class="mb-0">
                    <div class="container p-2 mt-2">
                        <div class="row">

                            <div class="search-loader d-none">
                                <div class="la-ball-clip-rotate-multiple la-2x loader-spinner">
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">المناطق</label>
                                    <select class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}"
                                        data-toggle="select2" name="region" id="region"
                                        @if (!auth()->user()->isAdmin() && $data['region_selected']) disabled @endif required>
                                        <option value="all" @if ($data['region_selected'] == 'all') selected @endif>الكل
                                        </option>
                                        @foreach ($data['regions'] as $region)
                                            <option
                                                @if ($data['region_selected'] != 'all') @if ($data['region_selected'] == $region->code) selected @endif
                                                @endif value="{{ $region->code }}">{{ $region->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">الادارات</label>
                                    <select class="form-control {{ $errors->has('management') ? 'is-invalid' : '' }}"
                                        data-toggle="select2" name="management" id="management"
                                        @if (!auth()->user()->isAdmin() && isset($data['management_selected'])) disabled @endif required>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">المعاهد</label>
                                    <select class="form-control {{ $errors->has('institute') ? 'is-invalid' : '' }}"
                                        data-toggle="select2" name="institute" id="institute"
                                        @if (!auth()->user()->isAdmin() && isset($data['institute_selected'])) disabled @endif required>

                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="row summary-count ">


                        <div class="col-md-6 col-xl-12">
                            <div class="widget-rounded-circle card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded bg-soft-primary">
                                                <i class="dripicons-view-thumb font-24 avatar-title text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div >
                                                <h3 class=" text-dark mt-1"><span
                                                        data-plugin="counterup">{{ $regionCount }}</span>
                                                </h3>
                                                <a>
                                                    <p class="text-muted mb-1 text-truncate"> المناطق</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-12">
                            <div class="widget-rounded-circle card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded bg-soft-info">

                                                <i class=" dripicons-mail font-24 avatar-title text-info"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div >
                                                <h3 class=" text-dark mt-1"><span
                                                        data-plugin="counterup">{{ $managementCount }}</span></h3>
                                                <a>
                                                    <p class="text-muted mb-1 text-truncate">الإدارات</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-12">
                            <div class="widget-rounded-circle card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded bg-soft-success">
                                                <i class="dripicons-blog font-24 avatar-title text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div >
                                                <h3 class=" text-dark mt-1"><span
                                                        data-plugin="counterup">{{ $instituteCount }}</span></h3>
                                                <a>
                                                    <p class="text-muted mb-1 text-truncate">المعاهد</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-12">
                            <h5 class=" mt-0 mb-1">اجمالى عدد المعلمين ({{ $teacherCount  }})</h5>
                            <p class="mb-1">عدد المعلمين فى كل من</p>
                        </div>

                        <div class="col-md-6 col-xl-12">
                            <div class="widget-rounded-circle card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded bg-soft-primary">
                                                <i class="dripicons-view-thumb font-24 avatar-title text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div >
                                                <h3 class="regionCount text-dark mt-1"><span
                                                        data-plugin="counterup">0</span>
                                                </h3>
                                                <a>
                                                    <p class="text-muted mb-1 text-truncate"> المنطقة</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-12">
                            <div class="widget-rounded-circle card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded bg-soft-info">

                                                <i class=" dripicons-mail font-24 avatar-title text-info"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div >
                                                <h3 class="managementCount text-dark mt-1"><span
                                                        data-plugin="counterup">0</span></h3>
                                                <a>
                                                    <p class="text-muted mb-1 text-truncate">الادارة</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-12">
                            <div class="widget-rounded-circle card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="avatar-lg rounded bg-soft-success">
                                                <i class="dripicons-blog font-24 avatar-title text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div >
                                                <h3 class="instituteCount text-dark mt-1"><span
                                                        data-plugin="counterup">0</span></h3>
                                                <a>
                                                    <p class="text-muted mb-1 text-truncate">المعهد</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-xl-6 col-differ">
                            <div class="card summary-card">
                                <div class="card-body">
                                    <div class="header-title mb-3">
                                        <h4>التخصصات</h4>
                                        <input class="form-control" type="text" id="subject_search" placeholder="بحث">
                                    </div>
                                    <div class="subjects inbox-widget" data-simplebar>

                                    </div>
                                </div>
                            </div> <!-- end card -->
                        </div>
                        <div class="col-xl-6 col-differ">
                            <div class="card summary-card">
                                <div class="card-body">
                                    <div class="header-title mb-3">
                                        <h4>المؤهلات</h4>
                                        <input class="form-control" type="text" id="qualification_search"
                                            placeholder="بحث">
                                    </div>
                                    <div class="qualifications inbox-widget" data-simplebar>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-differ">
                            <div class="card summary-card">
                                <div class="card-body">
                                    <div class="header-title mb-3">
                                        <h4>الموقف من العمل</h4>
                                        <input class="form-control" type="text" id="job_attitude_search"
                                            placeholder="بحث">
                                    </div>
                                    <div class="job_attitudes inbox-widget" data-simplebar>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-differ">
                            <div class="card summary-card">
                                <div class="card-body">
                                    <div class="header-title mb-3">
                                        <h4> الكفاءة </h4>
                                        <input class="form-control" type="text" id="efficiency_search"
                                            placeholder="بحث">
                                    </div>
                                    <div class="efficiencies inbox-widget" data-simplebar>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-4 col-differ">
                    <div class="card summary-card">
                        <div class="card-body">
                            <div class="header-title mb-3">
                                <h4> الوظيفة على الكادر </h4>
                                <input class="form-control" type="text" id="job_staff_search"
                                    placeholder="بحث">
                            </div>
                            <div class="job_staff inbox-widget" data-simplebar>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-differ">
                    <div class="card summary-card">
                        <div class="card-body">
                            <div class="header-title mb-3">
                                <h4> المجموعة النوعية   </h4>
                                <input class="form-control" type="text" id="group_type_search"
                                    placeholder="بحث">
                            </div>
                            <div class="group_types inbox-widget" data-simplebar>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-differ">
                    <div class="card summary-card">
                        <div class="card-body">
                            <div class="header-title mb-3">
                                <h4> الوظيفة   </h4>
                                <input class="form-control" type="text" id="job_search"
                                    placeholder="بحث">
                            </div>
                            <div class="jobs inbox-widget" data-simplebar>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('custom-script')
        <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
        <script>

            $(document).ready(function() {
                $('#region').trigger('change');
            });

            var check_management_selected = false;
            var check_institute_selected = false;
            $('#region').on('change', function() {
                var region_code = $(this).val();
                $('.search-loader').removeClass('d-none');
                $.ajax({
                    url: "{{ route('admin.summary.fetch_summary_from_region') }}",
                    type: "GET",
                    data: {
                        region_code: region_code
                    },
                    success: function(response) {

                        $('#management').find('option').remove();
                        $('#institute').find('option').remove();
                        if (response.managements.length != 0) {
                            $('#management').append(`<option selected disabled> اختر الاداره </option>`);
                            if (response.management_selected !== undefined) {
                                $.each(response.managements, function(name, code) {
                                    if (response.management_selected == code) {
                                        $('#management').append(
                                            `<option value="${code}" selected> ${name}</option>`
                                        );
                                    }
                                });
                                check_management_selected = true;
                                $('#management').trigger('change');
                            } else {
                                $.each(response.managements, function(name, code) {
                                    $('#management').append(
                                        `<option value="${code}" > ${name}</option>`);
                                });
                            }

                            $('.regionCount span').text(response.region_teacher_count);
                            $('.managementCount span').text(response.management_teacher_count);
                            $('.instituteCount span').text(response.institute_teacher_count);
                         if (!check_management_selected) {
                                $('.subjects').empty();
                                $('.qualifications').empty();
                                $('.job_attitudes').empty();
                                $('.efficiencies').empty();
                                $('.job_staff').empty();
                                $('.group_types').empty();
                                $('.jobs').empty();
                                $.each(response.subjects, function(subject, subject_count) {
                                    if (subject == "") {
                                        $('.subjects').append(
                                            `  <div class="inbox-item">
                                        <p class="inbox-item-author" style="width:80%">بدون تخصص</p>
                                        <p class="inbox-item-date text-center" style="width:15%">
                                            ${subject_count}
                                        </p>
                                    </div>`);
                                    } else {
                                        $('.subjects').append(
                                            `  <div class="inbox-item">
                                        <p class="inbox-item-author" style="width:80%">${subject}</p>
                                        <p class="inbox-item-date text-center" style="width:15%">
                                            ${subject_count}
                                        </p>
                                    </div>`);
                                    }
                                });
                                $.each(response.qualifications, function(qualification,
                                    qualification_count) {
                                    if (qualification == "") {
                                        $('.qualifications').append(
                                            `  <div class="inbox-item">
                                        <p class="inbox-item-author" style="width:80%">بدون مؤهل</p>
                                        <p class="inbox-item-date text-center" style="width:15%">
                                            ${qualification_count}
                                        </p>
                                    </div>`);
                                    } else {
                                        $('.qualifications').append(
                                            `  <div class="inbox-item">
                                        <p class="inbox-item-author" style="width:80%">${qualification}</p>
                                        <p class="inbox-item-date text-center" style="width:15%">
                                            ${qualification_count}
                                        </p>
                                    </div>`);
                                    }

                                });
                                $.each(response.job_attitudes, function(job_attitude, job_attitude_count) {
                                    if (job_attitude == "") {
                                        $('.job_attitudes').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">بدون </p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${job_attitude_count}
                                    </p>
                                          </div>`);
                                    } else {
                                        $('.job_attitudes').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">${job_attitude}</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${job_attitude_count}
                                    </p>
                                          </div>`);
                                    }

                                });
                                $.each(response.efficiencies, function(efficiency, efficiency_count) {
                                    if (efficiency == "") {
                                        $('.efficiencies').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%"> بدون كفاءة</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${efficiency_count}
                                    </p>
                                          </div>`);
                                    } else {
                                        $('.efficiencies').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">${efficiency}</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${efficiency_count}
                                    </p>
                                          </div>`);
                                    }

                                });
                                $.each(response.job_staff, function(job_staff, job_staff_count) {
                                    if (job_staff == "") {
                                        $('.job_staff').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">بدون </p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${job_staff_count}
                                    </p>
                                          </div>`);
                                    } else {
                                        $('.job_staff').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">${job_staff}</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${job_staff_count}
                                    </p>
                                          </div>`);
                                    }

                                });
                                $.each(response.group_types, function(group_type, group_type_count) {
                                    if (group_type == "") {
                                        $('.group_types').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">بدون </p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${group_type_count}
                                    </p>
                                          </div>`);
                                    } else {
                                        $('.group_types').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">${group_type}</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${group_type_count}
                                    </p>
                                          </div>`);
                                    }

                                });
                                $.each(response.jobs, function(job, job_count) {
                                    if (job == "") {
                                        $('.jobs').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">بدون </p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${job_count}
                                    </p>
                                          </div>`);
                                    } else {
                                        $('.jobs').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">${job}</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${job_count}
                                    </p>
                                          </div>`);
                                    }

                                });
                                $('.search-loader').addClass('d-none');
                             }
                        }
                    },
                });
            });

            $('#management').on('change', function() {
                var management_code = $(this).val();
                var region_code = $('#region').val();
                $('.search-loader').removeClass('d-none');
                $.ajax({
                    url: "{{ route('admin.summary.fetch_summary_from_management') }}",
                    type: "GET",
                    data: {
                        management_code: management_code,
                        region_code: region_code
                    },
                    success: function(response) {
                        $('#institute').find('option').remove();
                        if (response.length != 0) {
                            $('#institute').append(`<option value="all"> الكل </option>`);
                            if (response.institute_selected !== undefined) {
                                $.each(response.institutes, function(name, code) {
                                    if (response.institute_selected == code) {
                                        $('#institute').append(
                                            `<option value="${code}" selected> ${name}</option>`
                                        );
                                    }
                                });
                                check_institute_selected = true;
                                $('#institute').trigger('change');
                            } else {
                                $.each(response.institutes, function(name, code) {
                                    $('#institute').append(
                                        `<option value="${code}" > ${name}</option>`);
                                });
                            }
                            $('.regionCount  span').text(response.region_teacher_count);
                            $('.managementCount  span').text(response.management_teacher_count);
                            $('.instituteCount  span').text(response.institute_teacher_count);
                            if (!check_institute_selected) {
                                $('.subjects').empty();
                                $('.qualifications').empty();
                                $('.job_attitudes').empty();
                                $('.efficiencies').empty();
                                $('.job_staff').empty();
                                $('.group_types').empty();
                                $('.jobs').empty();
                                $.each(response.subjects, function(subject, subject_count) {
                                    if (subject == "") {
                                        $('.subjects').append(
                                            `  <div class="inbox-item">
                                        <p class="inbox-item-author" style="width:80%">بدون تخصص</p>
                                        <p class="inbox-item-date text-center" style="width:15%">
                                            ${subject_count}
                                        </p>
                                    </div>`);
                                    } else {
                                        $('.subjects').append(
                                            `  <div class="inbox-item">
                                        <p class="inbox-item-author" style="width:80%">${subject}</p>
                                        <p class="inbox-item-date text-center" style="width:15%">
                                            ${subject_count}
                                        </p>
                                    </div>`);
                                    }

                                });
                                $.each(response.qualifications, function(qualification,
                                    qualification_count) {
                                    if (qualification == "") {
                                        $('.qualifications').append(
                                            `  <div class="inbox-item">
                                        <p class="inbox-item-author" style="width:80%">بدون مؤهل</p>
                                        <p class="inbox-item-date text-center" style="width:15%">
                                            ${qualification_count}
                                        </p>
                                    </div>`);
                                    } else {
                                        $('.qualifications').append(
                                            `  <div class="inbox-item">
                                        <p class="inbox-item-author" style="width:80%">${qualification}</p>
                                        <p class="inbox-item-date text-center" style="width:15%">
                                            ${qualification_count}
                                        </p>
                                    </div>`);
                                    }

                                });
                                $.each(response.job_attitudes, function(job_attitude, job_attitude_count) {
                                    if (job_attitude == "") {
                                        $('.job_attitudes').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">بدون </p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${job_attitude_count}
                                    </p>
                                          </div>`);
                                    } else {
                                        $('.job_attitudes').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">${job_attitude}</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${job_attitude_count}
                                    </p>
                                          </div>`);
                                    }

                                });
                                $.each(response.efficiencies, function(efficiency, efficiency_count) {
                                    if (efficiency == "") {
                                        $('.efficiencies').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">بدون كفاءة</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${efficiency_count}
                                    </p>
                                          </div>`);
                                    } else {
                                        $('.efficiencies').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">${efficiency}</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${efficiency_count}
                                    </p>
                                          </div>`);
                                    }

                                });
                                $.each(response.job_staff, function(job_staff, job_staff_count) {
                                    if (job_staff == "") {
                                        $('.job_staff').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">بدون </p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${job_staff_count}
                                    </p>
                                          </div>`);
                                    } else {
                                        $('.job_staff').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">${job_staff}</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${job_staff_count}
                                    </p>
                                          </div>`);
                                    }

                                });
                                $.each(response.group_types, function(group_type, group_type_count) {
                                    if (group_type == "") {
                                        $('.group_types').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">بدون </p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${group_type_count}
                                    </p>
                                          </div>`);
                                    } else {
                                        $('.group_types').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">${group_type}</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${group_type_count}
                                    </p>
                                          </div>`);
                                    }

                                });
                                $.each(response.jobs, function(job, job_count) {
                                    if (job == "") {
                                        $('.jobs').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">بدون </p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${job_count}
                                    </p>
                                          </div>`);
                                    } else {
                                        $('.jobs').append(
                                            `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">${job}</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${job_count}
                                    </p>
                                          </div>`);
                                    }

                                });
                                $('.search-loader').addClass('d-none');
                            }
                        }
                    },
                });
            });

            $('#institute').on('change', function() {
                var institute_code = $(this).val();
                var management_code = $('#management').val();
                var region_code = $('#region').val();
                $('.search-loader').removeClass('d-none');
                $.ajax({
                    url: "{{ route('admin.summary.fetch_summary_from_institute') }}",
                    type: "GET",
                    data: {
                        management_code: management_code,
                        institute_code: institute_code,
                        region_code:region_code
                    },
                    success: function(response) {


                        if (response.length != 0) {
                            $('.regionCount  span').text(response.region_teacher_count);
                            $('.managementCount  span').text(response.management_teacher_count);
                            $('.instituteCount  span').text(response.institute_teacher_count);
                            $('.subjects').empty();
                            $('.qualifications').empty();
                            $('.job_attitudes').empty();
                            $('.efficiencies').empty();
                            $('.job_staff').empty();
                            $('.group_types').empty();
                            $('.jobs').empty();
                            $.each(response.subjects, function(subject, subject_count) {
                                if (subject == "") {
                                    $('.subjects').append(
                                        `  <div class="inbox-item">
                                        <p class="inbox-item-author" style="width:80%">بدون تخصص</p>
                                        <p class="inbox-item-date text-center" style="width:15%">
                                            ${subject_count}
                                        </p>
                                    </div>`);
                                } else {
                                    $('.subjects').append(
                                        `  <div class="inbox-item">
                                        <p class="inbox-item-author" style="width:80%">${subject}</p>
                                        <p class="inbox-item-date text-center" style="width:15%">
                                            ${subject_count}
                                        </p>
                                    </div>`);
                                }

                            });
                            $.each(response.qualifications, function(qualification,
                                qualification_count) {
                                if (qualification == "") {
                                    $('.qualifications').append(
                                        `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">بدون مؤهل</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${qualification_count}
                                    </p>
                                </div>`);
                                } else {
                                    $('.qualifications').append(
                                        `  <div class="inbox-item">
                                    <p class="inbox-item-author" style="width:80%">${qualification}</p>
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        ${qualification_count}
                                    </p>
                                </div>`);
                                }

                            });
                            $.each(response.job_attitudes, function(job_attitude, job_attitude_count) {
                                if (job_attitude == "") {
                                    $('.job_attitudes').append(
                                        `  <div class="inbox-item">
                                <p class="inbox-item-author" style="width:80%">بدون </p>
                                <p class="inbox-item-date text-center" style="width:15%">
                                    ${job_attitude_count}
                                </p>
                                      </div>`);
                                } else {
                                    $('.job_attitudes').append(
                                        `  <div class="inbox-item">
                                <p class="inbox-item-author" style="width:80%">${job_attitude}</p>
                                <p class="inbox-item-date text-center" style="width:15%">
                                    ${job_attitude_count}
                                </p>
                                      </div>`);
                                }

                            });
                            $.each(response.efficiencies, function(efficiency, efficiency_count) {
                                if (efficiency == "") {
                                    $('.efficiencies').append(
                                        `  <div class="inbox-item">
                                <p class="inbox-item-author" style="width:80%">بدون كفاءة</p>
                                <p class="inbox-item-date text-center" style="width:15%">
                                    ${efficiency_count}
                                </p>
                                      </div>`);
                                } else {
                                    $('.efficiencies').append(
                                        `  <div class="inbox-item">
                                <p class="inbox-item-author" style="width:80%">${efficiency}</p>
                                <p class="inbox-item-date text-center" style="width:15%">
                                    ${efficiency_count}
                                </p>
                                      </div>`);
                                }

                            });
                            $.each(response.job_staff, function(job_staff, job_staff_count) {
                                if (job_staff == "") {
                                    $('.job_staff').append(
                                        `  <div class="inbox-item">
                                <p class="inbox-item-author" style="width:80%">بدون </p>
                                <p class="inbox-item-date text-center" style="width:15%">
                                    ${job_staff_count}
                                </p>
                                      </div>`);
                                } else {
                                    $('.job_staff').append(
                                        `  <div class="inbox-item">
                                <p class="inbox-item-author" style="width:80%">${job_staff}</p>
                                <p class="inbox-item-date text-center" style="width:15%">
                                    ${job_staff_count}
                                </p>
                                      </div>`);
                                }

                            });
                            $.each(response.group_types, function(group_type, group_type_count) {
                                if (group_type == "") {
                                    $('.group_types').append(
                                        `  <div class="inbox-item">
                                <p class="inbox-item-author" style="width:80%">بدون </p>
                                <p class="inbox-item-date text-center" style="width:15%">
                                    ${group_type_count}
                                </p>
                                      </div>`);
                                } else {
                                    $('.group_types').append(
                                        `  <div class="inbox-item">
                                <p class="inbox-item-author" style="width:80%">${group_type}</p>
                                <p class="inbox-item-date text-center" style="width:15%">
                                    ${group_type_count}
                                </p>
                                      </div>`);
                                }

                            });
                            $.each(response.jobs, function(job, job_count) {
                                if (job == "") {
                                    $('.jobs').append(
                                        `  <div class="inbox-item">
                                <p class="inbox-item-author" style="width:80%">بدون </p>
                                <p class="inbox-item-date text-center" style="width:15%">
                                    ${job_count}
                                </p>
                                      </div>`);
                                } else {
                                    $('.jobs').append(
                                        `  <div class="inbox-item">
                                <p class="inbox-item-author" style="width:80%">${job}</p>
                                <p class="inbox-item-date text-center" style="width:15%">
                                    ${job_count}
                                </p>
                                      </div>`);
                                }

                            });
                            $('.search-loader').addClass('d-none');
                        }
                    },
                });
            });

            $(document).on('keyup', '#subject_search', function() {
                var filter, txtValue;
                txtValue = $(this).val().toLowerCase();
                $(".subjects .inbox-item").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(txtValue) > -1)
                });
            });

            $(document).on('keyup', '#qualification_search', function() {
                var filter, ul, li, a, i, txtValue;
                txtValue = $(this).val().toLowerCase();
                $(".qualifications .inbox-item").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(txtValue) > -1)
                });
            });

            $(document).on('keyup', '#job_attitude_search', function() {
                var filter, ul, li, a, i, txtValue;
                txtValue = $(this).val().toLowerCase();
                $(".job_attitudes .inbox-item").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(txtValue) > -1)
                });
            });
            $(document).on('keyup', '#efficiency_search', function() {
                var filter, ul, li, a, i, txtValue;
                txtValue = $(this).val().toLowerCase();
                $(".efficiencies .inbox-item").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(txtValue) > -1)
                });
            });
            $(document).on('keyup', '#job_staff_search', function() {
                var filter, ul, li, a, i, txtValue;
                txtValue = $(this).val().toLowerCase();
                $(".job_staff .inbox-item").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(txtValue) > -1)
                });
            });
            $(document).on('keyup', '#group_type_search', function() {
                var filter, ul, li, a, i, txtValue;
                txtValue = $(this).val().toLowerCase();
                $(".group_types .inbox-item").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(txtValue) > -1)
                });
            });
            $(document).on('keyup', '#job_search', function() {
                var filter, ul, li, a, i, txtValue;
                txtValue = $(this).val().toLowerCase();
                $(".jobs .inbox-item").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(txtValue) > -1)
                });
            });


        </script>
    @endsection
