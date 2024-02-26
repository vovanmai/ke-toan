<!--header bottom satrt-->
<div class="header_bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="categories_menu">
                    <div class="categories_title">
                        <h2 class="categori_toggle">Danh mục</h2>
                    </div>
                    <div class="categories_menu_toggle">
                        @php
                            $categories = resolve(\App\Services\User\User1\Category\GetAllService::class)->handle();
                        @endphp
                        <ul>
                            @foreach($categories as $category)
                            <li class="menu_item_children">
                                <a href="#">{{ $category->title }}
                                    @if(count($category->children))
                                    <i  class="fa fa-angle-right"></i>
                                    @endif
                                </a>

                                @if(count($category->children))
                                    <ul class="categories_mega_menu">
                                        @foreach($category->children as $category)
                                            <li class="menu_item_children"><a href="#">{{ $category->title }}</a>
                                                <ul class="categorie_sub_menu">
                                                    @foreach($category->children as $category)
                                                        <li><a href="#">{{ $category->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                            </li>
                            @endforeach
                            {{--<li id="cat_toggle" class="has-sub"><a href="#"> More Categories</a>
                                <ul class="categorie_sub">
                                    <li><a href="#">Hide Categories</a></li>
                                </ul>
                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="search-container">
                    <form action="#">
                        <div class="search_box">
                            <input placeholder="Tìm kiếm..." type="text">
                            <button type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="header_cart_wishlist">
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
                                    <a href="#"><img src="/assets/user/user1/img/s-product/product.jpg" alt=""></a>
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
                                    <a href="#"><img src="/assets/user/user1/img/s-product/product2.jpg" alt=""></a>
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
                </div>
            </div>
        </div>
    </div>
</div>
<!--header bottom end-->
