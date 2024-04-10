@extends('user.layouts.master')
@section('content')
    <div>
        @if(filled($keyword ?? null))
        <div class="search-keyword">Kết quả tìm kiếm cho "<strong>{{ $keyword }}</strong>"</div>
        @else
        <div class="keyword-validation-error">
            <strong>Vui lòng nhập từ khóa tìm kiếm...</strong>
        </div>
        @endif

        <div class="search-result-wrapper">
            <div class="search-item">
                <div class="search-item-label">Khóa học</div>
                <div class="search-item-body">
                    @foreach($result['courses'] ?? [] as $item)
                        <div>{{ $item->title }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
