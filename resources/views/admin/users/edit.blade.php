@extends('layouts.admin')
@section('content')

<div class="card mt-3">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group mb-2">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group mb-2">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group mb-2">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group mb-2">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control  {{ $errors->has('roles') ? 'is-invalid' : '' }}"   data-toggle="select2" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>

            <div class="search-loader d-none">
                <div  class="la-ball-clip-rotate-multiple la-2x loader-spinner">
                  <div></div>
                  <div></div>
              </div>
            </div>
            <div class="row mt-3">
            <div class="col-md-4">
                <div class="form-group mb-2">
                    <label for="" class="mb-1">المناطق</label>
                    <select class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}"
                        data-toggle="select2" name="region" id="region" required>
                        <option selected disabled>اختر المنطقة</option>
                        @foreach ($data['regions'] as $region)
                            <option @if( $user->region_code == $region->code) selected @endif value="{{ $region->code }}">{{ $region->name }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-2">
                    <label for="" class="mb-1">الادارات</label>
                    <select class="form-control {{ $errors->has('management') ? 'is-invalid' : '' }}"
                        data-toggle="select2" name="management" id="management" required>
                        @if (isset($data['managements']))
                        <option selected disabled> اختر الاداره </option>
                            @foreach ($data['managements'] as $management)
                                <option @if( $user->management_code == $management->code) selected @endif value="{{ $management->code }}">{{ $management->name }} </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group mb-2">
                    <label for="" class="mb-1">المعاهد</label>
                    <select class="form-control {{ $errors->has('institute') ? 'is-invalid' : '' }}"
                        data-toggle="select2" name="institute" id="institute" required>
                        @if (isset($data['institutes']))
                        <option selected disabled> اختر المعهد </option>
                        @foreach ($data['institutes'] as $institute)
                            <option @if($user->institute_code == $institute->code) selected @endif value="{{ $institute->code }}">{{ $institute->name }} </option>
                        @endforeach
                    @endif
                    </select>
                </div>
            </div>
            <div class="col-12">
                  <input type="radio" id="management" name="another_roles" value="management" @if($user->active_management == 1) checked @endif>
                  <label for="management">الادراة</label><br>
                  <input type="radio" id="region" name="another_roles" value="region"  @if($user->active_region == 1) checked @endif>
                  <label for="region">المنطقة</label>
            </div>
            </div>

            <div class="form-group mt-2">
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
            $('#roles').select2('destroy').find('option').prop('selected', 'selected').end().select2();
        });

        $('.deselect-all').on('click', function() {
            $('#roles').select2('destroy').find('option').prop('selected', false).end().select2();
        });
    </script>
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
                        $.each(response, function(name, code) {
                            $('#management').append(
                                `<option value="${code}"> ${name}</option>`);
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
                        $.each(response, function(name, code) {
                            $('#institute').append(
                                `<option value="${code}"> ${name}</option>`);
                        });
                    }
                },
            });


        });
    </script>

@endsection
