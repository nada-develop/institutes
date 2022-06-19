@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.roles.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                        name="title" id="title" value="{{ old('title', '') }}" required>
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control {{ $errors->has('permissions') ? 'is-invalid' : '' }}"
                        data-toggle="select2" name="permissions[]" id="permissions" multiple required>
                        @foreach ($permissions as $id => $permission)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permission }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('permissions'))
                        <span class="text-danger">{{ $errors->first('permissions') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-success" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('custom-script')
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script> --}}
    <script>
        $('.select-all').on('click', function() {
            $('#permissions').select2('destroy').find('option').prop('selected', 'selected').end().select2();
        });

        $('.deselect-all').on('click', function() {
            $('#permissions').select2('destroy').find('option').prop('selected', false).end().select2();
        });
    </script>
@endsection
