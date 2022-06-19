@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            تحليل المعاهد
        </div>
        <div class="container p-2">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group mb-2">
                        <label for="" class="mb-1">المناطق</label>
                        <select class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}" data-toggle="select2"
                            name="region" id="region" required>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-2">
                        <label for="" class="mb-1">الادارات</label>
                        <select class="form-control {{ $errors->has('region1') ? 'is-invalid' : '' }}"
                            data-toggle="select2" name="region1" id="region1" required>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-2">
                        <label for="" class="mb-1">المعاهد</label>
                        <select class="form-control {{ $errors->has('region2') ? 'is-invalid' : '' }}"
                            data-toggle="select2" name="region2" id="region2" required>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mb-2">
                        <label for="" class="mb-1">المعلمين</label>
                        <select class="form-control {{ $errors->has('region3') ? 'is-invalid' : '' }}"
                            data-toggle="select2" name="region3" id="region3" required>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                            <option>Data </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary" >
                        بحث
                    </button>
                </div>
            </div>
        </div>
        <div class="container p-2">
            <div class="row">
                <div class="col-12">
                    <div class="card widget-inline" style="border: 1px solid #36c7eb52;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-xl-3">
                                    <div class="p-2 text-center">
                                        <i class="mdi mdi-cart-plus text-primary mdi-24px"></i>
                                        <h3><span data-plugin="counterup">8954</span></h3>
                                        <p class="text-muted font-15 mb-0">الادارات</p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <div class="p-2 text-center">
                                        <i class="mdi mdi-currency-usd text-success mdi-24px"></i>
                                        <h3><span data-plugin="counterup">7841</span></h3>
                                        <p class="text-muted font-15 mb-0">المعاهد</p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <div class="p-2 text-center">
                                        <i class="mdi mdi-account-group text-danger mdi-24px"></i>
                                        <h3><span data-plugin="counterup">6521</span></h3>
                                        <p class="text-muted font-15 mb-0">التخصصات</p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <div class="p-2 text-center">
                                        <i class="mdi mdi-eye-outline text-blue mdi-24px"></i>
                                        <h3><span data-plugin="counterup">325</span> </h3>
                                        <p class="text-muted font-15 mb-0">المعلمين</p>
                                    </div>
                                </div>

                            </div> <!-- end row -->
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
