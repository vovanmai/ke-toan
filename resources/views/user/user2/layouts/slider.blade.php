<!--slider area start-->
@php
    $sliders = resolve(\App\Services\User\User2\Slider\ListService::class)->handle(['active' => true]);
@endphp
@if($sliders->count())
<section class="slider_section slider_s_two container" style="">
    <div class="slider_area owl-carousel">
        @foreach($sliders as $item)
            @php
                $item = $item->toArray();
            @endphp
        <div class="single_slider d-flex align-items-center" style="background-size: contain" data-bgimg="{{ $item['image']['url'] }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_content slider_c_two">
                            <h2 style="{{ $item['title_color'] ? "color:" . $item['title_color'] : '' }}">{{ $item['title'] }}</h2>
{{--                            <h1>Tools & Workwear</h1>--}}
                            <p style="{{ $item['short_description_color'] ? "color:" . $item['short_description_color'] : '' }}">{{ $item['short_description'] }}</p>
                            <a style="color: white" href="{{ $item['link'] }}">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif
<!--slider area end-->
