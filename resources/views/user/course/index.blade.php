@extends('user.layouts.master')
@section('content')
    <div class="post-list">
        <h2 class="category-name">
            {{ $category->title ?? 'Khóa học kế toán' }}
        </h2>
        <div class="post-wrap">
            <div class="display-vertical">
                <div class="row g-4">
                    @foreach($items as $item)
                        <div class="col-12 col-sm-6 col-md-4">
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
            <div class="d-flex pagination-block">
                {!! $items->onEachSide(1)->links() !!}
            </div>
        </div>
    </div>
@endsection
