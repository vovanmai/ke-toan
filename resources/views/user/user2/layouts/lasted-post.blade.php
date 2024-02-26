@php
    $posts = resolve(\App\Services\User\User2\Post\ListLastedPostService::class)->handle();
@endphp
<div class="widget_list widget_post">
    <h5 class="text-center" style="font-weight: bold; color: white; background: #0a804a; padding: 6px 5px; margin-bottom: 10px">
        BÀI VIẾT GẦN NHẤT
    </h5>
    @foreach($posts as $item)
    <div class="post_wrapper">
        <div class="post_thumb">
            <a href="{{ route('user.post.detail', ['slug' => $item->slug]) }}">
                <img style="width: 50px; height: 50px; object-fit: cover" src="{{ $item->image['url'] }}" alt="">
            </a>
        </div>
        <div class="post_info">
            <h3><a href="{{ route('user.post.detail', ['slug' => $item->slug]) }}">{{ mb_strlen($item->title) > 30 ? mb_substr($item->title, 0, 30) . '...' : $item->title }}</a></h3>
            <span>{{ $item->created_at->diffForHumans() }}</span>
        </div>
    </div>
    @endforeach
</div>
