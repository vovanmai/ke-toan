<!-- Main Wrapper Start -->
<!--offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>
@php
    $websiteSetting = getWebsiteSetting();

    $phone = $websiteSetting->contact_phone ?? null;
    $phone1 = substr($phone, 0, 4);
    $phone2 = substr($phone, 4, 3);
    $phone3 = substr($phone, 7, 3);
    $sumPhone = "$phone1.$phone2.$phone3";
@endphp
<div class="offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                </div>
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="icon-x"></i></a>
                    </div>
                    <div class="welcome_text">
                        <p>{{ $websiteSetting->header_slogan ?? 'Chào mừng đến với trang web của chúng tôi!' }}</p>
                    </div>
                    <div class="top_right">
                        <ul>
                            {{--<li><a href="compare.html"><i class="icon-repeat"></i> Compare (0)</a></li>
                            <li><a href="wishlist.html"><i class="icon-heart"></i> Wishlist (0)</a></li>--}}

                            @if($user = auth()->user())
                            <li class="top_links">
                                <a href="#">
                                    {{ $user->name }}
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown_links">
                                    <li><a href="#">Thông tin tài khoản</a></li>
                                    <li><a href="{{ route('user.logout') }}">Đăng xuất</a></li>
                                </ul>
                            </li>
                            @else
                            <li class="top_links">
                                <a href="{{ route('user.login') }}">
                                    Đăng nhập
                                </a>
                            </li>
                            @endif
                            {{--<li class="currency"><a href="#">$ USD<i class="fa fa-angle-down"
                                                                     aria-hidden="true"></i></a>
                                <ul class="dropdown_currency">
                                    <li><a href="#">EUR – Euro</a></li>
                                    <li><a href="#">GBP – British Pound</a></li>
                                    <li><a href="#">INR – India Rupee</a></li>
                                </ul>
                            </li>
                            <li class="language"><a href="#"><img src="/assets/user/user2/img/logo/language.png"
                                                                  alt="">English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown_language">
                                    <li><a href="#"><img src="/assets/user/user2/img/logo/language.png" alt=""> English</a></li>
                                    <li><a href="#"><img src="/assets/user/user2/img/logo/language2.png" alt=""> Germany</a>
                                    </li>
                                </ul>
                            </li>--}}

                        </ul>
                    </div>
                    <div class="search-container">
                        <form action="#">
                            <div class="search_box">
                                <input placeholder="Tìm kiếm." type="text">
                                <button type="submit">
                                    <i class="icon-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="customer_support">
                        <div class="support_img_icon">
                            <img src="/assets/user/user2/img/icon/icon_phone.png" alt="">
                        </div>
                        <div class="customer_support_text">
                            <p>
                                <span>Tư vấn khách hàng</span>
                                <a href="tel:{{ $websiteSetting->customer_support_phone ?? null }}">{{ $sumPhone ?? null }}</a>
                            </p>
                        </div>
                    </div>
                    {{--<div class="header_cart_wishlist">
                        <div class="header_wishlist_btn">
                            <a href="#"><i class="icon-heart"></i></a>
                            <span class="wishlist_quantity">3</span>
                        </div>
                        <div class="mini_cart_wrapper text-right">
                            <a href="javascript:void(0)"><span class="icon-shopping-cart"></span>$67.71 </a>
                            <span class="cart_quantity">2</span>
                            <!--mini cart-->
                            <div class="mini_cart">
                                <div class="cart_item">
                                    <div class="cart_img">
                                        <a href="#"><img src="/assets/user/user2/img/s-product/product.jpg" alt=""></a>
                                    </div>
                                    <div class="cart_info">
                                        <a href="#">Madden by Steve Madden Cale 6</a>

                                        <span class="quantity">Qty: 1</span>
                                        <span class="price_cart">$60.00</span>

                                    </div>
                                    <div class="cart_remove">
                                        <a href="#"><i class="ion-android-close"></i></a>
                                    </div>
                                </div>
                                <div class="cart_item">
                                    <div class="cart_img">
                                        <a href="#"><img src="/assets/user/user2/img/s-product/product2.jpg" alt=""></a>
                                    </div>
                                    <div class="cart_info">
                                        <a href="#">Calvin Klein Jeans Reflective Logo Full Zip </a>
                                        <span class="quantity">Qty: 1</span>
                                        <span class="price_cart">$69.00</span>
                                    </div>
                                    <div class="cart_remove">
                                        <a href="#"><i class="ion-android-close"></i></a>
                                    </div>
                                </div>
                                <div class="mini_cart_table">
                                    <div class="cart_total">
                                        <span>Sub total:</span>
                                        <span class="price">$138.00</span>
                                    </div>
                                    <div class="cart_total mt-10">
                                        <span>total:</span>
                                        <span class="price">$138.00</span>
                                    </div>
                                </div>

                                <div class="mini_cart_footer">
                                    <div class="cart_button">
                                        <a href="cart.html">View cart</a>
                                    </div>
                                    <div class="cart_button">
                                        <a href="checkout.html">Checkout</a>
                                    </div>

                                </div>

                            </div>
                            <!--mini cart end-->
                        </div>
                    </div>--}}
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="{{ request()->is('/') ? 'active' : '' }}">
                                <a href="{{ route('user.index') }}">Trang chủ</a>
                            </li>
                            <li class="{{ request()->is('tuyen-dung') ? 'active' : '' }}">
                                <a href="{{ route('user.recruitment.index') }}">Tuyển dụng</a>
                            </li>
                            <li class="{{ request()->is('thong-tin-khoa-hoc') ? 'active' : '' }}">
                                <a href="{{ route('user.about_us') }}">Thông tin khóa học</a>
                            </li>
                            <li class="{{ request()->is('lien-he') ? 'active' : '' }}">
                                <a href="{{ route('user.contact') }}">Liên hệ</a>
                            </li>
                            {{--<li class="menu-item-has-children">
                                <a href="#">Shop</a>
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop Layouts</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">shop</a></li>
                                            <li><a href="shop-fullwidth.html">Full Width</a></li>
                                            <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                            <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                            <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                            <li><a href="shop-list.html">List View</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">other Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="cart.html">cart</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="my-account.html">my account</a></li>
                                            <li><a href="404.html">Error 404</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Product Types</a>
                                        <ul class="sub-menu">
                                            <li><a href="product-details.html">product details</a></li>
                                            <li><a href="product-sidebar.html">product sidebar</a></li>
                                            <li><a href="product-grouped.html">product grouped</a></li>
                                            <li><a href="variable-product.html">product variable</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog.html">blog</a></li>
                                    <li><a href="blog-details.html">blog details</a></li>
                                    <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                    <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                </ul>

                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">pages </a>
                                <ul class="sub-menu">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="services.html">services</a></li>
                                    <li><a href="faq.html">Frequently Questions</a></li>
                                    <li><a href="login.html">login</a></li>
                                    <li><a href="compare.html">compare</a></li>
                                    <li><a href="privacy-policy.html">privacy policy</a></li>
                                    <li><a href="coming-soon.html">Coming Soon</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="my-account.html">my account</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="about.html">about Us</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="contact.html"> Contact Us</a>
                            </li>--}}
                        </ul>
                    </div>

                    <div class="offcanvas_footer">
                        <span><a href="#"><i class="fa fa-envelope-o"></i> demo@example.com</a></span>
                        <ul>
                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--offcanvas menu area end-->
