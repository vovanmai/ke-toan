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
                <div class="block-wrap">
                    <div class="main-post">
                        <a href="{{ route('user.post.detail', ['slug' => $firstPost->slug, 'category' => $category->slug]) }}" title="{{ $firstPost->title }}" rel="nofollow" id="featured-thumbnail">
                            <div class="featured-thumbnail">
                                <img src="{{ $firstPost->image['url'] }}" class="attachment-featured size-featured wp-post-image">
                            </div>
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
