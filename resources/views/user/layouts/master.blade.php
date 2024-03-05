@include('user.layouts.header')
<body>
<div class="wrapper">
    <div class="container-layout">
        <div id="header">
            @php
                $setting = app('web_setting');
                $headerBanner = $setting->header_banner ?? null;
                $style = 'margin: auto; object-fit: contain; background-repeat: no-repeat; background-position: center;';
                if ($headerBanner) {
                    $style .= " background: url('{$headerBanner['url']}');";
                    if ($setting->header_banner_height ?? null) {
                        $style .= " height: {$setting->header_banner_height};";
                    }

                    if ($setting->header_banner_width ?? null) {
                        $style .= " width: {$setting->header_banner_width};";
                    }
                }
            @endphp
            @if($headerBanner)
            <div id="header-banner" style="{{$style}}">
            </div>
            @endif
            <div id="toggle-show-menu">
                <div style="background: #2588DE; color: white; padding: 10px 7px; display: flex; justify-content: space-between; align-items: center">
                    <h4 style="margin-bottom: 0px">Danh mục</h4>
                    <i style="font-size: 20px" class="fa fa-bars toggle-button" aria-hidden="true"></i>
                </div>
            </div>
            @include('user.layouts.main-menu')
            @include('user.layouts.mobile-main-menu')
        </div>

        <div id="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <div id="main-content">
                            @yield('content')
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        @include('user.layouts.sidebar')
                    </div>
                </div>
            </div>
        </div>
@include('user.layouts.footer')
