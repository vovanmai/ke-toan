@include('user.layouts.header')
<body>
<div class="wrapper">
    <div class="container-layout">
        <div id="header">
            <img src="https://daotaoketoanhn.edu.vn/wp-content/uploads/2017/05/Banner1.png" alt="" style="width: 100%">
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
                    <div class="col-md-8">
                        <div id="main-content">
                            @yield('content')
                        </div>
                    </div>
                    <div class="col-md-4">
                        @include('user.layouts.sidebar')
                    </div>
                </div>
            </div>
        </div>
@include('user.layouts.footer')
