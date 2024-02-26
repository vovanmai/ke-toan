@php
    $websiteSetting = \App\Models\WebsiteSetting::first();
@endphp
<div class="footer_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-5">
                <div class="widgets_container contact_us">
                    <div class="footer_logo">
                        <a href="#"><img src="/assets/user/user1/img/logo/logo.png" alt=""></a>
                    </div>
                    <div class="footer_contact">
                        <p>{{ $websiteSetting->footer_slogan ?? null }}</p>
                        <div class="customer_support">
                            <div class="support_img_icon">
                                <img src="/assets/user/user1/img/icon/hotline.png" alt="">
                            </div>
                            <div class="customer_support_text">
                                <p>
                                    <span>Hỗ trợ khác hàng</span>
                                    <a href="tel:{{ $websiteSetting->customer_support_phone ?? null }}">{{ $websiteSetting->customer_support_phone ?? null }}</a>
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
                            <button id="mc-submit">Đăng ký</button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->
                    </div>
                    <p>Chúng tôi sẽ không chia sẽ email này cho bất kỳ ai.</p>
                    <div class="footer_social">
                        <ul>
                            <li><a class="facebook" href="#"><i class="ion-social-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="ion-social-twitter"></i></a></li>
                            <li><a class="youtube" href="#"><i class="ion-social-youtube"></i></a></li>
                            <li><a class="google" href="#"><i class="ion-social-google"></i></a></li>
                            <li><a class="instagram" href="#"><i class="ion-social-instagram"></i></a></li>
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
                        {!! getWebsiteSetting('footer_fb_fan_page')->footer_fb_fan_page ?? null !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
