<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Dashboard</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend_css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend_css/bootstrap-responsive.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend_css/fullcalendar.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend_css/admin-style.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend_css/admin-media.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend_css/select2.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/backend_fonts/css/font-awesome.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend_css/jquery.gritter.css') }}"/>
    <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800'>
<!-- End-CSS -->
</head>
<body>

@include('layouts.adminLayout.admin_header')

@include('layouts.adminLayout.admin_sidebar')

@yield('content')

@include('layouts.adminLayout.admin_footer')

<!-- Scripts -->
    <script src="{{ asset('assets/js/backend_js/jquery.min.js') }}"></script> 
    <script src="{{ asset('assets/js/backend_js/jquery.ui.custom.js') }}"></script> 
    <script src="{{ asset('assets/js/backend_js/bootstrap.min.js') }}"></script> 
    <script src="{{ asset('assets/js/backend_js/jquery.uniform.js') }}"></script> 
    <script src="{{ asset('assets/js/backend_js/select2.min.js') }}"></script> 
    <script src="{{ asset('assets/js/backend_js/jquery.validate.js') }}"></script> 
    <script src="{{ asset('assets/js/backend_js/admin.js') }}"></script> 
    <script src="{{ asset('assets/js/backend_js/admin.form_validation.js') }}"></script>
    <script src="{{ asset('assets/js/backend_js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('assets/js/backend_js/admin.tables.js') }}"></script>
<!-- End-Scripts -->
</body>
</html>
