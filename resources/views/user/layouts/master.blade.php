@include('user.layouts.header')
<body>
<div class="wrapper">
    <div class="container-layout">
        <div id="header">
            <img src="https://daotaoketoanhn.edu.vn/wp-content/uploads/2017/05/Banner1.png" alt="" style="width: 100%">
            @include('user.layouts.menu')
        </div>
        <div id="main">
            <div class="row">
                <div class="col-md-8">
                    @yield('content')
                </div>
                <div class="col-md-4">
                    @include('user.layouts.sidebar')
                </div>
            </div>
        </div>
@include('user.layouts.footer')
