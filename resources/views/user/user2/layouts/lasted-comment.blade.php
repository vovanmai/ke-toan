@php
    $comments = resolve(\App\Services\User\User2\Comment\ListTopCommentService::class)->handle();
@endphp

<div class="widget_list comments_post">
    <h5 class="text-center" style="font-weight: bold; color: white; background: #0a804a; padding: 6px 5px; margin-bottom: 10px">
        BÌNH LUẬN
    </h5>
    @foreach($comments as $item)
        @php
            $target = $item->target;
            if ($target instanceof \App\Models\Course) {
                $route = route('user.course.detail', ['slug' => $target->slug]);
            } elseif ($target instanceof \App\Models\Recruitment) {
                $route = route('user.recruitment.detail', ['slug' => $target->slug]);
            } elseif ($target instanceof \App\Models\Post) {
                $route = route('user.post.detail', ['slug' => $target->slug]);
            }
        @endphp
    <div class="post_wrapper">
        <div class="post_thumb">
            <a href="{{ $route }}">
                <img style="width: 50px; height: 50px; object-fit: cover" src="{{ $target->image['url'] ?? '' }}" alt="">
            </a>
{{--            <a href="{{ $route }}"><img src="/assets/user/user2/img/blog/comment.png" alt=""></a>--}}
        </div>
        <div class="post_info">
            <span>{{ $item->name }} đã bình luận:</span>
            <a href="{{ $route }}">{{ mb_strlen($target->title) > 25 ? mb_substr($target->title, 0, 25) . '...' : $target->title }}</a>
        </div>
    </div>
    @endforeach
</div>
