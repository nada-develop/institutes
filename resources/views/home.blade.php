@extends('layouts.admin')
@section('content')
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <form action="{{ route('admin.summary.fetch_summary') }}" method="get" class="mb-0">
                    <div class="container p-2 mt-2">
                        <div class="row">

                            <div class="search-loader d-none">
                                <div  class="la-ball-clip-rotate-multiple la-2x loader-spinner">
                                  <div></div>
                                  <div></div>
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">المناطق</label>
                                    <select class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}"
                                        data-toggle="select2" name="region" id="region" @if(!auth()->user()->idAdmin() && isset($data['region_selected'])) disabled @endif required>
                                        <option selected disabled>اختر المنطقة</option>
                                        @foreach ($data['regions'] as $region)
                                            <option @if(isset($data['region_selected'])) @if( $data['region_selected']->code == $region->code) selected @endif @endif value="{{ $region->code }}">{{ $region->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">الادارات</label>
                                    <select class="form-control {{ $errors->has('management') ? 'is-invalid' : '' }}"
                                        data-toggle="select2" name="management" id="management"  @if(!auth()->user()->idAdmin() && isset($data['management_selected'])) disabled @endif required>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="" class="mb-1">المعاهد</label>
                                    <select class="form-control {{ $errors->has('institute') ? 'is-invalid' : '' }}"
                                        data-toggle="select2" name="institute" id="institute"  @if(!auth()->user()->idAdmin() && isset($data['institute_selected'])) disabled @endif  required>

                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
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
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $regionCount }}</span>
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
                                        <h3 class="text-dark mt-1"><span
                                                data-plugin="counterup">{{ $managementCount }}</span></h3>
                                        <a>
                                            <p class="text-muted mb-1 text-truncate">الادارات</p>
                                        </a>
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
                                        <h3 class="text-dark mt-1"><span
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
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $teacherCount }}</span>
                                        </h3>
                                        <a>
                                            <p class="text-muted mb-1 text-truncate">المعلمين</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- INBOX -->
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mb-3">التخصصات</h4>

                            <div class="subjects inbox-widget" data-simplebar style="max-height: 407px;overflow: auto">
                                @foreach ($teachers1 as $subject => $total)
                                <div class="inbox-item">
                                            @if($subject =="")
                                            <p class="inbox-item-author" style="width:80%">بدون تخصص</p>
                                            @else
                                            <p class="inbox-item-author" style="width:80%">{{ $subject }}</p>
                                            @endif
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        {{ $total }}
                                    </p>
                                </div>
                                @endforeach
                            </div> <!-- end inbox-widget -->
                        </div>
                    </div> <!-- end card -->
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mb-3">التخصصات</h4>

                            <div class="subjects inbox-widget" data-simplebar style="max-height: 407px;overflow: auto">
                                @foreach ($teachers1 as $subject => $total)
                                <div class="inbox-item">
                                            @if($subject =="")
                                            <p class="inbox-item-author" style="width:80%">بدون تخصص</p>
                                            @else
                                            <p class="inbox-item-author" style="width:80%">{{ $subject }}</p>
                                            @endif
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        {{ $total }}
                                    </p>
                                </div>
                                @endforeach
                            </div> <!-- end inbox-widget -->
                        </div>
                    </div> <!-- end card -->
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mb-3">التخصصات</h4>

                            <div class="subjects inbox-widget" data-simplebar style="max-height: 407px;overflow: auto">
                                @foreach ($teachers1 as $subject => $total)
                                <div class="inbox-item">
                                            @if($subject =="")
                                            <p class="inbox-item-author" style="width:80%">بدون تخصص</p>
                                            @else
                                            <p class="inbox-item-author" style="width:80%">{{ $subject }}</p>
                                            @endif
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        {{ $total }}
                                    </p>
                                </div>
                                @endforeach
                            </div> <!-- end inbox-widget -->
                        </div>
                    </div> <!-- end card -->
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mb-3">التخصصات</h4>

                            <div class="subjects inbox-widget" data-simplebar style="max-height: 407px;overflow: auto">
                                @foreach ($teachers1 as $subject => $total)
                                <div class="inbox-item">
                                            @if($subject =="")
                                            <p class="inbox-item-author" style="width:80%">بدون تخصص</p>
                                            @else
                                            <p class="inbox-item-author" style="width:80%">{{ $subject }}</p>
                                            @endif
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        {{ $total }}
                                    </p>
                                </div>
                                @endforeach
                            </div> <!-- end inbox-widget -->
                        </div>
                    </div> <!-- end card -->
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mb-3">التخصصات</h4>

                            <div class="subjects inbox-widget" data-simplebar style="max-height: 407px;overflow: auto">
                                @foreach ($teachers1 as $subject => $total)
                                <div class="inbox-item">
                                            @if($subject =="")
                                            <p class="inbox-item-author" style="width:80%">بدون تخصص</p>
                                            @else
                                            <p class="inbox-item-author" style="width:80%">{{ $subject }}</p>
                                            @endif
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        {{ $total }}
                                    </p>
                                </div>
                                @endforeach
                            </div> <!-- end inbox-widget -->
                        </div>
                    </div> <!-- end card -->
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="header-title mb-3">التخصصات</h4>

                            <div class="subjects inbox-widget" data-simplebar style="max-height: 407px;overflow: auto">
                                @foreach ($teachers1 as $subject => $total)
                                <div class="inbox-item">
                                            @if($subject =="")
                                            <p class="inbox-item-author" style="width:80%">بدون تخصص</p>
                                            @else
                                            <p class="inbox-item-author" style="width:80%">{{ $subject }}</p>
                                            @endif
                                    <p class="inbox-item-date text-center" style="width:15%">
                                        {{ $total }}
                                    </p>
                                </div>
                                @endforeach
                            </div> <!-- end inbox-widget -->
                        </div>
                    </div> <!-- end card -->
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


                   $('.subjects').empty();
                    $('#management').find('option').remove();
                    if (response.managements.length != 0) {
                        $('#management').append(`<option selected disabled> اختر الاداره </option>`);
                        if(response.management_selected !== undefined){
                            $.each(response.managements, function(name, code) {
                                if( response.management_selected == code){
                                $('#management').append(
                                        `<option value="${code}" selected> ${name}</option>`  );
                                    }else{
                                        $('#management').append(
                                            `<option value="${code}" > ${name}</option>`);
                                    }
                            });
                        }else{
                            $.each(response.managements, function(name, code) {
                                $('#management').append(
                                    `<option value="${code}" > ${name}</option>`);
                            });
                        }

                        $.each(response.subjects, function(subject, subject_count) {
                            if(subject == ""){
                                $('.subjects').append(
                                    `  <div class="inbox-item">
                                        <p class="inbox-item-author" style="width:80%">بدون تخصص</p>
                                        <p class="inbox-item-date text-center" style="width:15%">
                                            ${subject_count}
                                        </p>
                                    </div>`);
                            }else{
                                $('.subjects').append(
                                    `  <div class="inbox-item">
                                        <p class="inbox-item-author" style="width:80%">${subject}</p>
                                        <p class="inbox-item-date text-center" style="width:15%">
                                            ${subject_count}
                                        </p>
                                    </div>`);
                            }

                        });
                        $('#management').trigger('change');
                        $('.search-loader').addClass('d-none');
                    }
                },
            });


        });

        $('#management').on('change', function() {
            var management_code = $(this).val();
            $('.search-loader').removeClass('d-none');
            $.ajax({
                url: "{{ route('admin.summary.fetch_summary_from_management') }}",
                type: "GET",
                data: {
                    management_code: management_code
                },
                success: function(response) {
                    console.log( response );
                    $('.search-loader').addClass('d-none');
                    $('#institute').find('option').remove();
                    if (response.length != 0) {
                        $('#institute').append(`<option selected disabled> اختر المعهد </option>`);

                        if(response.institute_selected !== undefined){
                            $.each(response.institutes, function(name, code) {
                                if( response.institute_selected == code){
                                $('#institute').append(
                                        `<option value="${code}" selected> ${name}</option>`  );
                                    }else{
                                        $('#institute').append(
                                            `<option value="${code}" > ${name}</option>`);
                                    }
                            });
                        }else{
                            $.each(response.institutes, function(name, code) {
                                $('#institute').append(
                                    `<option value="${code}" > ${name}</option>`);
                            });
                        }
                    }
                },
            });


        });
    </script>
@endsection
