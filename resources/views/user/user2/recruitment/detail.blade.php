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
                            <li><a href="{{ route('user.recruitment.index') }}">Tuyển dụng</a></li>
                            <li>{{ $recruitment->title }}</li>
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
                    <!--blog grid area start-->
                    <div class="blog_details_wrapper">
                        <div class="blog_thumb">
                            <a href="#"><img src="{{ $recruitment->image['url'] ?? '' }}" alt=""></a>
                        </div>
                        <div class="blog_content">
                            <h3 class="post_title">{{ $recruitment->title }}</h3>
                            <div class="post_meta">
                                <span><i class="ion-person"></i> Đăng bởi </span>
                                <span><a href="#">{{ $recruitment->admin->name ?? null }}</a></span>
                                <span>|</span>
                                <span><i class="fa fa-calendar" aria-hidden="true"></i> {{ $recruitment->created_at->format('H:i d/m/Y') }} </span>

                            </div>
                            @php
                                $url = route('user.recruitment.detail', ['slug' => $recruitment->slug])
                            @endphp
                            <iframe src="https://www.facebook.com/plugins/like.php?href={{ $url }}&width=450&layout=standard&action=like&size=small&share=true&height=35&appId" width="450" height="35" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                            <div class="post_content">
                                {!! $recruitment->description !!}
                            </div>
                            <div class="entry_content">
                                <div class="post_meta">
                                    {{--<span>Tags: </span>
                                    <span><a href="#">, fashion</a></span>
                                    <span><a href="#">, t-shirt</a></span>
                                    <span><a href="#">, white</a></span>--}}
                                </div>
                                {{--<div class="social_sharing">
                                    <h3>share this post:</h3>
                                    <ul>
                                        <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>--}}
                            </div>
                        </div>
                        <div class="related_posts">
                            <h3>Tuyển dụng liên quan</h3>
                            <div class="row">
                                @foreach($relatedRecruitments as $relatedRecruitment)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single_related">
                                        <div class="related_thumb">
                                            <img src="{{ $relatedRecruitment->image['url'] ?? '' }}" alt="">
                                        </div>
                                        <div class="related_content">
                                            <h3><a href="{{ route('user.recruitment.detail', ['slug' => $relatedRecruitment->slug]) }}">{{ $relatedRecruitment->title }}</a></h3>
                                            <span><i class="fa fa-calendar" aria-hidden="true"></i>
                                                {{ $relatedRecruitment->created_at->format('H:i d/m/Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @if($recruitment->comment_type === COMMENT_NORMAL || $recruitment->comment_type === COMMENT_NORMAL_AND_FACEBOOK)
                        <div class="comments_box">
                            <h3><span class="total-comment">{{ $comments->total() }}</span> Bình luận</h3>
                            <div class="all_comments">
                                @foreach($comments as $comment)
                                    <div class="{{ "comment-$comment->id" }}">
                                        <div class="comment_list">
                                            <div class="comment_thumb">
                                                <img src="/assets/user/user2/img/comment_avatar.jpg" alt="">
                                            </div>
                                            <div class="comment_content">
                                                <div class="comment_meta">
                                                    <h5><a href="#">{{ $comment->name }}</a></h5>
                                                    <span>{{ $comment->created_at->format('H:i d/m/Y') }}</span>
                                                </div>
                                                <p>{{ $comment->content }}</p>
                                                {{--<div class="comment_reply">
                                                    <a href="#">Reply</a>
                                                </div>--}}
                                            </div>
                                        </div>
                                        @foreach($comment->children as $child)
                                            <div class="comment_list list_two">
                                                <div class="comment_thumb">
                                                    <img src="/assets/user/user2/img/comment_avatar.jpg" alt="">
                                                </div>
                                                <div class="comment_content">
                                                    <div class="comment_meta">
                                                        <h5><a href="#">{{ $child->name }}</a></h5>
                                                        <span>{{ $child->created_at->format('H:i d/m/Y') }}</span>
                                                    </div>
                                                    <p>{{ $child->content }}</p>
                                                    {{--                                        <div class="comment_reply">--}}
                                                    {{--                                            <a href="#">Reply</a>--}}
                                                    {{--                                        </div>--}}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            @php
                                $data = $comments->toArray();
                                $currentPage = $data['current_page'];
                                $nextPage = $data['next_page_url'];
                            @endphp
                            <div class="text-center box-load-more">
                                @if($nextPage)
                                    <button class="btn btn-sm load-more" onclick="loadMore({{$currentPage + 1}})">
                                        <i class="fa fa-spinner fa-pulse" style="display: none"></i>
                                        Xem thêm
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div class="comments_form">
                            <h3>Để lại một bình luận </h3>
                            <p>Email của bạn sẽ không được công khai. Trường bắt buộc đánh dấu (*)</p>
                            <form id="create-comment-form" method="POST" action="{{ route('user.comment.store') }}">
                                @csrf
                                <input name="target_type" type="hidden" value="{{ $recruitment->getMorphClass() }}">
                                <input name="target_id" type="hidden" value="{{ $recruitment->id }}">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <label for="content">Nội dung (*)</label>
                                        <textarea name="content" id="review_comment"></textarea>
                                    </div>
                                    <div class="col-lg-4 col-md-4 form-group">
                                        <label for="name">Name (*)</label>
                                        <input name="name" id="author" type="text">
                                    </div>
                                    <div class="col-lg-4 col-md-4 form-group">
                                        <label for="email">Email</label>
                                        <input name="email" id="email" type="text">
                                    </div>
                                    {{--<div class="col-lg-4 col-md-4">
                                        <label for="website">Website </label>
                                        <input id="website" type="text">
                                    </div>--}}
                                </div>
                                <button class="button" type="submit">Tạo bình luận</button>
                            </form>
                        </div>
                        @endif
                        @if($recruitment->comment_type === COMMENT_FACEBOOK || $recruitment->comment_type === COMMENT_NORMAL_AND_FACEBOOK)
                            <div style="border-top: 1px solid #ededed; margin-top: 30px; padding-top: 20px">
                                <h3 style="font-size: 20px; margin: 0px 0px 0px 0px; font-weight: 600; line-height: 28px;">Bình luận bằng facebook</h3>
                                <div class="fb-comments" data-href="{{ route('user.recruitment.detail', ['slug' => $recruitment->slug]) }}" data-width="100%" data-numposts="5"></div>
                            </div>
                        @endif
                    </div>
                    <!--blog grid area start-->
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

                        {{--<div class="widget_list widget_categories">
                            <h3>Danh mục</h3>
                            <ul>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">Videos</a></li>
                                <li><a href="#">WordPress</a></li>
                            </ul>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--blog area end-->
@endsection

@push('script')
    <script>
        $(function() {
            $("#create-comment-form").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 50,
                    },
                    email: {
                        required: false,
                        email: true,
                        maxlength: 50,
                    },
                    content: {
                        required: true,
                        maxlength: 500,
                        minlength: 10,
                    },
                },
                highlight: function(element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error');
                },
                messages: {
                    content: {
                        maxlength: 'Nội dung không được lớn hơn 500 ký tự.',
                        minlength: 'Nội dung phải tối thiếu 10 ký tự.'
                    }
                },
                invalidHandler: function(form, validator) {
                    toastr.error('Dữ liệu nhập không hợp lệ.', 'Lỗi');
                },
                submitHandler: function(form) {
                    var data = {
                        name: $('#create-comment-form input[name="name"]').val(),
                        email: $('#create-comment-form input[name="email"]').val(),
                        content: $('#create-comment-form textarea[name="content"]').val(),
                        target_type: $('#create-comment-form input[name="target_type"]').val(),
                        target_id: $('#create-comment-form input[name="target_id"]').val(),
                    }
                    $.ajax({
                        data: data,
                        type: 'POST',
                        dataType: "JSON",
                        url: "{{ route('user.comment.store') }}",
                        success: function(response)
                        {
                            toastr.success(response.message, 'Thành công');
                            let comment = response.data

                            let html = `<div class="comment_list comment_${comment.id}">
                                <div class="comment_thumb">
                                    <img src="/assets/user/user2/img/comment_avatar.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">${ comment.name}</a></h5>
                                        <span>${ comment.created_at}</span>
                                    </div>
                                    <p>${ comment.content}</p>
                                </div>
                            </div>`;
                            $(".all_comments").prepend(html);
                            $('html, body').animate({
                                scrollTop: $(`.all_comments`).offset().top - 200
                            }, 1000);
                            $('.total-comment').text(parseInt($('.total-comment').text()) + 1)

                            $('#create-comment-form input[name="name"]').val('')
                            $('#create-comment-form input[name="email"]').val('')
                            $('#create-comment-form textarea[name="content"]').val('')
                        },
                        error: function(error) {
                            toastr.error(responseError.message, 'Lỗi');
                        }
                    });
                }
            });
        });

        function loadMore (page) {
            $('.fa-spinner').css('display', 'inline-block')

            $.ajax({
                data: {
                    page: page,
                    target_type: 1,
                    target_id: {{ $recruitment->id }},
                },
                type: 'GET',
                dataType: "JSON",
                url: "/comments",
                success: function(response)
                {
                    var html = "";
                    var htmlChildren = ""
                    var data = response.data

                    data.data.forEach(function (item, index) {
                        html = html +
                            `<div class="comment_list">
                                <div class="comment_thumb">
                                    <img src="/assets/user/user2/img/comment_avatar.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">${item.name}</a></h5>
                                        <span>${item.created_at}</span>
                                    </div>
                                    <p>${item.content}</p>
                                </div>
                            </div>`


                        item.children.forEach(function (item, index) {
                            htmlChildren = htmlChildren +
                                `<div class="comment_list list_two">
                                <div class="comment_thumb">
                                    <img src="/assets/user/user2/img/comment_avatar.jpg" alt="">
                                </div>
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">${item.name}</a></h5>
                                        <span>${item.created_at}</span>
                                    </div>
                                    <p>${item.content}</p>
                                </div>
                            </div>`
                        })
                        html = html + htmlChildren
                        htmlChildren = ''
                    })
                    $(".all_comments").append(html);
                    $('.fa-spinner').css('display', 'none')
                    var nextPageUrl = data.next_page_url

                    if(nextPageUrl) {
                        var buttonLoadMore = `<button class="btn btn-sm load-more" onclick="loadMore(${page + 1})">
                            <i class="fa fa-spinner fa-pulse" style="display: none"></i>
                            Xem thêm
                        </button>`
                        $('.box-load-more').html(buttonLoadMore)
                    } else {
                        $('.box-load-more').html('')
                    }
                },
                error: function(error) {
                    toastr.error(error.message, 'Lỗi');
                }
            });
        }
    </script>
@endpush
