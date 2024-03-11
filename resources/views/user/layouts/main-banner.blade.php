@if($isHomePage ?? false)
    @php
        $mainBanners = resolve(\App\Services\User\MainBanner\ListService::class)->handle();
    @endphp
    <!-- Main banner -->
    <div class="swiper main-banner-swiper">
        <div class="swiper-wrapper">
            @foreach($mainBanners as $banner)
            <div class="swiper-slide">
                <div class="banner">
                    <img src="{{ $banner->image['url'] }}" alt="">
                    @if($banner->link)
                        <a href="{{ $banner->link }}" type="button" class="banner-link btn btn-outline-info rounded-pill">
                            Chi tiết <i class="fas fa-arrow-right"></i>
                        </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
@endif
