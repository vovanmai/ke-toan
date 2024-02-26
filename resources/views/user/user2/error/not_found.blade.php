@extends('user.user2.layouts.master')

@section('content')
    <!--error section area start-->
    <div class="error_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="error_form">
                        <h1>404</h1>
                        <h2>Opps! TRANG KHÔNG ĐƯỢC TÌM THẤY</h2>
                        <p>Xin lỗi nhưng trang bạn truy cập không tồn tại.</p>
                        <form action="#">
                            <input placeholder="Tìm kiếm..." type="text">
                            <button type="submit"><i class="ion-ios-search-strong"></i></button>
                        </form>
                        <a href="{{ route('user.index') }}">Trở lại trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--error section area end-->
@endsection
