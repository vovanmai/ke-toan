@include('user.layouts.header')
<body>
@include('user.layouts.lv-mobile-main-menu')
<div class="wrapper">
    <div class="container-layout">
        <div id="header">
            @php
                $setting = app('web_setting');
                $headerBanner = $setting->header_banner ?? null;
                $style = 'object-fit: cover; display: block;';
                if ($headerBanner) {
                    if ($setting->header_banner_height ?? null) {
                        $style .= " height: {$setting->header_banner_height};";
                    }

                    if ($setting->header_banner_width ?? null) {
                        $style .= " width: {$setting->header_banner_width};";
                    }
                }
            @endphp
            @if($headerBanner)
                <a href="/" id="banner-top">
                    <img style="{{ $style }}" src="{{ $headerBanner['url'] }}">
                </a>
            @endif
            <div id="toggle-show-menu">
                <div>
                    <a href="/" style="color: white; font-weight: bold; text-decoration: none">
                        <i class="fa fa-home" aria-hidden="true"></i> Trang chủ
                    </a>
                    <a data-bs-toggle="offcanvas" href="#lv-mobile-main-menu" style="color: white">
                        <i style="font-size: 20px" class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            @include('user.layouts.main-menu')
            @include('user.layouts.mobile-main-menu')
        </div>

        <div id="main">
            @include('user.layouts.main-banner')
            <div class="container">
                <div class="row g-3">
                    <div class="col-sm-7 col-md-8 col-lg-9">
                        <div id="main-content">
                            @yield('content')
                        </div>
                    </div>
                    <div class="col-sm-5 col-md-4 col-lg-3">
                        @include('user.layouts.sidebar')
                    </div>
                </div>
            </div>
        </div>
@include('user.layouts.footer')
