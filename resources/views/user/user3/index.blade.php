@extends('user.user3.layouts.master')

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        @include('user.user3.layouts.slider')
        <div class="container content-space-t-1 content-space-t-md-2 content-space-b-2">
            <div class="row col-lg-divider">
                @include('user.user3.layouts.side-category')

                <div class="col-lg-10">
                    <div class="row row-cols-sm-2 row-cols-md-4">
                        <div class="col mb-4">
                            <!-- Card -->
                            <div class="card card-bordered shadow-none text-center h-100">
                                <div class="card-pinned">
                                    <img class="card-img-top" src="/assets/user/user3/img/300x180/img3.jpg" alt="Image Description">

                                    <div class="card-pinned-top-start">
                                        <span class="badge bg-success rounded-pill">New arrival</span>
                                    </div>

                                    <div class="card-pinned-top-end">
                                        <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Save for later" data-bs-original-title="Save for later">
                                            <i class="bi-heart"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="mb-1">
                                        <a class="link-sm link-secondary" href="#">Accessories</a>
                                    </div>
                                    <a class="text-body" href="../demo-shop/product-overview.html">Herschel backpack in dark blue</a>
                                    <p class="card-text text-dark">$56.99</p>
                                </div>

                                <div class="card-footer pt-0">
                                    <!-- Rating -->
                                    <a class="d-inline-flex align-items-center mb-3" href="#">
                                        <div class="d-flex gap-1 me-2">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                        </div>
                                        <span class="small">0</span>
                                    </a>
                                    <!-- End Rating -->

                                    <button type="button" class="btn btn-outline-primary btn-sm btn-transition">Add to cart</button>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-4">
                            <!-- Card -->
                            <div class="card card-bordered shadow-none text-center h-100">
                                <div class="card-pinned">
                                    <img class="card-img-top" src="/assets/user/user3/img/300x180/img1.jpg" alt="Image Description">

                                    <div class="card-pinned-top-end">
                                        <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Save for later" data-bs-original-title="Save for later">
                                            <i class="bi-heart"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="mb-1">
                                        <a class="link-sm link-secondary" href="#">Clothing</a>
                                    </div>
                                    <a class="text-body" href="../demo-shop/product-overview.html">Front hoodie</a>
                                    <p class="card-text text-dark">$91.88</p>
                                </div>

                                <div class="card-footer pt-0">
                                    <!-- Rating -->
                                    <a class="d-inline-flex align-items-center mb-3" href="#">
                                        <div class="d-flex gap-1 me-2">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                        </div>
                                        <span class="small">40</span>
                                    </a>
                                    <!-- End Rating -->

                                    <button type="button" class="btn btn-outline-primary btn-sm btn-transition">Add to cart</button>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-4">
                            <!-- Card -->
                            <div class="card card-bordered shadow-none text-center h-100">
                                <div class="card-pinned">
                                    <img class="card-img-top" src="/assets/user/user3/img/300x180/img4.jpg" alt="Image Description">

                                    <div class="card-pinned-top-start">
                                        <span class="badge bg-danger rounded-pill">Out of stock</span>
                                    </div>

                                    <div class="card-pinned-top-end">
                                        <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Save for later" data-bs-original-title="Save for later">
                                            <i class="bi-heart"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="mb-1">
                                        <a class="link-sm link-secondary" href="#">Accessories</a>
                                    </div>
                                    <a class="text-body" href="../demo-shop/product-overview.html">Herschel backpack in gray</a>
                                    <p class="card-text text-dark">$29.99 <span class="text-body ms-1"><del>$33.99</del></span></p>
                                </div>

                                <div class="card-footer pt-0">
                                    <!-- Rating -->
                                    <a class="d-inline-flex align-items-center mb-3" href="#">
                                        <div class="d-flex gap-1 me-2">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                        </div>
                                        <span class="small">125</span>
                                    </a>
                                    <!-- End Rating -->

                                    <button type="button" class="btn btn-outline-primary btn-sm btn-transition">Add to cart</button>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Col --><div class="col mb-4">
                            <!-- Card -->
                            <div class="card card-bordered shadow-none text-center h-100">
                                <div class="card-pinned">
                                    <img class="card-img-top" src="/assets/user/user3/img/300x180/img3.jpg" alt="Image Description">

                                    <div class="card-pinned-top-start">
                                        <span class="badge bg-success rounded-pill">New arrival</span>
                                    </div>

                                    <div class="card-pinned-top-end">
                                        <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Save for later" data-bs-original-title="Save for later">
                                            <i class="bi-heart"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="mb-1">
                                        <a class="link-sm link-secondary" href="#">Accessories</a>
                                    </div>
                                    <a class="text-body" href="../demo-shop/product-overview.html">Herschel backpack in dark blue</a>
                                    <p class="card-text text-dark">$56.99</p>
                                </div>

                                <div class="card-footer pt-0">
                                    <!-- Rating -->
                                    <a class="d-inline-flex align-items-center mb-3" href="#">
                                        <div class="d-flex gap-1 me-2">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                        </div>
                                        <span class="small">0</span>
                                    </a>
                                    <!-- End Rating -->

                                    <button type="button" class="btn btn-outline-primary btn-sm btn-transition">Add to cart</button>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-4">
                            <!-- Card -->
                            <div class="card card-bordered shadow-none text-center h-100">
                                <div class="card-pinned">
                                    <img class="card-img-top" src="/assets/user/user3/img/300x180/img1.jpg" alt="Image Description">

                                    <div class="card-pinned-top-end">
                                        <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Save for later" data-bs-original-title="Save for later">
                                            <i class="bi-heart"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="mb-1">
                                        <a class="link-sm link-secondary" href="#">Clothing</a>
                                    </div>
                                    <a class="text-body" href="../demo-shop/product-overview.html">Front hoodie</a>
                                    <p class="card-text text-dark">$91.88</p>
                                </div>

                                <div class="card-footer pt-0">
                                    <!-- Rating -->
                                    <a class="d-inline-flex align-items-center mb-3" href="#">
                                        <div class="d-flex gap-1 me-2">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                        </div>
                                        <span class="small">40</span>
                                    </a>
                                    <!-- End Rating -->

                                    <button type="button" class="btn btn-outline-primary btn-sm btn-transition">Add to cart</button>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Col -->

                        <div class="col mb-4">
                            <!-- Card -->
                            <div class="card card-bordered shadow-none text-center h-100">
                                <div class="card-pinned">
                                    <img class="card-img-top" src="/assets/user/user3/img/300x180/img4.jpg" alt="Image Description">

                                    <div class="card-pinned-top-start">
                                        <span class="badge bg-danger rounded-pill">Out of stock</span>
                                    </div>

                                    <div class="card-pinned-top-end">
                                        <button type="button" class="btn btn-outline-secondary btn-xs btn-icon rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Save for later" data-bs-original-title="Save for later">
                                            <i class="bi-heart"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="mb-1">
                                        <a class="link-sm link-secondary" href="#">Accessories</a>
                                    </div>
                                    <a class="text-body" href="../demo-shop/product-overview.html">Herschel backpack in gray</a>
                                    <p class="card-text text-dark">$29.99 <span class="text-body ms-1"><del>$33.99</del></span></p>
                                </div>

                                <div class="card-footer pt-0">
                                    <!-- Rating -->
                                    <a class="d-inline-flex align-items-center mb-3" href="#">
                                        <div class="d-flex gap-1 me-2">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                            <img src="/assets/user/user3/svg/illustrations/star-muted.svg" alt="Review rating" width="16">
                                        </div>
                                        <span class="small">125</span>
                                    </a>
                                    <!-- End Rating -->

                                    <button type="button" class="btn btn-outline-primary btn-sm btn-transition">Add to cart</button>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection


