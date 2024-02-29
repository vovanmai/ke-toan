@extends('user.layouts.master')
@section('content')
    <div class="post-list">
        <h2 class="category-name">
            Tuyển dụng
        </h2>
        <div class="post-wrap">
            @foreach($items as $item)
            <article>
                <div class="post-inner">
                    <div class="entry-thumb">
                        <a href="http://laravel.test/tuyen-dung">
                            <img class="w-100" src="{{ $item->image['url'] ?? null }}" alt="">
                        </a>
                    </div>
                    <div class="entry-content">
                        <h3 class="entry-title">
                            <a href="https://hbkvietnam.com/vi/tin-tuc/chia-se-kinh-nghiem-lam-ke-toan-tong-hop-it-nguoi-biet-den/" title="Chia sẻ kinh nghiệm làm kế toán tổng hợp ít người biết đến">{{ $recruitment->title }}</a>
                        </h3>
                        <div class="entry-meta">
                            <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $item->created_at->format('d/m/Y H:i') }}</span>
                        </div>
{{--                        <div class="entry-description">--}}
{{--                            <p>{{ $recruitment->short_description }}</p>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </article>
            @endforeach

            <div class="d-flex pagination-block">
                {!! $items->onEachSide(1)->links() !!}
            </div>
        </div>
    </div>
@endsection
