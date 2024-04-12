@extends('user.layouts.master')
@section('content')
    <div>
        @include('user.course.breadcrumb')
    </div>
    <div class="post-detail">
        <h4 class="post-title">
            {{ $item->title }}
        </h4>
        <div class="addition-info" style="display: flex; justify-content: space-between">
            <div>
                <span>
                    <i class="far fa-clock"></i>
                    {{ ucfirst($item->updated_at->translatedFormat('l')) . ' ' . $item->updated_at->translatedFormat('d/m/Y H:i') }}
                </span>
                |
                <span>
                    <i class="far fa-user"></i> {{ $item->admin->name }}
                </span>
                |
                <span>
                    <i class="fas fa-eye"></i> {{ number_format($item->total_view) }}
                </span>
            </div>
            <div class="group-share-socical">
                <div style="position: relative" class="wrapper-share-social">
                    <button
                        class="button-show-share"
                        style="border: none; padding: 4px 10px; font-size: 13px; background-color: #78B43C; color: white;"
                        type="button">
                        <i class="fas fa-share" aria-hidden="true"></i>
                        Share
                    </button>
                    <div class="box-social">
                        <a onclick="shareOnSocial('facebook', '{{ route('user.course.detail', ['category' => $item->category->slug, 'slug' => $item->slug]) }}')" class="link-share-social share-facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a class="link-share-social share-messenger">
                            <i class="fab fa-facebook-messenger"></i>
                        </a>
                    </div>
                </div>
                <div class="wrapper-share-social-mobile">
                    <button type="button" onclick="shareNavigator('{{ route('user.post.detail', ['category' => $item->category->slug, 'slug' => $item->slug]) }}')">
                        <i class="fas fa-share" aria-hidden="true"></i> Share
                    </button>
                </div>
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
