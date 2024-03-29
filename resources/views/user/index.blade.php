@extends('user.layouts.master')
@section('content')
    @if($courses->isNotEmpty())
    <div class="block">
        <h2 class="block-title">
            <a href="{{ route('user.course.list_all') }}">Khoá học kế toán</a>
        </h2>
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
                                            <i class="far fa-clock"></i> {{ $item->created_at->format('d/m/Y H:i') }}
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
        <h2 class="block-title">
            <a>Hình ảnh khóa học & Sự kiện</a>
        </h2>
        @php
            $courseImages = resolve(\App\Services\User\CourseImage\ListService::class)->handle();
        @endphp
        <div class="swiper course-images">
            <div class="swiper-wrapper">
                @foreach($courseImages as $courseImage)
                <div class="swiper-slide">
                    <img src="{{ $courseImage->image['url'] ?? null }}" loading="lazy">
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
                        <img src="{{ $courseImage->image['url'] ?? null }}" loading="lazy">
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    @foreach($categories as $category)
        @if($category->activePosts->isNotEmpty())
            @php
                $firstPost = $category->activePosts->first();
                $olderPost = $category->activePosts->toArray();
                unset($olderPost[0]);
            @endphp

            <div class="block">
                <h2 class="block-title">
                    <a href="{{ route('user.post.index', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
                </h2>
                <div class="block-wrap display-horizontal">
                    <div class="main-post">
                        <a class="featured-thumbnail" href="{{ route('user.post.detail', ['slug' => $firstPost->slug, 'category' => $category->slug]) }}" title="{{ $firstPost->title }}" rel="nofollow">
                            <img src="{{ $firstPost->image['url'] }}">
                        </a>
                        <h3 class="title">
                            <a href="{{ route('user.post.detail', ['slug' => $firstPost->slug, 'category' => $category->slug]) }}" title="{{ $firstPost->title }}">{{ $firstPost->title }}</a>
                        </h3>
                        <p class="description">{{ $firstPost->short_description }}</p>
                    </div>
                    @if($olderPost)
                        <div class="older-posts">
                            <ul>
                                @foreach($olderPost as $post)
                                    <li>
                                        <a href="{{ route('user.post.detail', ['slug' => $post['slug'], 'category' => $category->slug]) }}" title="{{ $post['title'] }}">{{ $post['title'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    @endforeach
@endsection
