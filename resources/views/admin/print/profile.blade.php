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




    <style>
        * {
            font-size: 20px !important;
            font-family: "Times New Roman";
            font-weight: bolder !important;
        }



        .teacher-data {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-top: 3px !important;
            margin: 10px 0;
        }

        .teacher-data td,
        .teacher-data th {
            border: 1px solid #dddddd;
            padding: 8px;
            font-size: 16px !important;
        }
        .teacher-data td {
            color: #4e4e4e;
        }
        .teacher-data th {
            background:  #dddddd;
            border-color: #c9c9c9;
            width: 23%;
        }
        {{--  .teacher-data tr:nth-child(even) {
            background-color: #dddddd;
        }  --}}

        @media print {
            #spacer {
                height: 2em;
            }

            /* height of footer + a little extra */
            {{-- .footer {
                position: fixed;
                bottom: 0;
                width: 94%;

            } --}} .table-print {
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

    <table style="    width: 90%;
    text-align: inherit;
    margin:2px auto;">
        <tr>
            <td colspan="4" style="text-align: center;
            padding: 10px;
            border: 1px solid;
            margin: auto;">
                طباعة تفاصيل المعلم
            </td>

        </tr>
    </table>


    <table class="teacher-data">
        <tr>
            <th>الاسم</th>
            <td> {{ $teacher->teacher_name }}</td>
            <th>رقم السجل </th>
            <td> {{ $teacher->record_number }}</td>
        </tr>
        <tr>
            <th>الكود</th>
            <td> {{ $teacher->teacher_code }}</td>

            <th>الرقم القومى </th>
            <td> {{ $teacher->national_ID }}</td>

        </tr>
        <tr>
            <th>النوع</th>
            <td> {{ $teacher->gender }}</td>
            <th>رقم النوع</th>
            <td> {{ $teacher->gender_code }}</td>
        </tr>
        <tr>
            <th>المؤهل</th>
            <td> {{ $teacher->qualification_name }} </td>
            <th>نوع المؤهل </th>
            <td> {{ $teacher->qualification_type }}</td>
        </tr>
        <tr>

            <th>كود المؤهل </th>
            <td> {{ $teacher->qualification_code }}</td>
            <th>تاريخ الحصول على المؤهل</th>
            <td> {{ Carbon\Carbon::parse($teacher->qualification_date)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>المنطقة</th>
            <td> {{ $teacher->region }}</td>
            <th>كود المنطقة</th>
            <td> {{ $teacher->region_code }}</td>
        </tr>
        <tr>
            <th>الاداره</th>
            <td> {{ $teacher->management }}</td>
            <th>كود الاداره</th>
            <td> {{ $teacher->management_code }}</td>
        </tr>
        <tr>

            <th>المعهد</th>
            <td> {{ $teacher->institute }}</td>
            <th> كود المعهد</th>
            <td> {{ $teacher->institute_code }}</td>
        </tr>
        <tr>
            <th>معهد اخر 1</th>
            <td> {{ $teacher->another_institute }}</td>
            <th> كود المعهد الاخر 1</th>
            <td> {{ $teacher->another_institute_code }}</td>
        </tr>
        <tr>

            <th>معهد اخر 2</th>
            <td> {{ $teacher->another_institute_two }}</td>
            <th> كود المعهد الاخر 2</th>
            <td> {{ $teacher->another_institute_two_code }}</td>
        </tr>
        <tr>


            <th>التخصص</th>
            <td> {{ $teacher->subject }}</td>
            <th> كود التخصص</th>
            <td> {{ $teacher->subject_code }}</td>
        </tr>
        <tr>

            <th>تخصص اخر 1</th>
            <td> {{ $teacher->another_subject }}</td>
            <th> كود التخصص الاخر 1</th>
            <td> {{ $teacher->another_subject_code }}</td>
        </tr>
        <tr>

            <th>تخصص اخر 2</th>
            <td> {{ $teacher->another_subject_two }}</td>
            <th> كود التخصص الاخر 2</th>
            <td> {{ $teacher->another_subject_two_code }}</td>
        </tr>
        <tr>

            <th>الكفاءة</th>
            <td> {{ $teacher->efficiency }}</td>
            <th> كود الكفاءة</th>
            <td> {{ $teacher->efficiency_code }}</td>
        </tr>
        <tr>
            <th>الدرجة</th>
            <td> {{ $teacher->degree }}</td>
            <th> كود الدرجة</th>
            <td> {{ $teacher->management_code }}</td>
        </tr>
        <tr>
            <th>تاريخ الحصول على الدرجة</th>
            <td> {{ Carbon\Carbon::parse($teacher->date_of_obtaining)->format('d-m-Y') }}</td>
            <th>تاريخ التعيين</th>
            <td> {{ Carbon\Carbon::parse($teacher->hiring_date)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>نوع التعيين </th>
            <td> {{ $teacher->hiring_type }}</td>
            <th> تاريخ استلام العمل </th>
            <td> {{ Carbon\Carbon::parse($teacher->date_receipt_the_work)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <th>الوظيفة على كادر المعلم</th>
            <td> {{ $teacher->job_staff }}</td>
            <th> كود الوظيفة على الكادر</th>
            <td> {{ $teacher->job_staff_code }}</td>
        </tr>
        <tr>
            <th>تاريخ القرار </th>
            <td> {{ $teacher->job_decision_staff_date }}</td>
            <th> رقم القرار </th>
            <td> {{ $teacher->job_decision_staff_code }}</td>
        </tr>
        <tr>
            <th>الوظيفة </th>
            <td> {{ $teacher->job_name }}</td>
            <th>كود الوظيفة </th>
            <td> {{ $teacher->job_code }}</td>
        </tr>
        <tr>
            <th>الموقف من العمل</th>
            <td> {{ $teacher->job_attitude }}</td>
            <th>كود الموقف من العمل </th>
            <td> {{ $teacher->job_attitude_code }}</td>
        </tr>


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
