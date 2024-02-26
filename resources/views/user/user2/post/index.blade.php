@extends('user.user2.layouts.master')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ route('user.index') }}">Trang chủ</a></li>
                            <li><a href="{{ route('user.post.index', ['slug' => $item->slug]) }}">{{ mb_strtolower($item->title) }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--blog area start-->
    <div class="blog_page_section mt-32">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="blog_wrapper">
                        @foreach($items as $item)
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="{{ route('user.post.detail', ['slug' => $item->slug]) }}"><img src="{{ getPublicFile($item->image['store_name'] ?? null) }}" alt=""></a>
                            </div>
                            <div class="blog_content">
                                <h3><a href="{{ route('user.post.detail', ['slug' => $item['slug']]) }}">{{ $item->title }}</a></h3>
                                <div class="blog_meta">
                                    <span class="post_date"><i class="fa-calendar fa"></i> {{ $item->created_at->format('H:i d/m/Y') }}</span>
                                    @if($item->admin)
                                    <span class="author"><i class="fa fa-user-circle"></i> Đăng bởi : {{ $item->admin->name ?? null }}</span>
                                    @endif
                                    {{--<span class="category">
                                        <i class="fa fa-folder-open"></i>
                                        <a href="#">Fashion</a>
                                    </span>--}}
                                </div>
                                <div class="blog_desc">
                                    <p>
                                        {{ $item->short_description }}
                                    </p>
                                </div>
                                <div class="readmore_button">
                                    <a href="{{ route('user.post.detail', ['slug' => $item->slug]) }}">Chi tiết</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div style="margin: 20px 0px" class="text-right">
                        {!! $items->links() !!}
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div>
                        <h5 class="text-center" style="font-weight: bold; color: white; background: #3c8dbc; padding: 6px 5px; margin-bottom: 10px">
                            TƯ VẤN KHÓA HỌC KẾ TOÁN
                        </h5>
                        <div style="margin-bottom: 15px">
                            <div>
                                <marquee onmouseover="this.stop();" onmouseout="this.start();" behavior="" direction="">
                                    <span style="color: red; font-weight: bold">HOTLINE OR ZALO:</span>
                                    <a style="color: #0a804a" href="tel:0984969752">0984.96.97.52</a>
                                    <span>(cô Phương)</span>
                                </marquee>
                            </div>
                        </div>
                    </div>
                    <div class="blog_sidebar_widget">
                        @include('user.user2.layouts.lasted-post')
                        @include('user.user2.layouts.lasted-comment')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog area end-->

    <!--blog pagination area start-->
   {{-- <div class="blog_pagination">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pagination">
                        <ul>
                            <li class="current">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">next</a></li>
                            <li><a href="#">>></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <!--blog pagination area end-->

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
