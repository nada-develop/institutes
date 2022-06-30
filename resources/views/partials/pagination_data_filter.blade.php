@php
$envPaninationLength = env('PAGINATION_LENGTH', 5);
$envPaninationLengthFilter = json_decode(env('PAGINATION_LENGTH_FILTER'), true) ?? [5, 10, 25, 50, -1];
@endphp

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="dataTables_length" id="table_records_length">
                <label>@lang('dashboard.Show') <select name="table_records_length" aria-controls="datatableTemplate"
                        class="custom-select custom-select-sm form-control form-control-sm">
                        @foreach ($envPaninationLengthFilter as $envPaninationLength)
                            @if ($loop->last)
                                <option value="-1">@lang('dashboard.All')</option>
                            @else
                                <option value="{{ $envPaninationLength }}">{{ $envPaninationLength }}</option>
                            @endif
                        @endforeach
                    </select> @lang('dashboard.Records')</label>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div id="datatableTemplate_filter" class="dataTables_filter"><label>@lang('dashboard.Search'):
                    <input id="search-content" type="search" name="search" class="form-control form-control-sm"
                        placeholder="@lang('dashboard.Search')" aria-controls="datatableTemplate"></label>

            </div>
        </div>
    </div>
