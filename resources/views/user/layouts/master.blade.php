@include('user.layouts.header')
<body>
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
                <a href="/">
                    <img style="{{ $style }}" src="{{ $headerBanner['url'] }}">
                </a>
            @endif
            <div id="toggle-show-menu">
                <div style="background: #2588DE; color: white; padding: 10px 7px; display: flex; justify-content: space-between; align-items: center">
                    <a href="/" style="color: white; font-weight: bold; text-decoration: none">
                        <i class="fa fa-home" aria-hidden="true"></i> Trang chủ
                    </a>
                    <i style="font-size: 20px" class="fa fa-bars toggle-button" aria-hidden="true"></i>
                </div>
            </div>
            @include('user.layouts.main-menu')
            @include('user.layouts.mobile-main-menu')

            <div id="lv-navbar">
                <div class="menu">
                    <ul>
                        <li>
                            <a href="/">
                                <span class="title">
                                    <i class="fas fa-home"></i>
                                    Trang chủ
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="/">
                                <span class="title">
                                    Giới thiệu
                                </span>
                                <span class="arrow"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="">
                                        Tin tức
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        Giải trí
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="three-dot-menu">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                </div>
            </div>
        </div>

        <div id="main">
            @include('user.layouts.main-banner')
            <div class="container">
                <div class="row g-3">
                    <div class="col-sm-12 col-md-12 col-lg-9">
                        <div id="main-content">
                            @yield('content')
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-3">
                        @include('user.layouts.sidebar')
                    </div>
                </div>
            </div>
        </div>
@include('user.layouts.footer')
