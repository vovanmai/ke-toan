@extends('user.layouts.master')
@section('content')
    @if($courses->isNotEmpty())
    <div class="block">
        <div class="heading-block">
            <div class="block-title">
                <a href="{{ route('user.course.list_all') }}" title="Khoá học kế toán">Khoá học kế toán</a>
            </div>
            <div class="block-see-more">
                <a href="{{ route('user.course.list_all') }}" title="Xem tất cả"> Xem tất cả »» </a>
            </div>
        </div>
        <div class="display-vertical">
            <div class="row g-3 g-lg-4">
                @foreach($courses as $item)
                    <div class="col-6 col-sm-6 col-md-4">
                        <a href="{{ route('user.course.detail', ['slug' => $item->slug, 'category' => $item->category->slug]) }}" class="item" style="border: 1px solid #eaebed; border-radius: 10px; overflow: hidden; display: block; text-decoration: none">
                            <div>
                                <img style="width: 100%; height: auto; object-fit: cover" src="{{ $item->image['url'] }}" alt="{{ $item->title }}">
                            </div>

                            <h5 class="title" title="{{ $item->title }}">{{ $item->title }}</h5>

                            <div style="font-size: 13px; color: gray; border-top: 1px solid #e9e9e9">
                                <div style="padding: 7px 10px">
                                        <span>
                                            <i class="far fa-clock"></i> {{ $item->created_at->format('d/m/Y') }}
                                        </span>
                                    |
                                    <span>
                                            <i class="fas fa-eye"></i> {{ number_format($item->total_view) }}
                                        </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <div id="course-gallery" class="block">
        <div class="heading-block">
            <div class="block-title">
                <a title="Hình ảnh khóa học & Sự kiện">Hình ảnh khóa học & Sự kiện</a>
            </div>
        </div>
        @php
            $courseImages = resolve(\App\Services\User\CourseImage\ListService::class)->handle();
        @endphp
        <div class="swiper course-images">
            <div class="swiper-wrapper">
                @foreach($courseImages as $courseImage)
                <div class="swiper-slide">
                    <img src="{{ $courseImage->image['url'] ?? null }}" loading="lazy" alt="Hình ảnh khóa học và sự kiện của Trung tâm kế toán chuyên nghiệp DPT">
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div thumbsSlider="" class="swiper thumb-course-images">
            <div class="swiper-wrapper">
                @foreach($courseImages as $courseImage)
                    <div class="swiper-slide">
                        <img src="{{ $courseImage->image['url'] ?? null }}" loading="lazy" alt="Hình ảnh khóa học và sự kiện của Trung tâm kế toán chuyên nghiệp DPT">
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <div class="row g-3 index-post">
        @foreach($categories as $category)
            @if($category->activePosts->isNotEmpty())
                @php
                    $firstPost = $category->activePosts->first();
                    $olderPost = $category->activePosts->toArray();
                    unset($olderPost[0]);
                @endphp
                <div class="col-md-6">
                    <div class="box-post">
                        <div class="box-heading">
                            <div class="post-title">
                                <a href="{{ route('user.post.index', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
                            </div>
                            <div class="post-see-more">
                                <a href="{{ route('user.post.index', ['slug' => $category->slug]) }}"> Xem tất cả »» </a>
                            </div>
                        </div>
                        <div class="post-body">
                            <div class="highlight-post">
                                <a href="{{ route('user.post.detail', ['slug' => $firstPost->slug, 'category' => $category->slug]) }}" class="post-thumbnail">
                                    <img src="{{ $firstPost->image['url'] }}" alt="">
                                </a>
                                <div class="post-title-description">
                                    <a href="{{ route('user.post.detail', ['slug' => $firstPost->slug, 'category' => $category->slug]) }}">{{ $firstPost->title }}</a>
                                    <p>{{ $firstPost->short_description }}</p>
                                </div>
                            </div>
                            <div class="normal-post">
                                @if($olderPost)
                                    @foreach($olderPost as $post)
                                        <div>
                                            <a href="">Sự khác biệt của dịch vụ kế toán thuế trọn gói cho công ty nước ngoài do Kế toán Lê Ánh cung cấp</a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
