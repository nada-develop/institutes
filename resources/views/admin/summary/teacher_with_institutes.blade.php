@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            تحليل المعاهد
        </div>
        <form action="{{ route('admin.teacher_with_institutes') }}" method="get">
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
                            <label for="" class="mb-1">المعاهد</label>
                            <select class="form-control {{ $errors->has('institute') ? 'is-invalid' : '' }}"
                                data-toggle="select2" name="institute" id="institute" required>
                                {{-- <option value="all" selected>جميع المعاهد</option> --}}
                                @foreach ($data['institutes'] as $institute)
                                    <option @if( (isset($data['institute_selected']) ? ($data['institute_selected'] != 'all' ? $data['institute_selected']->code : '') : '') == $institute->code) selected @endif  value="{{ $institute->code }}">{{ $institute->name }} </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-2">
                            <label for="" class="mb-1">التخصصات</label>
                            <select class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}"
                                data-toggle="select2" name="subject" id="subject" required>
                                <option value="all" selected>جميع التخصصات</option>
                                @foreach ($data['subjects'] as $subject)
                                    <option @if(  (isset($data['subject_selected']) ? ($data['subject_selected'] != 'all' ? $data['subject_selected']->code : '') : '') == $subject->code) selected @endif  value="{{ $subject->code }}">{{ $subject->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary mt-3" type="submit">
                            بحث
                        </button>
                        @if(isset($data['institute_selected']))

                        <a href="{{ URL('/admin/print-teacher-with-institutes?institute='.$data['institute_selected']->code.'&subject='.(isset($data['subject_selected']) ? ($data['subject_selected'] != 'all' ? $data['subject_selected']->code : 'all') : 'all') ) }}" class="btn btn-primary mt-3" >
                            طباعة
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </form>
        <div class="container p-2">
            <div class="row">
                <div class="col-12">
                    <div class="card widget-inline" style="border: 1px solid #36c7eb52;">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="mb-3"> حصر عام بأعداد المعملين مقسمة لمعاهد بالتخصصات المختلفة</h3>
                                            @if(isset($data['institute_selected']))
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0" >
                                                    <thead>
                                                        <tr>
                                                            <th>المعهد</th>
                                                            <th>التخصصات</th>
                                                            <th>عدد الفصور</th>
                                                            <th>عدد المعلمين</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                            <td>{{ $data['institute_selected'] != 'all' ? $data['institute_selected']->name : 'الكل' }}</td>
                                                            <td>{{ $data['subject_selected'] != 'all' ? $data['subject_selected']->name : 'الكل'}}</td>
                                                            <td>{{  $data['institute_selected']->class_numbers }}</td>
                                                            <td>{{ $data['teacher_count'] }}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            @else
                                                <h5 >من فضلك اختر المعهد</h5>
                                            @endif
                                        </div>
                                    </div> <!-- end card -->
                                </div> <!-- end col -->

                            </div>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            @if(isset($data['teachers']))
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
                                            <th>المعهد الاساسى</th>
                                            <th> المعهد المنتدب اليه</th>
                                            <th> خيارات</th>
                                        </tr>
                                    </thead>

                                    {{-- Table body --}}
                                    <tbody>
                                        @foreach ($data['teachers'] as $teacher)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $teacher->teacher_name }}</td>
                                                <td>{{ $teacher->teacher_code }}</td>
                                                <td>{{ $teacher->institute }}</td>
                                                <td>{{ $teacher->another_institute }}</td>
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

    </div>


    </div>
@endsection
@section('custom-script')
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>

@endsection
