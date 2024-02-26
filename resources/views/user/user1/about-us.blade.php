@extends('user.user1.layouts.master')

@section('content')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{ route('user.index') }}">Trang chủ</a></li>
                            <li>Về chúng tôi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--about section area -->
    <div class="about_section mt-32">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="about_thumb">
                        <img src="/assets/user/user1/img/about/about1.jpg" alt="">
                    </div>

                    <div class="about_content">
                        <h1>Welcome to Esther!</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia minima consequuntur nulla
                            voluptate sunt accusamus error dolores laboriosam facere, et saepe, velit incidunt
                            doloremque ab eius. Explicabo magnam iure et.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--about section end-->

    <!--chose us area start-->
    <div class="choseus_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="chose_title">
                        <h1>Why chose us?</h1>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_chose">
                        <div class="chose_icone">
                            <img src="/assets/user/user1/img/about/About_icon1.jpg" alt="">
                        </div>
                        <div class="chose_content">
                            <h3>Creative Design</h3>
                            <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare
                                velit amet enim</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_chose">
                        <div class="chose_icone">
                            <img src="/assets/user/user1/img/about/About_icon2.jpg" alt="">
                        </div>
                        <div class="chose_content">
                            <h3>100% Money Back Guarantee</h3>
                            <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare
                                velit amet enim</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_chose">
                        <div class="chose_icone">
                            <img src="/assets/user/user1/img/about/About_icon3.jpg" alt="">
                        </div>
                        <div class="chose_content">
                            <h3>Online Support 24/7</h3>
                            <p>Erat metus sodales eget dolor consectetuer, porta ut purus at et alias, nulla ornare
                                velit amet enim</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--chose us area end-->

    <!--services img area-->
    <div class="about_gallery_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_gallery_section">
                        <div class="gallery_thumb">
                            <img src="/assets/user/user1/img/service/services2.jpg" alt="">
                        </div>
                        <div class="about_gallery_content">
                            <h3>What do we do?</h3>
                            <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                litterarum formas humanitatis per seacula quarta decima et quinta decima.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_gallery_section">
                        <div class="gallery_thumb">
                            <img src="/assets/user/user1/img/service/services1.jpg" alt="">
                        </div>
                        <div class="about_gallery_content">
                            <h3>Our Mission</h3>
                            <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                litterarum formas humanitatis per seacula quarta decima et quinta decima.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_gallery_section">
                        <div class="gallery_thumb">
                            <img src="/assets/user/user1/img/service/services3.jpg" alt="">
                        </div>
                        <div class="about_gallery_content">
                            <h3>History Of Us</h3>
                            <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                litterarum formas humanitatis per seacula quarta decima et quinta decima.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--services img end-->

    <!--testimonials section start-->
    <div class="testimonial_are">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonial_titile">
                        <h1>What Our Custumers Say ?</h1>
                    </div>
                </div>
                <div class="testimonial_active owl-carousel">
                    <div class="col-12">
                        <div class="single_testimonial">
                            <p>These guys have been absolutely outstanding. Perfect Themes and the best of all that you
                                have many options to choose! Best Support team ever! Very fast responding! Thank you
                                very much! I highly recommend this theme and these people!</p>
                            <img src="/assets/user/user1/img/about/testimonial4.jpg" alt="">
                            <span class="name">Kathy Young</span>
                            <span class="job_title">CEO of SunPark</span>
                            <div class="product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single_testimonial">
                            <p>These guys have been absolutely outstanding. Perfect Themes and the best of all that you
                                have many options to choose! Best Support team ever! Very fast responding! Thank you
                                very much! I highly recommend this theme and these people!</p>
                            <img src="/assets/user/user1/img/about/testimonial5.jpg" alt="">
                            <span class="name">Kathy Young</span>
                            <span class="job_title">CEO of SunPark</span>
                            <div class="product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="single_testimonial">
                            <p>These guys have been absolutely outstanding. Perfect Themes and the best of all that you
                                have many options to choose! Best Support team ever! Very fast responding! Thank you
                                very much! I highly recommend this theme and these people!</p>
                            <img src="/assets/user/user1/img/about/testimonial6.png" alt="">
                            <span class="name">Kathy Young</span>
                            <span class="job_title">CEO of SunPark</span>
                            <div class="product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                </ul>
                            </div>x`
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--testimonials section end-->
@endsection
@push('script')
    <script>
        $(function() {

        });
    </script>
@endpush
