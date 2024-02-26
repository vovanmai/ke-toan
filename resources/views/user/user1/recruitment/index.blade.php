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
                            <li>Tuyển dụng</li>
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
                        @foreach($recruitments as $recruitment)
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="{{ route('user.recruitment.detail', ['slug' => $recruitment->slug]) }}"><img src="{{ getPublicFile($recruitment->previewImage->store_name ?? null) }}" alt=""></a>
                            </div>
                            <div class="blog_content">
                                <h3><a href="{{ route('user.recruitment.detail', ['slug' => $recruitment->slug]) }}">{{ $recruitment->title }}</a></h3>
                                <div class="blog_meta">
                                    <span class="post_date"><i class="fa-calendar fa"></i> {{ $recruitment->created_at }}</span>
                                    @if($recruitment->admin)
                                    <span class="author"><i class="fa fa-user-circle"></i> Đăng bởi : {{ $recruitment->admin->name ?? null }}</span>
                                    @endif
                                    {{--<span class="category">
                                        <i class="fa fa-folder-open"></i>
                                        <a href="#">Fashion</a>
                                    </span>--}}
                                </div>
                                <div class="blog_desc">
                                    <p>
                                        {{ $recruitment->short_description }}
                                    </p>
                                </div>
                                <div class="readmore_button">
                                    <a href="{{ route('user.recruitment.detail', ['slug' => $recruitment->slug]) }}">Chi tiết</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div style="margin-top: 25px" class="text-right">
                        {!! $recruitments->links() !!}
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                        @include('user.user1.layouts.lasted-post')
                        @include('user.user1.layouts.lasted-comment')

                        <div class="widget_list widget_categories">
                            <h3>Danh mục</h3>
                            <ul>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Videos</a></li>
                                <li><a href="#">WordPress</a></li>
                            </ul>
                        </div>
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
