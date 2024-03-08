<div class="sidebars">
    @php
        $webSetting = app('web_setting');
        $hotline = $webSetting->hotline ?? '';
        $newHotline = str_replace('.', '', $hotline);
        $posts = resolve(\App\Services\User\Post\ListPostByViewService::class)->handle();
    @endphp
    <div class="widget sidebar support-online">
        <h3>Hỗ trợ trực tuyến</h3>
        <div class="widget-content">
            <a class="number-phone" href="tel:{{ $newHotline }}">Hotline or Zalo:
                <span style="color: blue; text-decoration: underline">{{ $hotline }}</span>
                (Mr Phương)</a>
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

    <div style="margin-bottom: 20px">
        <h5 style="background: red; letter-spacing: 1px; margin: 0; font-weight: 700; text-align: center; padding: 7px; font-size: 18px; color: white">HỖ TRỢ & TƯ VẤN</h5>
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
