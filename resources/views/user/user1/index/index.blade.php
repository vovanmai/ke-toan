@extends('user.user1.layouts.master')

@section('content')
    @include('user.user1.layouts.slider')

    <!--brand area start-->
    <div class="brand_area brand_two">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <a href="#"><img src="/assets/user/user1/img/brand/brand1.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/assets/user/user1/img/brand/brand2.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/assets/user/user1/img/brand/brand3.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/assets/user/user1/img/brand/brand4.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/assets/user/user1/img/brand/brand5.jpg" alt=""></a>
                        </div>
                        <div class="single_brand">
                            <a href="#"><img src="/assets/user/user1/img/brand/brand2.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand area end-->

    <!--banner area start-->
    <div class="banner_area mb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="#"><img src="/assets/user/user1/img/bg/banner6.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="single_banner">
                        <div class="banner_thumb">
                            <a href="#"><img src="/assets/user/user1/img/bg/banner7.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--product area start-->
    <section class="product_area mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Hot Deals </h2>
                    </div>
                </div>
            </div>
            <div class="product_container">
                <div class="product_carousel product_column5 owl-carousel">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/assets/user/user1/img/product/product1.jpg" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/assets/user/user1/img/product/product2.jpg" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">-5%</span>
                            </div>

                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="icon-heart"></i></a></li>
                                    <li class="compare"><a href="compare.html" title="compare"><i
                                                class="icon-repeat"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                                                title="quick view"> <i class="icon-eye"></i></a></li>
                                </ul>
                            </div>
                            <div class="product_timing">
                                <div data-countdown="2020/12/15"></div>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <p class="manufacture_product"><a href="#">Studio Design</a></p>
                            <h4><a href="product-details.html">New Balance Fresh Foam LAZR v1 Sport</a></h4>
                            <div class="price_box">
                                <span class="old_price">$18.90</span>
                                <span class="current_price">$10.95</span>
                            </div>
                        </div>
                    </div>
                    <div class="single_product">
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/assets/user/user1/img/product/product3.jpg" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/assets/user/user1/img/product/product4.jpg" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">-8%</span>
                            </div>

                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="icon-heart"></i></a></li>
                                    <li class="compare"><a href="compare.html" title="compare"><i
                                                class="icon-repeat"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                                                title="quick view"> <i class="icon-eye"></i></a></li>
                                </ul>
                            </div>
                            <div class="product_timing">
                                <div data-countdown="2020/12/15"></div>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <p class="manufacture_product"><a href="#">Studio Design</a></p>
                            <h4><a href="product-details.html">Juicy Couture Juicy Quilted Terry...</a></h4>
                            <div class="price_box">
                                <span class="old_price">$20.90</span>
                                <span class="current_price">$18.95</span>
                            </div>
                        </div>
                    </div>
                    <div class="single_product">
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/assets/user/user1/img/product/product5.jpg" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/assets/user/user1/img/product/product6.jpg" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">-10%</span>
                            </div>

                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="icon-heart"></i></a></li>
                                    <li class="compare"><a href="compare.html" title="compare"><i
                                                class="icon-repeat"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                                                title="quick view"> <i class="icon-eye"></i></a></li>
                                </ul>
                            </div>
                            <div class="product_timing">
                                <div data-countdown="2020/12/15"></div>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <p class="manufacture_product"><a href="#">Studio Design</a></p>
                            <h4><a href="product-details.html">Trans-Weight Hooded Wind and Water...</a></h4>
                            <div class="price_box">
                                <span class="old_price">$25.90</span>
                                <span class="current_price">$22.95</span>
                            </div>
                        </div>
                    </div>
                    <div class="single_product">
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/assets/user/user1/img/product/product7.jpg" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/assets/user/user1/img/product/product8.jpg" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">-6%</span>
                            </div>

                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="icon-heart"></i></a></li>
                                    <li class="compare"><a href="compare.html" title="compare"><i
                                                class="icon-repeat"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                                                title="quick view"> <i class="icon-eye"></i></a></li>
                                </ul>
                            </div>
                            <div class="product_timing">
                                <div data-countdown="2020/12/15"></div>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <p class="manufacture_product"><a href="#">Studio Design</a></p>
                            <h4><a href="product-details.html">New Balance Fresh Foam Kaymin</a></h4>
                            <div class="price_box">
                                <span class="old_price">$15.90</span>
                                <span class="current_price">$12.95</span>
                            </div>
                        </div>
                    </div>
                    <div class="single_product">
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/assets/user/user1/img/product/product9.jpg" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/assets/user/user1/img/product/product10.jpg" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">-12%</span>
                            </div>

                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="icon-heart"></i></a></li>
                                    <li class="compare"><a href="compare.html" title="compare"><i
                                                class="icon-repeat"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                                                title="quick view"> <i class="icon-eye"></i></a></li>
                                </ul>
                            </div>
                            <div class="product_timing">
                                <div data-countdown="2020/12/15"></div>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <p class="manufacture_product"><a href="#">Studio Design</a></p>
                            <h4><a href="product-details.html">Calvin Klein Jeans Reflective Logo</a></h4>
                            <div class="price_box">
                                <span class="old_price">$30.90</span>
                                <span class="current_price">$25.95</span>
                            </div>
                        </div>
                    </div>
                    <div class="single_product">
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="/assets/user/user1/img/product/product11.jpg" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="/assets/user/user1/img/product/product12.jpg" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">-4%</span>
                            </div>

                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="icon-heart"></i></a></li>
                                    <li class="compare"><a href="compare.html" title="compare"><i
                                                class="icon-repeat"></i></a></li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                                                title="quick view"> <i class="icon-eye"></i></a></li>
                                </ul>
                            </div>
                            <div class="product_timing">
                                <div data-countdown="2020/12/15"></div>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <p class="manufacture_product"><a href="#">Studio Design</a></p>
                            <h4><a href="product-details.html">Juicy Couture Tricot Logo Stripe Jacket</a></h4>
                            <div class="price_box">
                                <span class="old_price">$20.90</span>
                                <span class="current_price">$15.95</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--product area end-->

    <!--small product area start-->
    <section class="small_product_area Categories_p_style2 mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Popular Categories </h2>
                    </div>
                    <div class="product_carousel small_product small_product_column3 owl-carousel">
                        <div class="product_items">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/featured/featured6.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <h4>Tops & Sets </h4>
                                    <ul>
                                        <li><a href="#">Tank Tops</a></li>
                                        <li><a href="#">Suits & Sets</a></li>
                                        <li><a href="#">Jumpsuits</a></li>
                                        <li><a href="#">Rompers</a></li>
                                    </ul>
                                    <a href="#">Show all</a>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/featured/featured4.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <h4>Accessories </h4>
                                    <ul>
                                        <li><a href="#">Hats & Caps</a></li>
                                        <li><a href="#">Belts & Cummerbunds</a></li>
                                        <li><a href="#">Scarves & Wraps</a></li>
                                        <li><a href="#">Gloves & Mittens</a></li>
                                    </ul>
                                    <a href="#">Show all</a>
                                </div>
                            </div>
                        </div>
                        <div class="product_items">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/featured/featured3.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <h4>Camera & Photo</h4>
                                    <ul>
                                        <li><a href="#">Digital Cameras</a></li>
                                        <li><a href="#">Camcorders</a></li>
                                        <li><a href="#">Camera Drones</a></li>
                                        <li><a href="#">Action Cameras</a></li>
                                    </ul>
                                    <a href="#">Show all</a>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/featured/featured.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <h4>Smart Electronics</h4>
                                    <ul>
                                        <li><a href="#">Wearable Devices</a></li>
                                        <li><a href="#">Smart Remote...</a></li>
                                        <li><a href="#">Smart Watches</a></li>
                                        <li><a href="#">Smart Wristbands</a></li>
                                    </ul>
                                    <a href="#">Show all</a>
                                </div>
                            </div>
                        </div>
                        <div class="product_items">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/featured/featured5.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <h4>Audio & Video</h4>
                                    <ul>
                                        <li><a href="#">Televisions</a></li>
                                        <li><a href="#">TV Receivers</a></li>
                                        <li><a href="#">Projectors</a></li>
                                        <li><a href="#">TV Sticks</a></li>
                                    </ul>
                                    <a href="#">Show all</a>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/featured/featured7.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <h4>Video Games </h4>
                                    <ul>
                                        <li><a href="#">Handheld Game</a></li>
                                        <li><a href="#">TV Receivers</a></li>
                                        <li><a href="#">Projectors</a></li>
                                        <li><a href="#">TV Sticks</a></li>
                                    </ul>
                                    <a href="#">Show all</a>
                                </div>
                            </div>
                        </div>
                        <div class="product_items">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/featured/featured.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <h4>Smart Electronics</h4>
                                    <ul>
                                        <li><a href="#">Wearable Devices</a></li>
                                        <li><a href="#">Smart Remote...</a></li>
                                        <li><a href="#">Smart Watches</a></li>
                                        <li><a href="#">Smart Wristbands</a></li>
                                    </ul>
                                    <a href="#">Show all</a>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/featured/featured1.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <h4>Accessories </h4>
                                    <ul>
                                        <li><a href="#">Hats & Caps</a></li>
                                        <li><a href="#">Belts & Cummerbunds</a></li>
                                        <li><a href="#">Scarves & Wraps</a></li>
                                        <li><a href="#">Gloves & Mittens</a></li>
                                    </ul>
                                    <a href="#">Show all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--small product area end-->

    <!--banner area start-->
    <div class="banner_fullwidth mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_thumb">
                        <a href="#"><img src="/assets/user/user1/img/bg/banner8.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->

    <!--product area start-->
    <section class="product_area mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>New Arrivals</h2>
                        </div>
                        <div class="product_tab_button">
                            <ul class=" nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#automobiles" role="tab"
                                       aria-controls="automobiles" aria-selected="true">Automobiles</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#beauty" role="tab" aria-controls="beauty"
                                       aria-selected="false">Beauty & Health</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#consoles" role="tab" aria-controls="consoles"
                                       aria-selected="false"> Games & Consoles </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="automobiles" role="tabpanel">
                    <div class="product_carousel product_column5 owl-carousel">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product17.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product16.jpg" alt=""></a>
                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">New Balance Fresh Foam LAZR v1 Sport</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$18.90</span>
                                    <span class="current_price">$10.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product15.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product14.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-8%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">Juicy Couture Juicy Quilted Terry...</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$20.90</span>
                                    <span class="current_price">$18.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product13.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product12.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-10%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">Trans-Weight Hooded Wind and Water...</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$25.90</span>
                                    <span class="current_price">$22.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product11.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product10.jpg" alt=""></a>
                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">New Balance Fresh Foam Kaymin</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$15.90</span>
                                    <span class="current_price">$12.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product9.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product8.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-12%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">Calvin Klein Jeans Reflective Logo</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$30.90</span>
                                    <span class="current_price">$25.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product7.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product6.jpg" alt=""></a>
                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">Juicy Couture Tricot Logo Stripe Jacket</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$20.90</span>
                                    <span class="current_price">$15.95</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="beauty" role="tabpanel">
                    <div class="product_carousel product_column5 owl-carousel">

                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product7.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product8.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-6%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">New Balance Fresh Foam Kaymin</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$15.90</span>
                                    <span class="current_price">$12.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product9.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product10.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-12%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>

                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">Calvin Klein Jeans Reflective Logo</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$30.90</span>
                                    <span class="current_price">$25.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product11.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product12.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-4%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">Juicy Couture Tricot Logo Stripe Jacket</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$20.90</span>
                                    <span class="current_price">$15.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product1.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-5%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">New Balance Fresh Foam LAZR v1 Sport</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$18.90</span>
                                    <span class="current_price">$10.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product3.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product4.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-8%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">Juicy Couture Juicy Quilted Terry...</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$20.90</span>
                                    <span class="current_price">$18.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product5.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product6.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-10%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">Trans-Weight Hooded Wind and Water...</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$25.90</span>
                                    <span class="current_price">$22.95</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="consoles" role="tabpanel">
                    <div class="product_carousel product_column5 owl-carousel">
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product5.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product6.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-10%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">Trans-Weight Hooded Wind and Water...</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$25.90</span>
                                    <span class="current_price">$22.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product7.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product8.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-6%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">New Balance Fresh Foam Kaymin</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$15.90</span>
                                    <span class="current_price">$12.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product1.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product2.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-5%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">New Balance Fresh Foam LAZR v1 Sport</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$18.90</span>
                                    <span class="current_price">$10.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product3.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product4.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-8%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">Juicy Couture Juicy Quilted Terry...</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$20.90</span>
                                    <span class="current_price">$18.95</span>
                                </div>
                            </div>
                        </div>

                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product9.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product10.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-12%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>

                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">Calvin Klein Jeans Reflective Logo</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$30.90</span>
                                    <span class="current_price">$25.95</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_product">
                            <div class="product_thumb">
                                <a class="primary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product11.jpg" alt=""></a>
                                <a class="secondary_img" href="product-details.html"><img
                                        src="/assets/user/user1/img/product/product12.jpg" alt=""></a>
                                <div class="label_product">
                                    <span class="label_sale">-4%</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                    class="icon-heart"></i></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><i
                                                    class="icon-repeat"></i></a></li>
                                        <li class="quick_button"><a href="#" data-toggle="modal"
                                                                    data-target="#modal_box" title="quick view"> <i
                                                    class="icon-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="add to cart">Add to cart</a>
                                </div>
                            </div>
                            <div class="product_content">
                                <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                <h4><a href="product-details.html">Juicy Couture Tricot Logo Stripe Jacket</a></h4>
                                <div class="price_box">
                                    <span class="old_price">$20.90</span>
                                    <span class="current_price">$15.95</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--product area end-->

    <!--small product area start-->
    <section class="small_product_area mb-60">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Featured products </h2>
                    </div>
                    <div class="product_carousel small_product small_product_column3 owl-carousel">
                        <div class="product_items">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/product/product2.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                    <h4><a href="product-details.html">Brixton Patrol All Terrain Anorak Jacket</a></h4>
                                    <div class="price_box">
                                        <span class="old_price">$18.90</span>
                                        <span class="current_price">$10.95</span>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/product/product1.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                    <h4><a href="product-details.html">Madden by Steve Madden Cale 6</a></h4>
                                    <div class="price_box">
                                        <span class="old_price">$22.90</span>
                                        <span class="current_price">$15.95</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product_items">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/product/product3.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                    <h4><a href="product-details.html">New Balance Arishi Sport v1</a></h4>
                                    <div class="price_box">
                                        <span class="old_price">$22.90</span>
                                        <span class="current_price">$15.95</span>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/product/product4.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                    <h4><a href="product-details.html">Brixton Patrol All Anorak Jacket</a></h4>
                                    <div class="price_box">
                                        <span class="old_price">$25.90</span>
                                        <span class="current_price">$18.95</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product_items">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/product/product5.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                    <h4><a href="product-details.html">Brixton Patrol All Terrain Anorak Jacket</a></h4>
                                    <div class="price_box">
                                        <span class="old_price">$18.90</span>
                                        <span class="current_price">$10.95</span>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/product/product6.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                    <h4><a href="product-details.html">Fila Locker Room Varsity Jacket</a></h4>
                                    <div class="price_box">
                                        <span class="old_price">$22.90</span>
                                        <span class="current_price">$15.95</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product_items">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/product/product7.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                    <h4><a href="product-details.html">Trans-Weight Hooded Wind and</a></h4>
                                    <div class="price_box">
                                        <span class="old_price">$18.90</span>
                                        <span class="current_price">$10.95</span>
                                    </div>
                                </div>
                            </div>
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="/assets/user/user1/img/product/product8.jpg" alt=""></a>
                                </div>
                                <div class="product_content">
                                    <p class="manufacture_product"><a href="#">Studio Design</a></p>
                                    <h4><a href="product-details.html">Madden by Steve Madden Cale 6</a></h4>
                                    <div class="price_box">
                                        <span class="old_price">$22.90</span>
                                        <span class="current_price">$15.95</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--small product area end-->

    <!--blog area start-->
    <section class="blog_section blog_s_two">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>From Our Blog </h2>
                    </div>
                    <div class="blog_carousel blog_column2 owl-carousel">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="/assets/user/user1/img/blog/blog1.jpg" alt=""></a>
                            </div>
                            <div class="blog_content">
                                <p><a href="#">Fashion</a></p>
                                <h3><a href="blog-details.html">This is Secound Post For XipBlog</a></h3>
                                <div class="blogpost_demo">
                                    <p>Posted by <a href="#">eCommerce</a></p>
                                </div>
                                <div class="date_post">
                                    <span>01 Jan 2020</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="/assets/user/user1/img/blog/blog2.jpg" alt=""></a>
                            </div>
                            <div class="blog_content">
                                <p><a href="#">Fashion</a></p>
                                <h3><a href="blog-details.html">This is Secound Post For XipBlog</a></h3>
                                <div class="blogpost_demo">
                                    <p>Posted by <a href="#">eCommerce</a></p>
                                </div>
                                <div class="date_post">
                                    <span>01 Jan 2020</span>
                                </div>
                            </div>
                        </div>
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="/assets/user/user1/img/blog/blog3.jpg" alt=""></a>
                            </div>
                            <div class="blog_content">
                                <p><a href="#">Fashion</a></p>
                                <h3><a href="blog-details.html">This is Secound Post For XipBlog</a></h3>
                                <div class="blogpost_demo">
                                    <p>Posted by <a href="#">eCommerce</a></p>
                                </div>
                                <div class="date_post">
                                    <span>01 Jan 2020</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--blog area end-->

    <!--shipping area start-->
    <div class="shipping_area">
        <div class="container">
            <div class="shipping_inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single_shipping col1">
                            <div class="shipping_icone">
                                <i class="icon-truck"></i>
                            </div>
                            <div class="shipping_content">
                                <h3>Free shipping on order</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single_shipping col2">
                            <div class="shipping_icone">
                                <i class="icon-phone-call"></i>
                            </div>
                            <div class="shipping_content">
                                <h3>Contact us 24 hrs a day</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single_shipping col3">
                            <div class="shipping_icone">
                                <i class="icon-send"></i>
                            </div>
                            <div class="shipping_content">
                                <h3>You’ve 30 days to Return</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single_shipping col4">
                            <div class="shipping_icone">
                                <i class="icon-credit-card"></i>
                            </div>
                            <div class="shipping_content">
                                <h3>100% secure payment</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--shipping area end-->
@endsection

