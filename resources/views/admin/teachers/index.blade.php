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
@endsection
@section('custom-script')
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
@endsection
