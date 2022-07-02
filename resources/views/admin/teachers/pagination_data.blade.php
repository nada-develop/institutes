@php
$currentLanguage = app()->getLocale();
$currentIndex = $teachers->firstItem();
@endphp

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
                <td>{{ $currentIndex++ }}</td>
                <td>{{ $teacher->teacher_name }}</td>
                <td>{{ $teacher->teacher_code }}</td>
                <td>{{ $teacher->institute }}</td>
                <td>
                    <div class="service-option">

                            <a class=" btn btn-warning my-1 mx-0"
                            style="height: 29px" href="{{ route('admin.teachers.edit', $teacher->id) }}">
                                <i class="fa fa-edit" ></i>
                                تعديل </a>
                                <form action="{{ route('admin.teachers.destroy',$teacher->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                       <button type="submit" class="btn  btn-danger  my-1 mx-0" >
                                        <i class="las la-trash"></i>
                                     حذف
                                    </button>
                            </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>





<div class="row m-0">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="basic-datatable_info" role="status" aria-live="polite">
            @lang('dashboard.show')
            {{ $teachers->currentPage() }} @lang('dashboard.from') {{ $teachers->lastPage() }}

            @if ($teachers->lastPage() > 1)
                @lang('dashboard.pages')
            @else
                @lang('dashboard.pages')
            @endif
        </div>
    </div>
    <div class="col-sm-12 col-md-7 ">
        <div class="dataTables_paginate paging_simple_numbers" id="basic-datatable_paginate">
            {{ $teachers->links('partials.paginator') }}
        </div>
    </div>
</div>