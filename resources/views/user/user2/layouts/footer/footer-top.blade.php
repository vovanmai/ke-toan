@php
    $websiteSetting = getWebsiteSetting();
    $logoWidth = $websiteSetting->logo_width ?? null;
    $logoHeight = $websiteSetting->logo_height ?? null;
    $styleLogo = ($logoWidth ? "width: {$logoWidth}px;" : '') . ($logoHeight ? "height: {$logoHeight}px;" : '');

    $phone = $websiteSetting->contact_phone ?? null;
    $phone1 = substr($phone, 0, 4);
    $phone2 = substr($phone, 4, 3);
    $phone3 = substr($phone, 7, 3);
    $sumPhone = "$phone1.$phone2.$phone3";
@endphp
<div class="footer_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-5">
                <div class="widgets_container contact_us">
                    <div class="footer_logo">
                        <a href="{{ route('user.index') }}">
                            <img style="{{ $styleLogo }} object-fit: cover" src="{{ isset($websiteSetting->logo) ? $websiteSetting->logo['url'] : '/assets/user/user2/img/logo/logo.png' }}" alt="">
                        </a>
                    </div>
                    <div class="footer_contact">
                        <p>{{ $websiteSetting->footer_slogan ?? null }}</p>
                        <div class="customer_support">
                            <div class="support_img_icon">
                                <img src="/assets/user/user2/img/icon/hotline.png" alt="">
                            </div>
                            <div class="customer_support_text">
                                <p>
                                    <span>Tư vấn khác hàng</span>
                                    <a href="tel:{{ $websiteSetting->customer_support_phone ?? null }}">{{ $sumPhone ?? null }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-7">
                <div class="widgets_container widgets_subscribe">
                    <h3>Đăng ký để nhận thông báo mới nhất</h3>
                    <div class="subscribe_form">
                        <form id="mc-form" class="mc-form footer-newsletter">
                            <input id="mc-email" type="email" autocomplete="off"
                                   placeholder="Nhập email của bạn vào đây..." />
                            <button id="mc-submit" style="color: white">Đăng ký</button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                       {{-- <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting">111</div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success">222</div><!-- mailchimp-success end -->
                            <div class="mailchimp-error">333</div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->--}}
                    </div>
                    <p>Chúng tôi sẽ không chia sẽ email này cho bất kỳ ai.</p>
                    <div class="footer_social">
                        <ul>
                            <li><a class="facebook" href="https://www.facebook.com/hongphuong.vo.94"><i class="ion-social-facebook"></i></a></li>
{{--                            <li><a class="twitter" href="#"><i class="ion-social-twitter"></i></a></li>--}}
{{--                            <li><a class="youtube" href="#"><i class="ion-social-youtube"></i></a></li>--}}
{{--                            <li><a class="google" href="#"><i class="ion-social-google"></i></a></li>--}}
{{--                            <li><a class="instagram" href="#"><i class="ion-social-instagram"></i></a></li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="widgets_container widget_menu">
                    <h3>Thông tin fanpage</h3>
{{--                    <div class="footer_menu">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">Delivery</a></li>--}}
{{--                            <li><a href="about.html">About Us</a></li>--}}
{{--                            <li><a href="contact.html"> Contact us</a></li>--}}
{{--                            <li><a href="#">Stores</a></li>--}}
{{--                        </ul>--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">Legal Notice</a></li>--}}
{{--                            <li><a href="#">Secure payment</a></li>--}}
{{--                            <li><a href="#">Sitemap</a></li>--}}
{{--                            <li><a href="my-account.html"> My account</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                    <div>
                        {!! $websiteSetting->footer_fb_fan_page ?? null !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($phone)
<a href="tel:{{ $phone }}">
    <div class="animation">
        <span class="icon ring"></span>
        <div class="circle one"></div>
        <div class="circle two"></div>
    </div>
</a>
@endif
