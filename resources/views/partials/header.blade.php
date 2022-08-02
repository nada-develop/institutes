<meta charset="utf-8" />
<title>  Institute  System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

<!-- plugin css -->
<link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
    type="text/css" />

<!-- Plugins css -->
<link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />


<!-- icons -->


<!-- third party css -->
<link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
    <link href="{{ asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- third party css -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->


    @if (app()->getLocale() == 'ar')

    <!-- App css -->
    <link href="{{ asset('assets/css/config/default/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css"
    id="bs-default-stylesheet" />
    <link href="{{ asset('assets/css/config/default/app-rtl.min.css') }}" rel="stylesheet" type="text/css"
    id="app-default-stylesheet" />

    <link href="{{ asset('assets/css/config/default/bootstrap-dark-rtl.min.css') }}" rel="stylesheet" type="text/css"
    id="bs-dark-stylesheet" />
    <link href="{{ asset('assets/css/config/default/app-dark-rtl.min.css') }}" rel="stylesheet" type="text/css"
    id="app-dark-stylesheet" />
    <link href="{{ asset('assets/css/icons-rtl.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        h1,h2,h3,h4,h5,h6,p,a span:first-of-type,body{
            font-family: 'Cairo', sans-serif !important;
        }
        .import-export-excel{
            float: right !important;
            margin-left: 11px !important;
        }

    </style>
    @else

    <!-- App css -->
 <link href="{{ asset('assets/css/config/default/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
  id="bs-default-stylesheet" />
 <link href="{{ asset('assets/css/config/default/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css"
    id="bs-dark-stylesheet" />
<link href="{{ asset('assets/css/config/default/app-dark.min.css') }}" rel="stylesheet" type="text/css"
id="app-dark-stylesheet" />
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/config/default/app.min.css') }}" rel="stylesheet" type="text/css"
id="app-default-stylesheet" />
@endif
<link rel="stylesheet" href="{{ asset('assets/libs/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/stye.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}">




@yield('custom-style')




