<!doctype html>
<html class="no-js" lang="vi">

<!-- Mirrored from demo.hasthemes.com/esther/esther/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Apr 2021 09:04:42 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ getUserWebsiteTitle($websiteTitle ?? null) }}</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/user/user1/img/favicon.ico">

    <!-- CSS
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="/assets/user/user1/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="/assets/user/user1/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="/assets/user/user1/css/slick.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

    <!--magnific popup min css-->
    <link rel="stylesheet" href="/assets/user/user1/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="/assets/user/user1/css/font.awesome.css">
    <!--font ionicons css-->
    <link rel="stylesheet" href="/assets/user/user1/css/ionicons.min.css">
    <!--animate css-->
    <link rel="stylesheet" href="/assets/user/user1/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="/assets/user/user1/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="/assets/user/user1/css/slinky.menu.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/assets/user/user1/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="/assets/user/user1/css/style.css">

    <!--modernizr min js here-->
    <script src="/assets/user/user1/js/vendor/modernizr-3.7.1.min.js"></script>

</head>

<body>

{{--Sidebar responsive--}}
@include('user.user1.layouts.side-bar-responsive')

<!--header area start-->
<header class="header_area header_two">
    <!--header top start-->
    @include('user.user1.layouts.header.header-top')
    <!--header top start-->

    <!--header middel start-->
    @include('user.user1.layouts.header.header-middle')
    <!--header middel end-->

    <!--header bottom satrt-->
    @include('user.user1.layouts.header.header-bottom')
    <!--header bottom end-->

</header>
<!--header area end-->
