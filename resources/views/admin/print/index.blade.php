<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>

    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <link href="{{ asset('assets/admin/css/adminltev3.css') }}" rel="stylesheet" />

    <style>
        * {
            font-size: 20px !important;
            font-family: "Times New Roman";
            font-weight: bolder !important;
        }

        #basic-datatable_wrapper table, .table-print {
            width: 100%;
            text-align: center;
            padding: 20px;
           /* padding-bottom: 95px !important;*/

        }

        #basic-datatable_wrapper th,  .table-print thead th {
            border: 1px solid #333;
            padding: 10px;
        }

       #basic-datatable_wrapper tbody td, .table-print tbody td {
            border: 1px solid;
            padding: 7px;
        }

        .footer {
            {{--  position: fixed;
            bottom: 0;
            width: 97%;  --}}
        }

        @media print {
            #spacer {
                height: 2em;
            }

            /* height of footer + a little extra */
            {{--  .footer {
                position: fixed;
                bottom: 0;
                width: 94%;

            }  --}}

            .table-print {
               /* padding-bottom: 95px !important;*/
                /*  margin-bottom: 60px;*/

            }

            @page {
                size: auto;
                margin: 0;
                margin-bottom: 8px
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>

        <table class="table " style="
        background: #cea120;
        width: 100%;">

            <tbody>
                <tr>
                    <td>
                        <h1
                            style=" font-size: 43px !important;
                        text-align: center;
                        color: #FFF; ">
                        الأزهر الشريف
                        <br>
                        قطاع المعاهد الازهرية
                        </h1>
                    </td>
                    <td>
                        <img class="logo" src="https://azhar.gov.eg/tnsek/Images/logo.png"
                            style="    width: 78px;
                        margin-top: 8px;">
                    </td>

                </tr>

            </tbody>
        </table>

            <table class="table">
                <tbody>
                    <tr>
                        <div class="card widget-inline"
                            style="text-align: center;
                        margin-top: 30px;
                    ">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">

                                                @if (request()->get('region'))
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-0 table-print">
                                                            <thead>
                                                                <tr>
                                                                    <th>عدد الادارات </th>
                                                                    <th>عدد المعاهد</th>
                                                                    <th>عدد المعلمين </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody >
                                                                <tr>
                                                                    <td>{{ isset($data['managements_count']) ? $data['managements_count'] : $data['managements']->count()}}</td>
                                                                    <td>{{  isset($data['institutes_count']) ? $data['institutes_count'] : $data['institutes']->count() }}</td>
                                                                    <td>{{  isset($data['teacher_count']) ? $data['teacher_count'] : 0 }}</td>
                                                                </tr>
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                @else
                                                    <h5>من فضلك اختر المعهد</h5>
                                                @endif



                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @if ($data['teacher_count'] > 0)
                                <div class="row">
                                    <div class="card">
                                        <div class="card-header" style="    padding: 15px;
                                        border: 1px solid #333;
                                        margin: 20px;
                                        margin-bottom: 0;">
                                            قائمة المعلمين
                                        </div>
                                        <div class="card-body">
                                            <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">


                                                <div id="table-data" class="table-responsive">

                                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100 table-striped">

                                                        <thead>
                                                            <tr>
                                                                <th> No.</th>
                                                                <th> اسم المعلم </th>
                                                                <th>كود المعلم</th>
                                                                <th>كود المعلم</th>
                                                                <th>كود المعلم</th>
                                                                <th>كود المعلم</th>
                                                                <th>المعهد الاساسى</th>
                                                                <th> المعهد المنتدب اليه</th>

                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            @foreach ($data['teachers'] as $teacher)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $teacher->teacher_name }}</td>
                                                                    <td>{{ $teacher->teacher_code }}</td>
                                                                    <td>{{ $teacher->teacher_code }}</td>
                                                                    <td>{{ $teacher->teacher_code }}</td>
                                                                    <td>{{ $teacher->teacher_code }}</td>
                                                                    <td>{{ $teacher->institute }}</td>
                                                                    <td>{{ $teacher->another_institute }}</td>

                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </tr>
                </tbody>
            </table>

        <table class="table no-border footer">
            <tbody>
                <tr>
                    <div class="footer"
                        style="font-size: 28px !important;
                    background: #cea120;
                    padding: 15px;
                    text-align: center;
                    color: #FFF;">
                        © جميع الحقوق محفوظة للأزهر الشريف
                    </div>
                </tr>

            </tbody>
        </table>


    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>

</body>

</html>
