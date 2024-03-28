@if($isShowMainBanner ?? false)
    @php
        $mainBanners = resolve(\App\Services\User\MainBanner\ListService::class)->handle();
    @endphp
    <!-- Main banner -->
    <div class="swiper main-banner-swiper">
        <div class="swiper-wrapper">
            @foreach($mainBanners as $banner)
                <div class="swiper-slide">
                    <a href="{{ $banner->link }}" class="banner">
                        <img src="{{ $banner->image['url'] }}" alt="{{ $banner->title }}" loading="lazy">
                        @if($banner->link)
                            <button href="{{ $banner->link }}" type="button" class="banner-link btn btn-outline-info rounded-pill">
                                Chi tiết <i class="fas fa-arrow-right"></i>
                            </button>
                        @endif
                    </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

@endif
