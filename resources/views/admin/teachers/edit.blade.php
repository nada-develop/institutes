@extends('layouts.admin')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">  تعديل معلم ({{  $data['teacher']['teacher_name'] }})  </h4>
                            <p class="sub-header">يجب الانتباه لجميع المدخلات</p>
                            <form class="needs-validation" method="post" action="{{ route('admin.teachers.update', $data['teacher']['id']) }}"
                                novalidate>
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="search-loader d-none">
                                        <div class="la-ball-clip-rotate-multiple la-2x loader-spinner">
                                            <div></div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">كود المعلم</label>
                                            <input type="number" class="form-control" id="validationCustom01"
                                                name="teacher_code" value="{{  $data['teacher']['teacher_code'] }}" placeholder="كود المعلم" required />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label"> أسم المعلم</label>
                                            <input type="text" class="form-control" id="validationCustom01"
                                                name="teacher_name" placeholder="الاسم " value="{{  $data['teacher']['teacher_name'] }}" required />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label"> رقم السجل </label>
                                            <input type="number" class="form-control" id="validationCustom01"
                                                name="record_number" value="{{  $data['teacher']['record_number'] }}" placeholder="رقم السجل " required />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label"> الرفم القومى </label>
                                            <input type="number" class="form-control" value="{{  $data['teacher']['national_ID'] }}" id="validationCustom01"
                                                name="national_ID" placeholder="الرقم القومى " required />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom01" class="form-label">النوع</label>
                                            <select name="gender" id="" class="form-control" required>
                                                <option value="male" @if ($data['teacher']['gender'] == 'male') selected @endif>ذكر</option>
                                                <option value="female" @if ($data['teacher']['gender'] == 'female') selected @endif >انثى</option>
                                            </select>

                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="qualification_type" class="form-label"> نوع المؤهل</label>
                                            <select class="form-control" id="qualification_type" name="qualification_type"
                                                data-toggle="select2" required>
                                                @foreach ($data['qualifications_type'] as $qualification)
                                                    <option value="{{ $qualification->type }}" @if ($data['teacher']['qualification_type'] == $qualification->type) selected @endif>
                                                        {{ $qualification->type }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="qualification_name" class="form-label"> المؤهل</label>
                                            <select class="form-control" id="qualification_name" name="qualification_name"
                                                data-toggle="select2" required>
                                                @foreach ($data['qualifications'] as $qualification)
                                                <option value="{{ $qualification->name }}"
                                                    data-code="{{ $qualification->code }}"
                                                     @if ($data['teacher']['qualification_code'] == $qualification->code) selected @endif>
                                                    {{ $qualification->name }}</option>
                                            @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="qualification_code" class="form-label"> كود المؤهل </label>
                                            <input class="form-control" type="number" id="qualification_code" name="qualification_code"
                                            value="{{  $data['teacher']['qualification_code'] }}"      readonly required>
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label"> تاريخ الحصول على المؤهل
                                            </label>
                                            <input type="date" class="form-control" id="validationCustom03"
                                                name="qualification_date" value="{{  $data['teacher']['qualification_date'] }}" required>
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="color: #cea120">
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1">المنطقة</label>
                                            <select class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}"
                                                data-toggle="select2" name="region" id="region" required>
                                                <option selected disabled>اختر المنطقة</option>
                                                @foreach ($data['regions'] as $region)
                                                    <option value="{{ $region->name }}"
                                                        @if ($data['teacher']['region'] == $region->name) selected @endif
                                                        data-code="{{ $region->code }}">{{ $region->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1">كود المنطقه</label>
                                            <input
                                                class="form-control {{ $errors->has('region_code') ? 'is-invalid' : '' }}"
                                                name="region_code"  value="{{  $data['teacher']['region_code'] }}"  id="region_code" readonly required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1">الاداره</label>
                                            <select
                                                class="form-control {{ $errors->has('management') ? 'is-invalid' : '' }}"
                                                data-toggle="select2" name="management" id="management" required>
                                                @foreach ($data['managements'] as $management)
                                                <option value="{{ $management->name }}"
                                                    @if ($data['teacher']['management_code'] == $management->management_code) selected @endif
                                                    data-code="{{ $management->code }}">{{ $management->name }} </option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1">كود الادراه</label>
                                            <input
                                                class="form-control {{ $errors->has('management_code') ? 'is-invalid' : '' }}"
                                                name="management_code" value="{{  $data['teacher']['management_code'] }}" id="management_code" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1">المعهد</label>
                                            <select
                                                class="form-control {{ $errors->has('institute') ? 'is-invalid' : '' }}"
                                                data-toggle="select2" name="institute" id="institute" required>
                                                @foreach ($data['institutes'] as $institute)
                                                <option value="{{ $institute->name }}"
                                                    @if ($data['teacher']['institute_code'] == $institute->code) selected @endif
                                                    data-code="{{ $institute->code }}">{{ $institute->name }} </option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1">كود المعهد</label>
                                            <input
                                                class="form-control {{ $errors->has('institute_code') ? 'is-invalid' : '' }}"
                                                name="institute_code"  value="{{  $data['teacher']['institute_code'] }}" id="institute_code" readonly required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1">معهد أخر</label>
                                            <select
                                                class="form-control {{ $errors->has('another_institute') ? 'is-invalid' : '' }}"
                                                data-toggle="select2" name="another_institute" id="another_institute">
                                                @foreach ($data['institutes'] as $institute)
                                                <option value="{{ $institute->name }}"
                                                    @if ($data['teacher']['another_institute_code'] == $institute->code) selected @endif
                                                    data-code="{{ $institute->code }}">{{ $institute->name }} </option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1"> كود المعهد الاخر</label>
                                            <input
                                                class="form-control {{ $errors->has('another_institute_code') ? 'is-invalid' : '' }}"
                                                name="another_institute_code"  value="{{  $data['teacher']['another_institute_code'] }}"  id="another_institute_code" readonly
                                                >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1">مادة التخصص</label>
                                            <select
                                                class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}"
                                                data-toggle="select2" name="subject" id="subject" required>
                                                @foreach ($data['subjects'] as $subject)
                                                    <option value="{{ $subject->name }}"
                                                        @if ($data['teacher']['subject_code'] == $subject->code) selected @endif
                                                        data-code="{{ $subject->code }}">{{ $subject->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1"> كود مادة التخصص</label>
                                            <input
                                                class="form-control {{ $errors->has('subject_code') ? 'is-invalid' : '' }}"
                                                name="subject_code"  value="{{  $data['teacher']['subject_code'] }}" id="subject_code" readonly required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1">مادة تخصص 1 </label>
                                            <select
                                                class="form-control {{ $errors->has('another_subject') ? 'is-invalid' : '' }}"
                                                data-toggle="select2" name="another_subject" id="another_subject"
                                                >
                                                <option value="">اختر المادة</option>
                                                @foreach ($data['subjects'] as $subject)
                                                    <option value="{{ $subject->name }}"
                                                        @if ($data['teacher']['another_subject_code'] == $subject->code) selected @endif
                                                        data-code="{{ $subject->code }}" >{{ $subject->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1"> كود مادة التخصص 1 </label>
                                            <input
                                                class="form-control {{ $errors->has('another_subject_code') ? 'is-invalid' : '' }}"
                                                name="another_subject_code"  value="{{  $data['teacher']['another_subject_code'] }}" id="another_subject_code" readonly >
                                        </div>

                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1">مادة تخصص 2 </label>
                                            <select
                                                class="form-control {{ $errors->has('another_subject_two') ? 'is-invalid' : '' }}"
                                                data-toggle="select2" name="another_subject_two" id="another_subject_two"
                                                >
                                                <option value="">اختر المادة</option>
                                                @foreach ($data['subjects'] as $subject)
                                                    <option value="{{ $subject->name }}"
                                                        @if ($data['teacher']['another_subject_two_code'] == $subject->code) selected @endif
                                                        data-code="{{ $subject->code }}" >{{ $subject->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group mb-2">
                                            <label for="" class="mb-1"> كود مادة التخصص 2 </label>
                                            <input
                                                class="form-control {{ $errors->has('another_subject_two_code') ? 'is-invalid' : '' }}"
                                                name="another_subject_two_code"  value="{{  $data['teacher']['another_subject_two_code'] }}" id="another_subject_two_code" readonly >
                                        </div>

                                    </div>
                                    <hr style="color: #cea120">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="job_attitude" class="form-label">الموقف من العمل</label>
                                            <select name="job_attitude" id="job_attitude" data-toggle="select2"
                                                class="form-control" required>
                                                <option value="اختر من القائمة" data-code="0"> اختر من القائمة </option>
                                                <option data-code="1"  @if ($data['teacher']['job_attitude_code'] == '1') selected @endif>على رأس عملة</option>
                                                <option data-code="2"  @if ($data['teacher']['job_attitude_code'] == '2') selected @endif>معار للخارج</option>
                                                <option data-code="3"  @if ($data['teacher']['job_attitude_code'] == '3') selected @endif>منتدب للخارج</option>
                                                <option data-code="5"  @if ($data['teacher']['job_attitude_code'] == '5') selected @endif>معار للداخل</option>
                                                <option data-code="6"  @if ($data['teacher']['job_attitude_code'] == '6') selected @endif>انهاء خدمه</option>
                                                <option data-code="17"  @if ($data['teacher']['job_attitude_code'] == '17') selected @endif>اجازة بدون مرتب</option>
                                            </select>

                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="job_attitude_code" class="form-label"> كود الموقف من العمل
                                            </label>
                                            <input type="number" class="form-control" id="job_attitude_code"
                                                name="job_attitude_code" readonly placeholder="كود الموقف من العمل  "
                                                required  />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="efficiency" class="form-label"> الكفاءة </label>
                                            <select name="efficiency" id="efficiency" data-toggle="select2"
                                                class="form-control" required>
                                                <option data-code="P02"  @if ($data['teacher']['efficiency_code'] == 'P02') selected @endif >رياض أطفال</option>
                                                <option data-code="P03"  @if ($data['teacher']['efficiency_code'] == 'P03') selected @endif >إبتدائى</option>
                                                <option data-code="P04"  @if ($data['teacher']['efficiency_code'] == 'P04') selected @endif >إعدادى / ثانوى</option>
                                                <option data-code="P67"  @if ($data['teacher']['efficiency_code'] == 'P67') selected @endif >أخصائى إجتماعى</option>
                                            </select>

                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="efficiency_code" class="form-label"> كود الكفاءه </label>
                                            <input type="text" class="form-control" id="efficiency_code"
                                                name="efficiency_code" readonly placeholder="كود الكفاءه  " required />
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="degree" class="form-label">الدرجة </label>
                                            <select class="form-control" id="degree" name="degree" data-toggle="select2"
                                                required>
                                                <option data-code="2" @if ($data['teacher']['degree_code'] == '2') selected @endif>عليا</option>
                                                <option data-code="3" @if ($data['teacher']['degree_code'] == '3') selected @endif>مديرعام</option>
                                                <option data-code="5" @if ($data['teacher']['degree_code'] == '5') selected @endif>الأولى</option>
                                                <option data-code="6" @if ($data['teacher']['degree_code'] == '6') selected @endif>الثانية</option>
                                                <option data-code="7" @if ($data['teacher']['degree_code'] == '7') selected @endif>الثالثة</option>
                                                <option data-code="11" @if ($data['teacher']['degree_code'] == '11') selected @endif>بدون درجة</option>
                                            </select>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="degree_code" class="form-label">كود الدرجة</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="degree_code"
                                                    name="degree_code" readonly placeholder="كود الدرجه"
                                                    aria-describedby="inputGroupPrepend"  required />
                                                <div class="invalid-feedback">
                                                    Required Field
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label">تاريخ الحصول</label>
                                            <input type="date" class="form-control" id="validationCustom03"
                                                name="date_of_obtaining"  value="{{ $data['teacher']['date_of_obtaining'] }}"  required />
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label">تاريخ التعيين</label>
                                            <input type="date" class="form-control" id="validationCustom03"
                                                name="hiring_date" value="{{ $data['teacher']['hiring_date'] }}" required />
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label"> نوع التعيين</label>
                                            <select class="form-control" id="validationCustom03" name="hiring_type"
                                                required>
                                                <option value="1"  @if ($data['teacher']['hiring_type'] == '1') selected @endif>1</option>
                                                <option value="2"  @if ($data['teacher']['hiring_type'] == '2') selected @endif>2</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label">تاريخ استلام العمل</label>
                                            <input type="date" class="form-control" id="validationCustom03"
                                                name="date_receipt_the_work" value="{{ $data['teacher']['date_receipt_the_work'] }}"  required />
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="job_staff" class="form-label"> الوظيفة على كادر
                                                المعلم</label>
                                            <select class="form-control" id="job_staff" name="job_staff"
                                                data-toggle="select2" required>
                                                <option value="0" data-code="0"  @if ($data['teacher']['job_staff_code'] == '0') selected @endif > --- </option>
                                                <option data-code="1"  @if ($data['teacher']['job_staff_code'] == '1') selected @endif >غير مستوفي شروط التسكين</option>
                                                <option data-code="202"  @if ($data['teacher']['job_staff_code'] == '202') selected @endif >معلم </option>
                                                <option data-code="203"  @if ($data['teacher']['job_staff_code'] == '203') selected @endif >معلم أول </option>
                                                <option data-code="204"  @if ($data['teacher']['job_staff_code'] == '204') selected @endif >معلم أول أ</option>
                                                <option data-code="205"  @if ($data['teacher']['job_staff_code'] == '205') selected @endif >معلم خبير</option>
                                                <option data-code="206"  @if ($data['teacher']['job_staff_code'] == '206') selected @endif >كبير معلمين</option>
                                                <option data-code="208"  @if ($data['teacher']['job_staff_code'] == '208') selected @endif >أخصائى اجتماعى </option>
                                                <option data-code="209"  @if ($data['teacher']['job_staff_code'] == '209') selected @endif >أخصائى اجتماعى أول</option>
                                                <option data-code="210"  @if ($data['teacher']['job_staff_code'] == '210') selected @endif >أخصائى اجتماعى أول أ</option>
                                                <option data-code="211"  @if ($data['teacher']['job_staff_code'] == '211') selected @endif >أخصائى اجتماعى خبير</option>
                                                <option data-code="212"  @if ($data['teacher']['job_staff_code'] == '212') selected @endif >كبير أخصائيين اجتماعيين</option>
                                                <option data-code="213"  @if ($data['teacher']['job_staff_code'] == '213') selected @endif >مشرف اجتماعى</option>
                                                <option data-code="214"  @if ($data['teacher']['job_staff_code'] == '214') selected @endif >مشرف اجتماعى أول</option>
                                                <option data-code="215"  @if ($data['teacher']['job_staff_code'] == '215') selected @endif >مشرف اجتماعى أول أ</option>
                                                <option data-code="216"  @if ($data['teacher']['job_staff_code'] == '216') selected @endif >مشرف اجتماعى خبير</option>
                                                <option data-code="224"  @if ($data['teacher']['job_staff_code'] == '224') selected @endif >أخصائى تكنولوجيا</option>
                                                <option data-code="230"  @if ($data['teacher']['job_staff_code'] == '230') selected @endif >أخصائى صحافة وإعلام</option>
                                                <option data-code="233"  @if ($data['teacher']['job_staff_code'] == '233') selected @endif >أخصائى صحافة واعلام خبير</option>
                                                <option data-code="236"  @if ($data['teacher']['job_staff_code'] == '236') selected @endif >أمين مكتبة </option>
                                                <option data-code="237"  @if ($data['teacher']['job_staff_code'] == '237') selected @endif >أمين مكتبة أول</option>
                                                <option data-code="238"  @if ($data['teacher']['job_staff_code'] == '238') selected @endif >أمين مكتبة أول أ</option>
                                                <option data-code="239"  @if ($data['teacher']['job_staff_code'] == '239') selected @endif >أمين مكتبة خبير</option>
                                                <option data-code="240"  @if ($data['teacher']['job_staff_code'] == '240') selected @endif >كبيرأمناء مكتبات</option>
                                                <option data-code="241"  @if ($data['teacher']['job_staff_code'] == '241') selected @endif >موجه</option>
                                                <option data-code="243"  @if ($data['teacher']['job_staff_code'] == '243') selected @endif >موجه أول</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="job_staff_code" class="form-label"> كود الوظيفة على كادرالمعلم
                                            </label>
                                            <input class="form-control" type="number" id="job_staff_code"
                                                name="job_staff_code"  readonly required>
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label">تاريخ قرار الوظيفة على
                                                الكادر</label>
                                            <input type="date" class="form-control" id="validationCustom03"
                                                name="job_decision_staff_date"  value="{{ $data['teacher']['job_decision_staff_date'] }}" required />
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="validationCustom03" class="form-label"> رقم قرار الوظيفة على
                                                الكادر</label>
                                            <input class="form-control" id="validationCustom03" type="number"
                                                name="job_decision_staff_code" value="{{ $data['teacher']['job_decision_staff_code'] }}" required>
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="group_type" class="form-label"> المجموعة النوعية</label>
                                            <select class="form-control" id="group_type" name="group_type"
                                                data-toggle="select2" required>
                                                <option data-code="1" @if ($data['teacher']['group_type_code'] == '1') selected @endif >المجموعة النوعية لوظائف هيئة التعليم</option>
                                                <option data-code="2" @if ($data['teacher']['group_type_code'] == '2') selected @endif >النوعية لوظائف التعليم والدعوة</option>
                                                <option data-code="3" @if ($data['teacher']['group_type_code'] == '3') selected @endif >المجموعة النوعية للتعليم الازهرى والدعوة الاسلامية
                                                </option>
                                                <option data-code="4" @if ($data['teacher']['group_type_code'] == '4') selected @endif >النوعية الفنية لوظائف التعليم الابتدائى</option>
                                                <option data-code="7" @if ($data['teacher']['group_type_code'] == '7') selected @endif >التخصصية غير التعليمية</option>
                                                <option data-code="10" @if ($data['teacher']['group_type_code'] == '10') selected @endif >النوعية لوظائف المكتبات والوثائق</option>
                                                <option data-code="17" @if ($data['teacher']['group_type_code'] == '17') selected @endif >النوعية لوظائف الخدمات الاجتماعية</option>
                                                <option data-code="18" @if ($data['teacher']['group_type_code'] == '18') selected @endif >النوعية الفنية لوظائف الخدمات الدينية</option>
                                                <option data-code="19" @if ($data['teacher']['group_type_code'] == '19') selected @endif >المجموعة النوعية لوظائف الاعلام</option>
                                                <option data-code="20" @if ($data['teacher']['group_type_code'] == '20') selected @endif >العقود للمعلم / الأخصائي المساعد</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="group_type_code" class="form-label"> كود المجموعة النوعية
                                            </label>
                                            <input class="form-control" type="number" id="group_type_code"
                                                name="group_type_code" readonly required>
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="job_name" class="form-label"> الوظيفة </label>
                                            <select class="form-control" id="job_name" name="job_name"
                                                data-toggle="select2" required>
                                                @foreach ($data['jobs'] as $job)
                                                    <option value="{{ $job->name }}"
                                                        @if ($data['teacher']['job_name'] == $job->name) selected @endif
                                                        data-code="{{ $job->code }}">
                                                        {{ $job->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="job_code" class="form-label"> كود الوظيفة </label>
                                            <input class="form-control" type="number" id="job_code"
                                            $data['teacher']['job_code'] name="job_code"
                                                required>
                                            <div class="invalid-feedback">
                                                Required Field
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">حفظ</button>
                                    </div>
                                </div>
                        </div>
                        </form>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <!-- end col-->
        </div>




    </div>

    </div>
@endsection
@section('custom-script')
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#job_name').trigger('change');
           // $('#qualification_name').trigger('change');
            $('#group_type').trigger('change');
            $('#job_staff').trigger('change');
            $('#degree').trigger('change');
            $('#job_attitude').trigger('change');
            $('#subject').trigger('change');
            $('#another_subject').trigger('change');
            $('#another_subject_two').trigger('change');
            $('#efficiency').trigger('change');

        });
        $('#region').on('change', function() {
            var region_code = $(this).find(":selected").data('code');
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
                    $('#institute').find('option').remove();
                    $('#another_institute').find('option').remove();
                    $('#management_code').val('');
                    $('#institute_code').val('');
                    $('#another_institute_code').val('');
                    if (response.length != 0) {
                        $('#region_code').val(region_code);
                        $('#management').append(`<option selected disabled> اختر الاداره </option>`);
                        $.each(response, function(index, value) {
                            $('#management').append(
                                `<option value="${index}" data-code="${value}"> ${index}</option>`
                                );
                        });
                    }
                },
            });

        });
        $('#management').on('change', function() {
            var management_code = $(this).find(":selected").data('code');
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
                    $('#another_institute').find('option').remove();
                    $('#institute_code').val('');
                    $('#another_institute_code').val('');
                    if (response.length != 0) {
                        $('#management_code').val(management_code);
                        $('#institute').append(`<option selected disabled> اختر المعهد </option>`);
                        $.each(response, function(index, value) {
                            $('#institute').append(
                                `<option value="${index}" data-code="${value}"> ${index}</option>`
                                );
                        });

                        $('#another_institute').append(
                            `<option value=""> اختر المعهد </option>`);
                        $.each(response, function(index, value) {
                            $('#another_institute').append(
                                `<option value="${index}" data-code="${value}"> ${index}</option>`
                                );
                        });
                    }
                },
            });

        });
        $('#qualification_type').on('change', function() {
            var qualification_type = $(this).val();
            $('.search-loader').removeClass('d-none');
            $.ajax({
                url: "/admin/fetch-qualification-from-type",
                type: "GET",
                data: {
                    qualification_type: qualification_type
                },
                success: function(response) {
                    $('.search-loader').addClass('d-none');

                    $('#qualification_name').find('option').remove();
                    if (response.length != 0) {
                        $('#qualification_name').append(
                            `<option value="اختر من القائمة" data-code="0">اختر من القائمة</option>`
                            );
                        $.each(response, function(index, value) {
                            $('#qualification_name').append(
                                `<option value="${index}" data-code="${value}"> ${index}</option>`
                                );
                        });
                    }
                    $('#qualification_name').trigger('change');
                },
            });
        });
        $('#institute').on('change', function() {
            var institute_code = $(this).find(":selected").data('code');
            $('#institute_code').val(institute_code);
        });
        $('#another_institute').on('change', function() {
            var another_institute_code = $(this).find(":selected").data('code');
            $('#another_institute_code').val(another_institute_code);
        });
        $('#subject').on('change', function() {
            $('#subject_code').val($(this).find(":selected").data('code'));
        });
        $('#another_subject').on('change', function() {
            $('#another_subject_code').val($(this).find(":selected").data('code'));
        });
        $('#another_subject_two').on('change', function() {
            $('#another_subject_two_code').val($(this).find(":selected").data('code'));
        });
        $('#job_name').on('change', function() {
            $('#job_code').val($(this).find(":selected").data('code'));
        });
        $('#qualification_name').on('change', function() {
            $('#qualification_code').val($(this).find(":selected").data('code'));
        });
        $('#group_type').on('change', function() {
            $('#group_type_code').val($(this).find(":selected").data('code'));
        });
        $('#job_staff').on('change', function() {
            $('#job_staff_code').val($(this).find(":selected").data('code'));
        });
        $('#degree').on('change', function() {
            $('#degree_code').val($(this).find(":selected").data('code'));
        });
        $('#job_attitude').on('change', function() {
            $('#job_attitude_code').val($(this).find(":selected").data('code'));
        });
        $('#efficiency').on('change', function() {
            $('#efficiency_code').val($(this).find(":selected").data('code'));
        });
    </script>
@endsection
