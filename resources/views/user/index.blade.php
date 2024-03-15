@extends('user.layouts.master')
@section('content')
    @if($courses->isNotEmpty())
    <div class="block">
        <h2 class="block-title">
            <a href="{{ route('user.course.list_all') }}">Khoá học kế toán</a>
        </h2>
        <div class="display-vertical">
            <div class="row g-4">
                @foreach($courses as $item)
                    <div class="col-12 col-sm-6 col-md-4">
                        <a href="{{ route('user.course.detail', ['slug' => $item->slug, 'category' => $item->category->slug]) }}" class="item" style="border: 1px solid #eaebed; border-radius: 10px; overflow: hidden; display: block; text-decoration: none">
                            <div>
                                <img style="width: 100%; height: 280px; object-fit: cover" src="{{ $item->image['url'] }}" alt="">
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
            <a href="{{ route('user.course.list_all') }}">Hình ảnh các khóa học</a>
        </h2>
        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="http://laravel.test/storage/uploads/17104772610949d1091cd-43dd-46da-9baf-4b3cbe3a81b9jpeg.jpeg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div thumbsSlider="" class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="http://laravel.test/storage/uploads/17104772610949d1091cd-43dd-46da-9baf-4b3cbe3a81b9jpeg.jpeg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                </div>
                <div class="swiper-slide">
                    <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                </div>
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
