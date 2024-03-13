<div class="sidebars">
    @php
        $webSetting = app('web_setting');
        $hotline = $webSetting->hotline ?? '';
        $newHotline = str_replace('.', '', $hotline);
        $posts = resolve(\App\Services\User\Post\ListPostByViewService::class)->handle();
        $courses = resolve(\App\Services\User\Course\ListByViewService::class)->handle();
    @endphp
    <div class="widget sidebar support-online">
        <h3>Hỗ trợ trực tuyến</h3>
        <div class="widget-content">
            <a class="number-phone" href="tel:{{ $newHotline }}">
                <img style="width: 60px; height: 60px; margin-right: 10px" src="/assets/user/img/hot-line.png" alt="">
                <span style="color: blue; text-decoration: underline">{{ $hotline }}</span>
                (Mr Phương)</a>
        </div>
    </div>

    <div class="widget sidebar highlight-post">
        <h3>Khóa học nổi bật</h3>
        <div class="widget-content">
            @foreach($courses as $course)
                <a href="{{ route('user.course.detail', ['category' => $course->category->slug, 'slug' => $course->slug]) }}">
                    <img src="{{ $course['image']['url'] }}" alt="{{ $course->title }}">
                    <p style="text-decoration: none;">
                        {{ $course->title }}
                    </p>
                </a>
            @endforeach
        </div>
    </div>

    <div class="widget sidebar highlight-post">
        <h3>Bài viết nổi bật</h3>
        <div class="widget-content">
            @foreach($posts as $post)
            <a href="{{ route('user.post.detail', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">
                <img src="{{ $post['image']['url'] }}" alt="{{ $post->title }}">
                <p style="text-decoration: none;">
                    {{ $post->title }}
                </p>
            </a>
            @endforeach
        </div>
    </div>

    <div id="support-and-consultation">
        <h5>HỖ TRỢ & TƯ VẤN</h5>
        <div style="border: 1px solid red; padding: 15px">
            <form id="request-question" action="javascript:void(0)">
                <div class="mb-3">
                    <input type="text" name="name" placeholder="Họ và tên" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" placeholder="Số điện thoại" class="form-control">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="content" placeholder="Nội dung"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-secondary"><i class="far fa-paper-plane"></i> Gửi</button>
                </div>
            </form>
        </div>
    </div>

    <div class="widget sidebar">
        <h3>Fanpage</h3>
        <div class="widget-content">
            {!! $webSetting->fb_fan_page_script ?? null !!}
        </div>
    </div>
</div>
