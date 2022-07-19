@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            تحليل المعاهد
        </div>
        <form action="{{ route('admin.summary.fetch_summary') }}" method="get" class="mb-0">
            <div class="container p-2">
                <div class="row">

                    <div class="search-loader d-none">
                        <div  class="la-ball-clip-rotate-multiple la-2x loader-spinner">
                          <div></div>
                          <div></div>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-2">
                            <label for="" class="mb-1">المناطق</label>
                            <select class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}"
                                data-toggle="select2" name="region" id="region" required>
                                <option selected disabled>اختر المنطقة</option>
                                @foreach ($data['regions'] as $region)
                                    <option @if( request()->get('region') == $region->code) selected @endif  value="{{ $region->code }}">{{ $region->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-2">
                            <label for="" class="mb-1">الادارات</label>
                            <select class="form-control {{ $errors->has('management') ? 'is-invalid' : '' }}"
                                data-toggle="select2" name="management" id="management" required>
                                @if (isset($data['managements']))
                                <option selected disabled> اختر الاداره </option>
                                    @foreach ($data['managements'] as $management)
                                        <option @if( request()->get('management') == $management->code) selected @endif value="{{ $management->code }}">{{ $management->name }} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-2">
                            <label for="" class="mb-1">المعاهد</label>
                            <select class="form-control {{ $errors->has('institute') ? 'is-invalid' : '' }}"
                                data-toggle="select2" name="institute" id="institute" required>
                                @if (isset($data['institutes']))
                                <option selected disabled> اختر المعهد </option>
                                @foreach ($data['institutes'] as $institute)
                                    <option @if( request()->get('institute') == $institute->code) selected @endif value="{{ $institute->code }}">{{ $institute->name }} </option>
                                @endforeach
                            @endif
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <button class="btn btn-primary mt-3" type="submit">
                            بحث
                        </button>
                    </div>
                </div>
            </div>
        </form>
        @if (isset($data['teacher_count']))
        <div class="container pt-0 pb-0 p-2">
            <div class="row">
                <div class="col-12">
                    <div class="card widget-inline" style="border: 1px solid #36c7eb52;">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-sm-6 col-xl-3">
                                    <div class="p-2 text-center">

                                        <h3><span data-plugin="counterup">{{ isset($data['managements_count']) ? $data['managements_count'] : $data['managements']->count()}}</span></h3>
                                        <p class="text-muted font-15 mb-0"> عدد الادارات </p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <div class="p-2 text-center">

                                        <h3><span data-plugin="counterup">{{  isset($data['institutes_count']) ? $data['institutes_count'] : $data['institutes']->count() }}</span></h3>
                                        <p class="text-muted font-15 mb-0"> عدد المعاهد</p>
                                    </div>
                                </div>

                                 <div class="col-sm-6 col-xl-3">
                                    <div class="p-2 text-center">

                                        <h3><span data-plugin="counterup">{{  isset($data['teacher_count']) ? $data['teacher_count'] : 0 }}</span></h3>
                                        <p class="text-muted font-15 mb-0">عدد المعلمين</p>
                                    </div>
                                </div>



                            </div> <!-- end row -->
                        </div>
                    </div> <!-- end card-->
                </div>
            </div>

            @if ($data['teacher_count'] > 0)
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        قائمة المعلمين
                    </div>
                    <div class="card-body">
                        <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">


                            <div id="table-data" class="table-responsive">

                                <table id="basic-datatable" class="table dt-responsive nowrap w-100 table-striped">

                                    <thead>
                                        <tr>
                                            <th> No.</th>
                                            <th> اسم المعلم </th>
                                            <th>كود المعلم</th>
                                            <th>المعهد</th>
                                            <th> خيارات</th>
                                        </tr>
                                    </thead>

                                    {{-- Table body --}}
                                    <tbody>
                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $teacher->teacher_name }}</td>
                                                <td>{{ $teacher->teacher_code }}</td>
                                                <td>{{ $teacher->institute }}</td>
                                                <td>
                                                    <div class="service-option">

                                                            <a class=" btn btn-primary my-1 mx-0 "
                                                            style="height: 29px;line-height: 10px;margin-left:10px !important;margin-right:10px !important;" href="{{ route('admin.teachers.show', $teacher->id) }}">
                                                                <i class="fa fa-eye" ></i>
                                                                عرض </a>
                                                            <a class=" btn btn-warning my-1 mx-0"
                                                            style="height: 29px" href="{{ route('admin.teachers.edit', $teacher->id) }}">
                                                                <i class="fa fa-edit" ></i>
                                                                تعديل </a>
                                                                <form action="{{ route('admin.teachers.destroy',$teacher->id) }}"
                                                                    onsubmit="return confirm('هل أنت متأكد من حذف  ({{ $teacher->teacher_name  }}) ؟' );"  method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="submit" class="btn  btn-danger  my-1 mx-0" >
                                                                        <i class="fa fa-trash"></i>
                                                                    حذف
                                                                    </button>
                                                            </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endif
        </div>
        @endif
    </div>


    </div>
@endsection
@section('custom-script')
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script>
        $('#region').on('change', function() {
            var region_code = $(this).val();
            $('.search-loader').removeClass('d-none');
            $.ajax({
                url: "/admin/fetch-management-from-region",
                type: "GET",
                data: {
                    region_code: region_code
                },
                success: function(response) {
                    $('.search-loader').addClass('d-none');
                    $('#management').find('option').remove();
                    if (response.length != 0) {
                        $('#management').append(`<option selected disabled> اختر الاداره </option>`);
                        $.each(response, function(index, value) {
                            $('#management').append(
                                `<option value="${value}"> ${index}</option>`);
                        });
                    }
                },
            });


        });
        $('#management').on('change', function() {
            var management_code = $(this).val();
            $('.search-loader').removeClass('d-none');
            $.ajax({
                url: "/admin/fetch-institute-from-management",
                type: "GET",
                data: {
                    management_code: management_code
                },
                success: function(response) {
                    $('.search-loader').addClass('d-none');
                    $('#institute').find('option').remove();
                    if (response.length != 0) {
                        $('#institute').append(`<option selected disabled> اختر المعهد </option>`);
                        $.each(response, function(index, value) {
                            $('#institute').append(
                                `<option value="${value}"> ${index}</option>`);
                        });
                    }
                },
            });


        });

    </script>
@endsection
