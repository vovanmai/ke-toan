@extends('user.layouts.master')
@section('content')
    <div>
        @if(filled($keyword ?? null))
            @php
                $totalCourse = $result['courses']->count();
                $totalPost = $result['posts']->total();
                $total = number_format($totalCourse + $totalPost);
            @endphp
            <div class="search-keyword">Có <strong>{{ $total }}</strong> kết quả tìm kiếm cho "<strong>{{ $keyword }}</strong>"</div>
            <div class="search-result-wrapper">
                @if($totalCourse)
                <div class="search-item">
                    <div class="search-item-label">Khóa học</div>
                    <div class="search-item-body">
                        <div class="list">
                            @foreach($result['courses'] ?? [] as $item)
                                <div class="item">
                                    <a href="{{ route('user.course.detail', ['slug' => $item->slug, 'category' => $item->category->slug]) }}">{{ $item->title }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                @if($totalPost)
                <div class="search-item">
                    <div class="search-item-label">Bài viết</div>
                    <div class="search-item-body">
                        <div class="list">
                            @foreach($result['posts'] ?? [] as $item)
                                <div class="item">
                                    <a href="{{ route('user.post.detail', ['slug' => $item->slug, 'category' => $item->category->slug]) }}">{{ $item->title }}</a>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex pagination-block">
                            {!! $result['posts']->onEachSide(1)->links() !!}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        @else
            <div class="keyword-validation-error">
                <strong>Vui lòng nhập từ khóa tìm kiếm...</strong>
            </div>
        @endif
    </div>
@endsection
