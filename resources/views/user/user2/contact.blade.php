@extends('user.user2.layouts.master')
@section('content')
    @php
        $webSetting = getWebsiteSetting();
    @endphp
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ route('user.index') }}">Trang chủ</a></li>
                            <li>Liên hệ</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--contact area start-->
    <div class="contact_area">
        <div class="container highlight-border pt-4 pb-4">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="map-area">
                        {!! $webSetting->contact_map ?? null !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <h3 style="color: #0a804a">TRUNG TÂM KẾ TOÁN CHUYÊN NGHIỆP DPT</h3>
{{--                        <p>--}}
{{--                            Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum--}}
{{--                            est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum--}}
{{--                            formas human. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam--}}
{{--                        </p>--}}
                        <ul>
                            @php
                                $phone = $webSetting->contact_phone ?? null;
                                $phone1 = substr($phone, 0, 4);
                                $phone2 = substr($phone, 4, 3);
                                $phone3 = substr($phone, 7, 3);
                                $sumPhone = "$phone1.$phone2.$phone3";
                            @endphp
                            <li><i class="fa fa-phone"></i><a href="tel:0986308460">{{ $sumPhone }}</a></li>
                            <li><i class="fa fa-envelope-o"></i> {{ $webSetting->contact_email ?? null }}</li>
                            <li><i class="fa fa-fax"></i> Địa chỉ : {{ $webSetting->contact_address ?? null }}</li>
                            <li><i class="fa fa-clock-o"></i>Thời gian làm việc từ thứ 2 đến thứ 7</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message form">
                        <h4>Các bạn cần tư vấn về Khóa học kế toán xin liên hệ với chúng tôi theo số:
                            <a style="color: #0a804a" href="tel:{{ $phone }}">{{ $sumPhone }}</a> (gặp cô Phương)
                            hoặc có thể gửi câu hỏi cho chúng tôi theo mẫu bên dưới nhé!
                        </h4>
                        <form id="contact-form" method="POST" action="{{ route('user.contact.store') }}">
                            @csrf
                            <p class="form-group">
                                <label> Họ và Tên (bắt buộc)</label>
                                <input name="name" placeholder="Họ và tên" type="text">
                            </p>
                            <p class="form-group">
                                <label> Địa chỉ email (bắt buộc)</label>
                                <input name="email" placeholder="Email" type="email">
                            </p>
                            <p class="form-group">
                                <label>Chủ đề (bắt buộc)</label>
                                <input name="subject" placeholder="Chủ đề" type="text">
                            </p>
                            <div class="contact_textarea form-group">
                                <label>Nội dung (bắt buộc)</label>
                                <textarea placeholder="Nội dung..." name="message" class="form-control2"></textarea>
                            </div>
                            <button type="submit">Gửi</button>
                            <p class="form-messege"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact area end-->
@endsection
@push('script')
    <script>
        $(function() {
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
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                messages: {},
                invalidHandler: function(form, validator) {
                    toastr.error('Dữ liệu nhập không hợp lệ.', 'Lỗi');
                },
                submitHandler: function(form) {
                    form.submit()
                }
            });
        });
    </script>
@endpush
