@extends('user.layouts.master')
@section('content')
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
                @if($category->display_type === \App\Models\Category::TYPE_DISPLAY_LIST)
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
                @else
                <div class="display-vertical">
                    <div class="row g-4">
                        @foreach($category->activePosts as $post)
                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="{{ route('user.post.detail', ['slug' => $post->slug, 'category' => $category->slug]) }}" class="item" style="border: 1px solid #eaebed; border-radius: 10px; overflow: hidden; display: block; text-decoration: none">
                                <div>
                                    <img style="width: 100%; height: 280px; object-fit: cover" src="{{ $post->image['url'] }}" alt="">
                                </div>

                                <h5 class="title" title="{{ $post->title }}">{{ $post->title }}</h5>

                                <div style="font-size: 13px; color: gray; border-top: 1px solid #e9e9e9">
                                    <div style="padding: 7px 10px">
                                            <span>
                                                <i class="far fa-clock"></i> {{ $post->created_at->format('d/m/Y H:i') }}
                                            </span>
                                        |
                                        <span>
                                                <i class="fas fa-eye"></i> {{ number_format($post->total_view) }}
                                            </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        @endif
    @endforeach
@endsection
