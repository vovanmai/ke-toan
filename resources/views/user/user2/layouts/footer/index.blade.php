<!--footer area start-->
<footer class="footer_widgets highlight-border">
    @include('user.user2.layouts.footer.footer-top')
    @include('user.user2.layouts.footer.footer-bottom')
</footer>
<!--footer area end-->


<!-- modal area start-->
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="/assets/user/user2/img/product/product1.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="/assets/user/user2/img/product/product2.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="/assets/user/user2/img/product/product3.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="/assets/user/user2/img/product/product5.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal_tab_button">
                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab"
                                               aria-controls="tab1" aria-selected="false"><img
                                                    src="/assets/user/user2/img/product/product1.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
                                               aria-controls="tab2" aria-selected="false"><img
                                                    src="/assets/user/user2/img/product/product2.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link button_three" data-toggle="tab" href="#tab3"
                                               role="tab" aria-controls="tab3" aria-selected="false"><img
                                                    src="/assets/user/user2/img/product/product3.jpg" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"
                                               aria-controls="tab4" aria-selected="false"><img
                                                    src="/assets/user/user2/img/product/product5.jpg" alt=""></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>Handbag feugiat</h2>
                                </div>
                                <div class="modal_price mb-10">
                                    <span class="new_price">$64.99</span>
                                    <span class="old_price">$78.99</span>
                                </div>
                                <div class="modal_description mb-15">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                        laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
                                        in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel
                                        recusandae </p>
                                </div>
                                <div class="variants_selects">
                                    <div class="variants_size">
                                        <h2>size</h2>
                                        <select class="select_option">
                                            <option selected value="1">s</option>
                                            <option value="1">m</option>
                                            <option value="1">l</option>
                                            <option value="1">xl</option>
                                            <option value="1">xxl</option>
                                        </select>
                                    </div>
                                    <div class="variants_color">
                                        <h2>color</h2>
                                        <select class="select_option">
                                            <option selected value="1">purple</option>
                                            <option value="1">violet</option>
                                            <option value="1">black</option>
                                            <option value="1">pink</option>
                                            <option value="1">orange</option>
                                        </select>
                                    </div>
                                    <div class="modal_add_to_cart">
                                        <form action="#">
                                            <input min="1" max="100" step="2" value="1" type="number">
                                            <button type="submit">add to cart</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal_social">
                                    <h2>Share this product</h2>
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal area end-->

<!-- JS
============================================ -->
<!--jquery min js-->
<script src="/assets/user/user2/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="/assets/user/user2/js/popper.js"></script>
</script>
<!--bootstrap min js-->
<script src="/assets/user/user2/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="/assets/user/user2/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="/assets/user/user2/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="/assets/user/user2/js/jquery.magnific-popup.min.js"></script>
<!--jquery countdown min js-->
<script src="/assets/user/user2/js/jquery.countdown.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!--jquery ui min js-->
<script src="/assets/user/user2/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="/assets/user/user2/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="/assets/user/user2/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="/assets/user/user2/js/slinky.menu.js"></script>
<script src="{{ asset('assets/admin/dist/js/jquery.validate.min.js') }}"></script>
<!-- Plugins JS -->
<script src="/assets/user/user2/js/plugins.js"></script>

<!-- Main JS -->
<script src="/assets/user/user2/js/main.js"></script>

<script>

    // $(function() {
    //     $("#preloading").delay(50).fadeOut();
    // });

    if ("{{ session()->has('success_message') }}") {
        toastr.success("{{ session()->get('success_message') }}", 'Thành công')
    }

    if ("{{ session()->has('error_message') }}") {
        toastr.error("{{ session()->get('error_message') }}", 'Lỗi')
    }

    if ("{{ session()->has('info_message') }}") {
        toastr.info("{{ session()->get('info_message') }}", 'Thông báo')
    }
</script>

@php
    resolve(\App\Services\User\User2\IncreaseViewCountService::class)->handle();
@endphp

{!! getWebsiteSetting('fb_chat')->fb_chat ?? '' !!}

@stack('script')

</body>

<!-- Mirrored from demo.hasthemes.com/esther/esther/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Apr 2021 09:04:48 GMT -->
</html>
