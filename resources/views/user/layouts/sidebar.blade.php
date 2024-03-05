<div class="sidebars">
    @php
        $webSetting = app('web_setting');
        $hotline = $webSetting->hotline ?? '';
        $newHotline = str_replace('.', '', $hotline)
    @endphp
    <div class="widget sidebar support-online">
        <h3>Hỗ trợ trực tuyến</h3>
        <div class="widget-content">
            <a class="number-phone" href="tel:{{ $newHotline }}">Hotline or Zalo:
                <span style="color: blue; text-decoration: underline">{{ $hotline }}</span>
                (Mr Phương)</a>
        </div>
    </div>
    <div class="widget sidebar">
        <h3>Fanpage</h3>
        <div class="widget-content">
            {!! $webSetting->fb_fan_page_script ?? null !!}
        </div>
    </div>
</div>
