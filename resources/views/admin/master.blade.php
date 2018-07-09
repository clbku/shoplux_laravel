<!DOCTYPE html>
<html lang="en">
<!--[if IE 9 ]><html class="ie9"><![endif]-->

<!-- Mirrored from bootstrapsale.com/projects/maed/v1/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2017 09:14:02 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Material Admin</title>

    <!-- Vendors -->

    <!-- Animate CSS -->
    <link href="{{url('assets/vendors/bower_components/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Material Design Icons -->
    <link href="{{url('assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}" rel="stylesheet">

    <!-- Malihu Scrollbar -->
    <link href="{{url('assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet">

    <!-- Full Calendar -->
    <link href="{{url('assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet">

    <!-- Site CSS -->
    <link href="{{url('assets/css/app-1.min.css')}}" rel="stylesheet">

    <!-- Page loader -->
    <link rel="stylesheet" href="{{url('assets/fonts/font-awesome/css/font-awesome.css')}}">
    <script src="{{url('assets/js/page-loader.min.js')}}"></script>
    <script src='{{url('assets/../../google_analytics_auto.js')}}'></script></head>
    <link href="{{url('assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <script src="{{url('assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{url('assets/vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <link href="{{url('assets/css/mystyle.css')}}" rel="stylesheet">
<body>
<!-- Page Loader -->
<div id="page-loader">
    <div class="preloader preloader--xl preloader--light">
        <svg viewBox="25 25 50 50">
            <circle cx="50" cy="50" r="20" />
        </svg>
    </div>
</div>

<!-- Header -->
@include('admin.layout.header')

<section id="main">
    @include('admin.layout.notify')

    @include('admin.layout.nav')

    @yield('content')

    @include('admin.layout.footer')

</section>
@include('admin.layout.script')
</body>

<!-- Mirrored from bootstrapsale.com/projects/maed/v1/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 May 2017 09:14:56 GMT -->
</html>
