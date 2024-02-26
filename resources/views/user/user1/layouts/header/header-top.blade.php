<!--header top start-->
<div class="header_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-9">
                <div class="welcome_text">
                    {{--<p>Welcome to our store!</p>--}}
{{--                    <p class="scrolling">Chào mừng đến với cửa hàng chúng tôi!</p>--}}
                    <div class="scrolling-limit">
{{--                        <div class="scrolling">Chào mừng đến với cửa hàng chúng tôi!</div>--}}
                        <marquee onmouseout="start()" onmouseover="stop()" width="100%" direction="left" >
                            {{  getWebsiteSetting('header_slogan')->header_slogan ?? 'Chào mừng đến với trang web của chúng tôi!' }}
                        </marquee>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="top_right text-right">
                    <ul>
                        {{--<li><a href="compare.html"><i class="icon-repeat"></i> Compare (0)</a></li>--}}
{{--                        <li class="top_links">--}}
{{--                            <a href="#">Cài đặt<i class="fa fa-angle-down" aria-hidden="true"></i></a>--}}
{{--                            <ul class="dropdown_links">--}}
{{--                                <li><a href="checkout.html">Checkout </a></li>--}}
{{--                                <li><a href="my-account.html">My Account </a></li>--}}
{{--                                <li><a href="cart.html">Shopping Cart</a></li>--}}
{{--                                <li><a href="wishlist.html">Wishlist</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
                        @if($user = auth()->user())
                            <li>
                                <a href="#">
                                    <i class="fa fa-user" aria-hidden="true"></i> {{ $user->name }}
                                </a>
                                <ul class="dropdown_currency">
                                    <li><a href="#">Thông tin tài khoản</a></li>
                                    <li><a href="{{ route('user.logout') }}">Đăng xuất</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="top_links">
                                <a href="{{ route('user.login') }}">Đăng nhập</a>
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
                        <li class="language"><a href="#"><img src="/assets/user/img/logo/language.png" alt="">English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="dropdown_language">
                                <li><a href="#"><img src="/assets/user/img/logo/language.png" alt=""> English</a></li>
                                <li><a href="#"><img src="/assets/user/img/logo/language2.png" alt=""> Germany</a>
                                </li>
                            </ul>
                        </li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--header top start-->
