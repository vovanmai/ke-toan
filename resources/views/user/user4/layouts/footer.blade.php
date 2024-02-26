<!-- ========== FOOTER ========== -->
<footer class="bg-dark">
    <div class="container pb-1 pb-lg-5">
        <div class="row content-space-t-1">
            <div class="col-lg-3 mb-7 mb-lg-0">
                <!-- Logo -->
                <div class="mb-5">
                    <a class="navbar-brand" href="/" aria-label="Space">
                        <img class="navbar-brand-logo" src="{{ customAsset('assets/user/user4/img/logo.png') }}" alt="Image Description">
                    </a>
                </div>
                <!-- End Logo -->

                <!-- List -->
                <ul class="list-unstyled list-py-1">
                    <li><a class="link-sm link-light" href="#"><i class="bi-geo-alt-fill me-1"></i>Tổ 1, thôn Vạn Lăng, xã Cẩm Thanh, TP. Hội An, tỉnh Quảng Nam</a></li>
                    <li><a class="link-sm link-light" href="tel:0818790015"><i class="bi-telephone-inbound-fill me-1"></i>081.879.0015</a></li>
                </ul>
                <!-- End List -->

            </div>
            <!-- End Col -->

            <div class="col-lg-9 mb-7 mb-sm-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8719.090279162667!2d108.35984578522319!3d15.876072934684803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31420dadaf61a853%3A0xf6d4fb8016f50b0e!2zS2h1IGRpIHTDrWNoIGzhu4tjaCBz4butIHbEg24gaMOzYSBS4burbmcgROG7q2EgQuG6o3kgTeG6q3U!5e0!3m2!1sen!2s!4v1688612081133!5m2!1sen!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->

        <div class="border-top border-white-10 my-6"></div>

        <!-- Copyright -->
        <div class="w-md-85 text-lg-center mx-lg-auto">
            <p class="text-white-50 small">
                © Thăm quan Rừng Dừa Bảy Mẫu Hội An. Website made by
                <a style="color: white" href="/" target="_blank">
                    <i class="bi bi-heart-fill"></i> Ẩn danh
                </a>
            </p>
        </div>
        <!-- End Copyright -->
    </div>
</footer>
<!-- ========== END FOOTER ========== -->
<!-- Go To -->
<a class="js-go-to go-to position-fixed" href="javascript:;" style="visibility: hidden;" data-hs-go-to-options='{
         "offsetTop": 700,
         "position": {
         "init": {
         "right": "2rem"
         },
         "show": {
         "bottom": "2rem"
         },
         "hide": {
         "bottom": "-2rem"
         }
         }
         }'>
    <i class="bi-chevron-up"></i>
</a>

<div class="phone1">
    <a href="tel:0818790015" style="position: relative">
        <div class="number" style="display: none;"> 0818790015</div>
        <div class="quick-alo-ph-circle"></div>
        <div class="quick-alo-ph-circle-fill"></div>
        <div class="quick-alo-ph-img-circle"> </div>
    </a>
</div>

<div class="zalo">
    <a href="https://zalo.me/0818790015" style="position: relative">
        <div class="zalo-number" style="display: none;"> 0818790015</div>
        <div class="zalo-quick-alo-ph-circle"></div>
        <div class="zalo-quick-alo-ph-circle-fill"></div>
        <div class="zalo-quick-alo-ph-img-circle"> </div>
    </a>
</div>

<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "112467188579788");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v17.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- JS Implementing Plugins -->
<script src="{{ customAsset('assets/user/user4/js/vendor.min.js') }}"></script>
<!-- JS Front -->
<script src="{{ customAsset('assets/user/user4/js/theme.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="{{ customAsset('assets/user/user4/js/my-script.js') }}"></script>
<!-- JS Plugins Init. -->
<script>
    (function() {
        // INITIALIZATION OF MEGA MENU
        // =======================================================
        new HSMegaMenu('.js-mega-menu', {
            desktop: {
                position: 'left'
            }
        })


        // INITIALIZATION OF GO TO
        // =======================================================
        new HSGoTo('.js-go-to')


        // INITIALIZATION OF SWIPER
        // =======================================================
        var sliderThumbs = new Swiper('.js-swiper-shop-hero-thumbs', {
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            history: false,
            slidesPerView: 3,
            spaceBetween: 15,
            on: {
                beforeInit: (swiper) => {
                    const css = `.swiper-slide-thumb-active .swiper-thumb-progress .swiper-thumb-progress-path {
                       opacity: 1;
                       -webkit-animation: ${swiper.originalParams.autoplay.delay}ms linear 0ms forwards swiperThumbProgressDash;
                       animation: ${swiper.originalParams.autoplay.delay}ms linear 0ms forwards swiperThumbProgressDash;
                   }`
                    style = document.createElement('style')
                    document.head.appendChild(style)
                    style.type = 'text/css'
                    style.appendChild(document.createTextNode(css));

                    swiper.el.querySelectorAll('.js-swiper-thumb-progress')
                        .forEach(slide => {
                            slide.insertAdjacentHTML('beforeend', '<span class="swiper-thumb-progress"><svg version="1.1" viewBox="0 0 160 160"><path class="swiper-thumb-progress-path" d="M 79.98452083651917 4.000001576345426 A 76 76 0 1 1 79.89443752470656 4.0000733121155605 Z"></path></svg></span>')
                        })
                },
            },
        });

        var swiper = new Swiper('.js-swiper-shop-classic-hero',{
            autoplay: true,
            loop: true,
            navigation: {
                nextEl: '.js-swiper-shop-classic-hero-button-next',
                prevEl: '.js-swiper-shop-classic-hero-button-prev',
            },
            thumbs: {
                swiper: sliderThumbs
            }
        });
    })()
</script>
@stack('script')
</body>
</html>
