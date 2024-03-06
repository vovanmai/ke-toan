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

        <div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown button
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="popover" title="Popover title" data-bs-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
        </div>

        <div class="share-like-social">
            <div class="fb-like"
                 data-href="{{ route('user.post.detail', ['slug' => $item->slug, 'category' => $item->category->slug]) }}"
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
