@extends('user.layouts.master')
@section('content')
    <div class="post-list">
        <div class="category-name">
            <a>
                {{ $category->title }}
            </a>
        </div>
        <div class="post-wrap">
            @if($category->display_type === \App\Models\Category::TYPE_DISPLAY_LIST)
            <div class="display-horizontal">
                @foreach($posts as $post)
                    <article>
                        <div class="post-inner">
                            <div class="entry-thumb">
                                <a href="{{ route('user.post.detail', ['slug' => $post->slug, 'category' => $post->category->slug,]) }}">
                                    <img class="w-100" src="{{ $post->image['url'] ?? null }}" alt="">
                                </a>
                            </div>
                            <div class="entry-content">
                                <h3 class="entry-title">
                                    <a href="{{ route('user.post.detail', ['slug' => $post->slug, 'category' => $post->category->slug]) }}" title="{{ $post->title }}">{{ $post->title }}</a>
                                </h3>
                                <div class="entry-meta">
                            <span>
                                <i class="far fa-clock" aria-hidden="true"></i> {{ $post->created_at->format('d/m/Y H:i') }}
                            </span> |
                                    <span>
                                <i class="far fa-user" aria-hidden="true"></i> {{ $post->admin->name }}
                            </span>
                                </div>
                                <div class="entry-description">
                                    <p>{{ $post->short_description }}</p>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            @else
            <div class="display-vertical">
                <div class="row g-4">
                    @foreach($posts as $post)
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
            <div class="d-flex pagination-block">
                {!! $posts->onEachSide(1)->links() !!}
            </div>
        </div>
    </div>
@endsection
