@extends('user.user2.layouts.master')

@section('content')
    <!--error section area start-->
    <div class="error_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="error_form">
                        <h1>500</h1>
                        <h2>Có lỗi khi đang truy cập đến máy chủ.</h2>
                        <a href="{{ route('user.index') }}">Trở lại trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--error section area end-->
@endsection
