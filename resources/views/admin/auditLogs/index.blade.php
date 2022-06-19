@extends('layouts.admin')
@section('content')

<div class="card mt-3">
    <div class="card-header">
        {{ trans('cruds.auditLog.title_singular') }} {{ trans('global.list') }}
    </div>


    <div class="row p-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0 ">

                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>

                                <th>
                                    {{ trans('cruds.auditLog.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.auditLog.fields.description') }}
                                </th>
                                <th>
                                    {{ trans('cruds.auditLog.fields.subject_id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.auditLog.fields.subject_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.auditLog.fields.user_id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.auditLog.fields.host') }}
                                </th>
                                <th>
                                    {{ trans('cruds.auditLog.fields.created_at') }}
                                </th>
                                <th>
                                  Action
                                </th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach($logs as $key => $log)
            <tr data-entry-id="{{ $log->id }}">
                <td>
                    {{ $log->id }}
                </td>
                <td>
                    {{ $log->description ?? '' }}
                </td>
                <td>
                    {{ $log->subject_id ?? '' }}
                </td>
                <td>
                    {{ $log->subject_type ?? '' }}
                </td>
                <td>
                    {{ $log->user_id ?? '' }}
                </td>
                <td>
                    {{ $log->host ?? '' }}


                </td>
                <td>
                    {{ $log->created_at ?? '' }}

                </td>
                <td>
                    @can('audit_log_show')
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.audit-logs.show', $log->id) }}">
                            {{ trans('global.view') }}
                        </a>
                    @endcan
                </td>

            </tr>
        @endforeach

                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

</div>



@endsection
