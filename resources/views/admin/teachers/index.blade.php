@extends('layouts.admin')
@section('content')
    @can('teacher_create')
        <div style="margin-bottom: 10px;" class="row mt-2">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.teachers.create') }}">
                    أضافة معلم
                </a>
            </div>
        </div>
    @endcan
    <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-4">
            <div class="custom-file text-left">
                <input type="file" name="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
                <button class="btn btn-primary">Import Teachers</button>
            </div>
        </div>
    </form>
    <div class="card">
        <div class="card-header">
            قائمة المعلمين
        </div>
        <div class="card-body">
            <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                {{-- Table length filter --}}
                @include('partials.pagination_data_filter')

                {{-- Table content --}}
                <div id="table-data" class="table-responsive">
                    @include('admin.teachers.pagination_data', ['pageType' => 'index'])
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('custom-script')
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script>
        const fetchDataURL =
            "{{ route('admin.teacher.pagination.fetch_data') }}", // This valriable used in pagination_script
            pageType = 'index';

        @include('partials.pagination_script')
    </script>
@endsection
