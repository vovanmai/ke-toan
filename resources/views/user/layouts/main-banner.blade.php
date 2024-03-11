@if($isHomePage ?? false)
    @php
        $mainBanners = resolve(\App\Services\User\MainBanner\ListService::class)->handle();
    @endphp
    <!-- Main banner -->
    <div class="swiper main-banner-swiper">
        <div class="swiper-wrapper">
            @foreach($mainBanners as $banner)
            <div class="swiper-slide">
                <img src="{{ $banner->image['url'] }}" alt="">
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
@endif
