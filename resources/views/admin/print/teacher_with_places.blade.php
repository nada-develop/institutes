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

        .table-print {
            width: 100%;
            text-align: center;
            padding: 20px;
            padding-bottom: 95px !important;

        }

        .table-print thead th {
            border: 1px solid #333;
            padding: 10px;
        }

        .table-print tbody td {
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
                padding-bottom: 95px !important;
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
                                                <h2 class="mb-3"> حصر عام بأعداد المعملين مقسمة لمناطق بالتخصصات المختلفة</h2>
                                                @if (isset($data['region_selected']))
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-0 table-print">
                                                            <thead>
                                                                <tr>
                                                                    <th>المنطقة</th>
                                                                    <th>التخصصات</th>
                                                                    <th>عدد المعلمين</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody >
                                                                <tr>

                                                                    <td>{{ $data['region_selected'] != 'all' ? $data['region_selected']->name : 'الكل' }}
                                                                    </td>
                                                                    <td>{{ $data['subject_selected'] != 'all' ? $data['subject_selected']->name : 'الكل' }}
                                                                    </td>
                                                                    <td>{{ $data['teacher_count'] }}</td>
                                                                </tr>
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                @else
                                                    <h5>من فضلك اختر المنطقة</h5>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
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
