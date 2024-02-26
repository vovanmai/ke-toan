<!DOCTYPE html>
<html lang="en" dir="">
<!-- Mirrored from htmlstream.com/preview/front-v4.3.1/demo-shop/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Mar 2023 07:50:57 GMT -->
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="googlebot" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="jF7ooTqh583AJEnuZ1M2DDrSrCarnf2NhiXe0-jkE94">
    {!! \SEO::generate() !!}
    <!-- Title -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ customAsset('assets/user/user4/img/favicon.ico') }}">
    <!-- Font -->
    <link href="{{ customAsset('assets/user/user4/font/css24ff7.css?family=Inter:wght@400;600&amp;display=swap') }}" rel="stylesheet">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ customAsset('assets/user/user4/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ customAsset('assets/user/user4/vendor/bootstrap-icons/font/bootstrap-icons.css') }}">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{ customAsset('assets/user/user4/css/theme.minc619.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ customAsset('assets/user/user4/css/my-css.css') }}">
</head>
<body>
<!-- ========== HEADER ========== -->
<header id="header" class="navbar navbar-expand-lg navbar-end navbar-light">
    <!-- Topbar -->
    <div id="top-header" class="container">
        <div class="row w-100">
            <div class="col-sm-6">
                <p>
                    Hi!
                    <span class="js-text-animation fw-semibold"
                          style="color: green"
                          data-hs-typed-options='{
                        "strings": ["Chào mừng đến với Rừng Dừa Bảy Mẫu!", "Chào mừng đến với Rừng Dừa Bảy Mẫu - Giá rẻ dành cho bạn hôm nay!", "Chúc bạn một ngày tốt lành!"],
                        "typeSpeed": 60,
                        "loop": true,
                        "backSpeed": 25,
                        "backDelay": 1500
                        }'>
                    </span>
                </p>
            </div>
            <div class="col-sm-6" id="header-day">
                <div class="text-right">
                    @php
                        $now = now();
                        $weekMap = [
                        0 => 'Chủ nhật',
                        1 => 'Thứ hai',
                        2 => 'Thứ ba',
                        3 => 'Thứ tư',
                        4 => 'Thứ năm',
                        5 => 'Thứ sáu',
                        6 => 'Thứ bảy',
                        ];
                        $thu = $weekMap[$now->dayOfWeek];
                        $day = $now->format('d/m/Y')
                    @endphp
                    <span style="color: green; font-size: 14px">{{ "{$thu} $day" }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="/" aria-label="Front">
                <img class="navbar-brand-logo" src="{{ customAsset('assets/user/user4/img/logo.png') }}" alt="Logo">
            </a>
            <!-- End Default Logo -->
            <!-- Secondary Content -->
            <div class="navbar-nav-wrap-secondary-content">
                <!-- Search -->
                <div class="dropdown dropdown-course-search d-lg-none d-inline-block">
                    <a class="btn btn-ghost-secondary btn-sm btn-icon" href="#" id="navbarCourseSearchDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-search"></i>
                    </a>
                    <div class="dropdown-menu dropdown-card" aria-labelledby="navbarCourseSearchDropdown">
                        <!-- Card -->
                        <div class="card card-sm">
                            <div class="card-body">
                                <form class="input-group input-group-merge">
                                    <input type="search" class="form-control" placeholder="Tìm kiếm...">
                                    <div class="input-group-append input-group-text">
                                        <i class="bi-search"></i>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Search -->
            </div>
            <!-- End Secondary Content -->
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-default">
               <i class="bi-list"></i>
               </span>
                <span class="navbar-toggler-toggled">
               <i class="bi-x"></i>
               </span>
            </button>
            <!-- End Toggler -->
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <!-- Search Form -->
                    <li class="nav-item flex-grow-1 d-none d-lg-inline-block p-relative">
                        <form class="input-group input-group-merge">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>
                            <input type="search" name="search_key" onInput="onKeyPressSearchInput()" class="form-control" placeholder="Tìm kiếm...">
                        </form>
                        <div id="search-result" class="hidden p-absolute w-100 mt-2"></div>
                    </li>
                    <!-- End Search Form -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('user.index') }}">Trang chủ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tin-tuc') ? 'active' : '' }}" href="{{ route('user.post') }}">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('gia-ve') ? 'active' : '' }}" href="{{ route('user.ticket') }}">Giá vé</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('lien-he') ? 'active' : '' }}" href="{{ route('user.contact') }}">Liên hệ</a>
                    </li>
                </ul>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
</header>
<!-- ========== END HEADER ========== -->
@push('script')
    <script>
        function onKeyPressSearchInput() {
            const searchKey = $('input[name="search_key"]').val().trim()
            if (searchKey.length === 1) {
                $("#search-result").html('<div>Chưa tìm thấy kết quả tìm kiếm...</div>')
                $("#search-result").removeClass("hidden").addClass("visible");
            } else if(searchKey.length > 1) {
                $("#search-result").html('<div>Đang tìm kiếm...</div>')
                $("#search-result").removeClass("hidden").addClass("visible");
                getSearchResults(searchKey)
                $("#search-result").html('<div>Chưa tìm thấy kết quả tìm kiếm...</div>')
            } else {
                $("#search-result").removeClass("visible").addClass("hidden");
            }
        }

        function getSearchResults (searchKey)
        {
            console.log('cal ajax to search...')
        }
    </script>
@endpush
