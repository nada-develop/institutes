@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            تحليل المعاهد
        </div>
        <form action="{{ route('admin.teacher_with_places') }}" method="get">
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
                                <option value="all" selected>جميع المناطق</option>
                                @foreach ($data['regions'] as $region)
                                    <option @if( (isset($data['region_selected']) ? ($data['region_selected'] != 'all' ? $data['region_selected']->code : '') : '') == $region->code) selected @endif  value="{{ $region->code }}">{{ $region->name }} </option>
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
                        @if(isset($data['region_selected']))

                        <a href="{{ URL('/admin/print-teacher-with-places?region='.(isset($data['region_selected']) ? ($data['region_selected'] != 'all' ? $data['region_selected']->code : 'all') : 'all').'&subject='.(isset($data['subject_selected']) ? ($data['subject_selected'] != 'all' ? $data['subject_selected']->code : 'all') : 'all')) }}" class="btn btn-primary mt-3" >
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
                                            <h3 class="mb-3"> حصر عام بأعداد المعملين مقسمة لمناطق بالتخصصات المختلفة</h3>
                                            @if(isset($data['region_selected']))
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0" >
                                                    <thead>
                                                        <tr>
                                                            <th>المنطقة</th>
                                                            <th>التخصصات</th>
                                                            <th>عدد المعلمين</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>

                                                            <td>{{ $data['region_selected'] != 'all' ? $data['region_selected']->name : 'الكل' }}</td>
                                                            <td>{{ $data['subject_selected'] != 'all' ? $data['subject_selected']->name : 'الكل'}}</td>
                                                            <td>{{ $data['teacher_count'] }}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            @else
                                                <h5 >من فضلك اختر المنطقة</h5>
                                            @endif
                                        </div>
                                    </div> <!-- end card -->
                                </div> <!-- end col -->

                            </div>
                        </div>
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
        </div>
    </div>


    </div>
@endsection
@section('custom-script')
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>

@endsection
