@extends('user.user1.layouts.master')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ route('user.index') }}">Trang chủ</a></li>
                            <li>Đăng nhập</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!-- customer login start -->
    <div class="customer_login mt-32">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form">
                        <h2>Đăng nhập</h2>
                        <form action="{{ route('user.login') }}" method="POST">
                            @csrf
                            <p class="@error('login_email') has-error @enderror">
                                <label>Email <span>(*)</span></label>
                                <input name="login_email" type="text" value="{{ old('login_email') }}">
                                @error('login_email')
                                <label class="error" for="login_email">{{ $message }}</label>
                                @enderror
                            </p>
                            <p class="@error('login_password') has-error @enderror">
                                <label>Mật khẩu <span>(*)</span></label>
                                <input name="login_password" type="password" value="{{ old('login_password') }}">
                                @error('login_password')
                                <label class="error" for="login_password">{{ $message }}</label>
                                @enderror
                            </p>
                            <div class="login_submit">
                                <a href="#">Quên mật khẩu?</a>
                                <label for="remember">
                                    <input id="remember" name="remember_me" value="1" type="checkbox">
                                     Nhớ tôi
                                </label>
                                <button type="submit">Đăng nhập</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register">
                        <h2>Đăng ký</h2>
                        <form action="{{ route('user.register') }}" method="POST">
                            @csrf
                            <p class="@error('name') has-error @enderror">
                                <label>Họ và Tên <span>(*)</span></label>
                                <input name="name" type="text" value="{{ old('name') }}">
                                @error('name')
                                    <label class="error" for="name">{{ $message }}</label>
                                @enderror
                            </p>
                            <p class="@error('email') has-error @enderror">
                                <label>Email <span>(*)</span></label>
                                <input name="email" type="text" value="{{ old('email') }}">
                                @error('email')
                                <label class="error" for="email">{{ $message }}</label>
                                @enderror
                            </p>
                            <p class="@error('phone') has-error @enderror">
                                <label>Số điện thoại <span>(*)</span></label>
                                <input name="phone" type="text" value="{{ old('phone') }}">
                                @error('phone')
                                <label class="error" for="phone">{{ $message }}</label>
                                @enderror
                            </p>
                            <p class="@error('password') has-error @enderror">
                                <label>Mật khẩu <span>(*)</span></label>
                                <input name="password" type="password" value="{{ old('password') }}">
                                @error('password')
                                <label class="error" for="password">{{ $message }}</label>
                                @enderror
                            </p>
                            <p class="@error('password_confirmation') has-error @enderror">
                                <label>Nhập lại mật khẩu <span>(*)</span></label>
                                <input name="password_confirmation" type="password" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                <label class="error" for="password_confirmation">{{ $message }}</label>
                                @enderror
                            </p>
                            <div class="login_submit">
                                <button type="submit">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
    <!-- customer login end -->

@endsection
@push('script')
    <script>
        $(function () {
            $("#contact-form").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 255,
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50,
                    },
                    subject: {
                        required: true,
                        maxlength: 1000,
                    },
                    message: {
                        required: true
                    },
                },
                highlight: function (element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function (element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                messages: {},
                invalidHandler: function (form, validator) {
                    toastr.error('Dữ liệu nhập không hợp lệ.', 'Lỗi');
                },
                submitHandler: function (form) {
                    form.submit()
                }
            });
        });
    </script>
@endpush
