@extends('user.layouts.master')
@section('content')
    <div class="post-list">
        <div class="category-name">
            <a>
                {{ $category->title }}
            </a>
        </div>
        <div class="post-wrap">
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
                                <i class="far fa-clock" aria-hidden="true"></i> {{ ucfirst($post->updated_at->translatedFormat('l')) . ' ' . $post->updated_at->translatedFormat('d/m/Y H:i') }}
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
            <div class="d-flex pagination-block">
                {!! $posts->onEachSide(1)->links() !!}
            </div>
        </div>
    </div>
@endsection
