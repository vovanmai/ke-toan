@php
    $webSetting = getWebsiteSetting();
    $logoWidth = $webSetting->logo_width ?? null;
    $logoHeight = $webSetting->logo_height ?? null;
    $styleLogo = ($logoWidth ? "width: {$logoWidth}px;" : '') . ($logoHeight ? "height: {$logoHeight}px;" : '');
@endphp
<!--header middel start-->
<div class="header_middle sticky-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-6">
                <div class="logo">
                    <a href="{{ route('user.index') }}">
                        <img style="{{ $styleLogo }} object-fit: cover" src="{{ isset($webSetting->logo) ? $webSetting->logo['url'] : '/assets/user/user1/img/logo/logo.png' }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-10 col-md-6 header_position">
                <div class="middel_right">
                    <div class="main_menu menu_two">
                        <nav>
                            <ul>
                                <li>
                                    <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ route('user.index') }}">
                                        Trang chủ
                                        {{--<i class="fa fa-angle-down"></i>--}}
                                    </a>
                                    {{--<ul class="sub_menu">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                        <li><a href="index-3.html">Home 3</a></li>
                                        <li><a href="index-4.html">Home 4</a></li>
                                        <li class="home5_new"><a href="index-5.html">Home 5</a> <span>new</span>
                                        </li>
                                    </ul>--}}
                                </li>
                                {{--<li class="mega_items"><a href="shop.html">shop<i
                                            class="fa fa-angle-down"></i></a>
                                    <div class="mega_menu">
                                        <ul class="mega_menu_inner">
                                            <li><a href="#">Shop Layouts</a>
                                                <ul>
                                                    <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                    <li><a href="shop-fullwidth-list.html">Full Width list</a>
                                                    </li>
                                                    <li><a href="shop-right-sidebar.html">Right Sidebar </a>
                                                    </li>
                                                    <li><a href="shop-right-sidebar-list.html"> Right Sidebar
                                                            list</a></li>
                                                    <li><a href="shop-list.html">List View</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">other Pages</a>
                                                <ul>
                                                    <li><a href="cart.html">cart</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="my-account.html">my account</a></li>
                                                    <li><a href="404.html">Error 404</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Product Types</a>
                                                <ul>
                                                    <li><a href="product-details.html">product details</a></li>
                                                    <li><a href="product-sidebar.html">product sidebar</a></li>
                                                    <li><a href="product-grouped.html">product grouped</a></li>
                                                    <li><a href="variable-product.html">product variable</a>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li><a href="#">Concrete Tools</a>
                                                <ul>
                                                    <li><a href="shop.html">Cables & Connectors</a></li>
                                                    <li><a href="shop-list.html">Graphics Tablets</a></li>
                                                    <li><a href="shop-fullwidth.html">Printers, Ink & Toner</a>
                                                    </li>
                                                    <li><a href="shop-fullwidth-list.html">Refurbished
                                                            Tablets</a></li>
                                                    <li><a href="shop-right-sidebar.html">Optical Drives</a>
                                                    </li>

                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="banner_static_menu">
                                            <a href="shop.html"><img src="/assets/user/user1/img/bg/banner1.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </li>--}}
                                {{--<li><a href="blog.html">blog<i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                        <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                    </ul>
                                </li>--}}
                                {{--<li><a href="#">pages <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="services.html">services</a></li>
                                        <li><a href="faq.html">Frequently Questions</a></li>
                                        <li><a href="login.html">login</a></li>
                                        <li><a href="compare.html">compare</a></li>
                                        <li><a href="privacy-policy.html">privacy policy</a></li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                    </ul>
                                </li>--}}
                                <li><a class="{{ request()->is('recruitment') ? 'active' : '' }}" href="{{ route('user.recruitment.index') }}">Tuyển dụng</a></li>
                                <li><a class="{{ request()->is('about-us') ? 'active' : '' }}" href="{{ route('user.about_us') }}">Về chúng tôi</a></li>
                                <li><a class="{{ request()->is('contact') ? 'active' : '' }}" href="{{ route('user.contact') }}">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="customer_support">
                        <div class="support_img_icon">
                            <img src="/assets/user/user1/img/icon/icon_phone.png" alt="">
                        </div>
                        <div class="customer_support_text">
                            <p>
                                <span>Hỗ trợ khách hàng</span>
                                <a href="tel:{{ $webSetting->customer_support_phone ?? null }}">{{ $webSetting->customer_support_phone ?? null }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--header middel end-->
