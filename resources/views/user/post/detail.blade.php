@extends('user.layouts.master')
@section('content')
    <div>
        @include('user.layouts.breadcrumb')
    </div>
    <div class="post-detail">
        <h4 class="post-title">
            {{ $item->title }}
        </h4>
        <div class="addition-info">
            <span>
                <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->created_at->format('d/m/Y H:i') }}
            </span> |
            <span>
                <i class="fa fa-user-o" aria-hidden="true"></i> {{ $item->admin->name }}
            </span> |
            <span>
                <i class="fa fa-eye" aria-hidden="true"></i> {{ number_format($item->total_view) }}
            </span>
        </div>

        <div class="share-like-social">
            <div class="fb-like"
                 data-href="{{ route('user.post.detail', ['slug' => $item->slug]) }}"
                 data-width=""
                 data-layout=""
                 data-action=""
                 data-size=""
                 data-share="true"
            >
            </div>
        </div>

        <p class="post-short-description">
            {{ $item->short_description }}
        </p>

        <div class="post-description ckeditor-content">
            {!! $item->description !!}
        </div>
    </div>
@endsection
