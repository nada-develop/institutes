@extends('layouts.admin')
@section('content')


    <div class="card mt-4">

        <div class="card-body"  style="background: #eceef0;">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-4 col-xl-4">
                        <div class="card text-center">
                            <div class="card-body">

                                <h4 class="mb-0">{{ $teacher->teacher_name }}</h4>
                                <p class="text-muted mt-2">الكود : {{ $teacher->teacher_code }}</p>
                                <hr>

                                <div class="text-start mt-3">

                                    <p class="text-muted mb-2 font-13"><strong>رقم السجل :</strong> <span class="ms-2">{{ $teacher->record_number }}</span></p>

                                    <p class="text-muted mb-2 font-13"><strong>الرقم القومى :</strong><span class="ms-2">{{ $teacher->national_ID }}</span></p>

                                    <p class="text-muted mb-2 font-13"><strong>النوع :</strong> <span class="ms-2"> {{ $teacher->gender }}</span></p>

                                    <p class="text-muted mb-2 font-13"><strong>المؤهل :</strong> <span class="ms-2">{{ $teacher->qualification_name }}</span></p>
                                    <p class="text-muted mb-2 font-13"><strong>نوع المؤهل :</strong> <span class="ms-2">{{ $teacher->qualification_type }}</span></p>
                                    <p class="text-muted mb-2 font-13"><strong>كود المؤهل :</strong> <span class="ms-2">{{ $teacher->qualification_code }}</span></p>
                                    <p class="text-muted mb-2 font-13"><strong>تاريخ الحصول على المؤهل :</strong> <span class="ms-2">{{  Carbon\Carbon::parse($teacher->qualification_date)->format('d-m-Y')}}</span></p>
                                </div>

                            </div>
                        </div> <!-- end card -->



                    </div> <!-- end col-->

                    <div class="col-lg-8 col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content p-0">


                                    <div class="tab-pane show active" id="timeline">

                                        <h5 class="mb-3 text-uppercase"><i class="mdi mdi-briefcase me-1"></i>
                                            التفاصيل</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="list-unstyled timeline-sm">
                                                    <li class="timeline-sm-item">
                                                        <span class="mb-2 d-block">المنطقة</span>
                                                        <h5 class="mt-0 mb-1">
                                                            {{ $teacher->region }}
                                                        </h5>
                                                        <p>الكود : {{   $teacher->region_code}}</p>
                                                    </li>
                                                    <li class="timeline-sm-item">
                                                        <span class="mb-2 d-block">الاداره</span>
                                                        <h5 class="mt-0 mb-1">
                                                            {{ $teacher->management }}
                                                        </h5>
                                                        <p>الكود : {{   $teacher->management_code}}</p>
                                                    </li>
                                                    <li class="timeline-sm-item">
                                                        <span class="mb-2 d-block">المعهد</span>
                                                        <h5 class="mt-0 mb-1">
                                                            {{ $teacher->institute }}
                                                        </h5>
                                                        <p>الكود : {{   $teacher->institute_code}}</p>
                                                    </li>
                                                    <li class="timeline-sm-item">
                                                        <span class="mb-2 d-block">معهد اخر</span>
                                                        <h5 class="mt-0 mb-1">
                                                            {{ $teacher->another_institute }}
                                                        </h5>
                                                        <p>الكود : {{   $teacher->another_institute_code}}</p>
                                                    </li>
                                                    <li class="timeline-sm-item">
                                                        <span class="mb-2 d-block">التخصص</span>
                                                        <h5 class="mt-0 mb-1">
                                                            {{ $teacher->subject }}
                                                        </h5>
                                                        <p>الكود : {{   $teacher->subject_code}}</p>
                                                    </li>
                                                    <li class="timeline-sm-item">
                                                        <span class="mb-2 d-block">تخصص اخر 1</span>
                                                        <h5 class="mt-0 mb-1">
                                                            {{ $teacher->another_subject }}
                                                        </h5>
                                                        <p>الكود : {{   $teacher->another_subject_code}}</p>
                                                    </li>
                                                    <li class="timeline-sm-item">
                                                        <span class="mb-2 d-block">تخصص اخر 2</span>
                                                        <h5 class="mt-0 mb-1">
                                                            {{ $teacher->another_subject_two }}
                                                        </h5>
                                                        <p>الكود : {{   $teacher->another_subject_two_code}}</p>
                                                    </li>


                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-unstyled timeline-sm">
                                                    <li class="timeline-sm-item">
                                                        <span class="mb-2 d-block">الكفاءة</span>
                                                        <h5 class="mt-0 mb-1">
                                                            {{ $teacher->efficiency }}
                                                        </h5>
                                                        <p class="mb-0">الكود : {{   $teacher->efficiency_code}}</p>
                                                    </li>
                                                    <li class="timeline-sm-item">
                                                        <span class="mb-2 d-block">الدرجة</span>
                                                        <h5 class="mt-0 mb-1">
                                                            {{ $teacher->degree }}
                                                        </h5>
                                                        <p class="mb-0">الكود : {{   $teacher->degree_code}}</p>
                                                        <p class="mt-0">تاريخ الحصول : {{ Carbon\Carbon::parse($teacher->date_of_obtaining)->format('d-m-Y')}}</p>
                                                    </li>
                                                    <li class="timeline-sm-item">
                                                        <span class="mb-2 d-block">تاريخ التعيين</span>
                                                        <h5 class="mt-0 mb-1">
                                                            {{ Carbon\Carbon::parse($teacher->hiring_date)->format('d-m-Y')}}
                                                        </h5>
                                                        <p class="mb-0">نوع التعيين :  {{   $teacher->hiring_type}}</p>
                                                        <p>تاريخ استلام العمل  :  {{ Carbon\Carbon::parse($teacher->date_receipt_the_work)->format('d-m-Y')}}</p>
                                                    </li>
                                                    <li class="timeline-sm-item">
                                                        <span class="mb-2 d-block">الوظيفة على كادر المعلم </span>
                                                        <h5 class="mt-0 mb-1">
                                                            {{ $teacher->job_staff }}
                                                        </h5>
                                                        <p class="mb-0">الكود : {{   $teacher->job_staff_code}}</p>
                                                        <p class="mb-0">تاريخ القرار : {{   $teacher->job_decision_staff_date}}</p>
                                                        <p>رقم القرار : {{   $teacher->job_decision_staff_code}}</p>
                                                    </li>
                                                    <li class="timeline-sm-item">
                                                        <span class="mb-2 d-block">الوظيفة</span>
                                                        <h5 class="mt-0 mb-1">
                                                            {{ $teacher->job_name }}
                                                        </h5>
                                                        <p>الكود : {{   $teacher->job_code}}</p>
                                                    </li>
                                                    <li class="timeline-sm-item">
                                                        <span class="mb-2 d-block">الموقف من العمل</span>
                                                        <h5 class="mt-0 mb-1">
                                                            {{ $teacher->job_attitude }}
                                                        </h5>
                                                        <p>الكود : {{   $teacher->job_attitude_code}}</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- end timeline content-->


                                </div> <!-- end tab-content -->
                            </div>
                        </div> <!-- end card-->

                    </div> <!-- end col -->
                </div>
                <!-- end row-->

            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('custom-script')

@endsection
