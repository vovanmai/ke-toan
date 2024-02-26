<!-- Slider -->
<div class="position-relative">
    <!-- Swiper Main Slider -->
    <div class="js-swiper-shop-classic-hero swiper bg-light">
        <div class="swiper-wrapper">
            @php
                $banners = resolve(\App\Services\User\User4\Slider\ListService::class)->handle(['active' => true])->toArray();
                $banners = $banners ?: [
                    customAsset('assets/user/user4/img/mua-thung-rung-dua-bay-mau-1.jpg'),
                    customAsset('assets/user/user4/img/du-khach-di-tour-rung-dua-bay-mau-2.jpg'),
                    customAsset('assets/user/user4/img/du-khach-di-tour-rung-dua-bay-mau-3.jpg'),
                ];
            @endphp
            @foreach($banners as $banner)
                <!-- Slide -->
                <div class="swiper-slide">
                    <img style="width: 100%" class="img-fluid" src="{{ $banner }}" alt="Image Description">
                </div>
                <!-- End Slide -->
            @endforeach
        </div>
        <!-- Arrows -->
        <div class="js-swiper-shop-classic-hero-button-next swiper-button-next"></div>
        <div class="js-swiper-shop-classic-hero-button-prev swiper-button-prev"></div>
    </div>
    <!-- End Swiper Main Slider -->
    <!-- Swiper Thumbs Slider -->
    <div class="position-absolute bottom-0 start-0 end-0 mb-3 thumbnail-slide">
        <div class="js-swiper-shop-hero-thumbs swiper" style="max-width: 13rem;">
            <div class="swiper-wrapper">

            @foreach($banners as $banner)
                <!-- Slide -->
                    <div class="swiper-slide">
                        <a class="js-swiper-thumb-progress swiper-thumb-progress-avatar" href="javascript:;" tabindex="0">
                            <img class="swiper-thumb-progress-avatar-img" src="{{ $banner }}" alt="Image Description">
                        </a>
                    </div>
                <!-- End Slide -->
            @endforeach
            </div>
        </div>
    </div>
    <!-- End Swiper Thumbs Slider -->
</div>
<!-- End Slider -->
