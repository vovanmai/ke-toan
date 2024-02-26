<!DOCTYPE html>
<html lang="en" dir="">
<!-- Mirrored from htmlstream.com/preview/front-v4.3.1/demo-shop/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 04 Mar 2023 07:50:57 GMT -->
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Shop | Front - Multipurpose Responsive Template</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="../favicon.ico">
    <!-- Font -->
    <link href="/assets/user/user3/font/css24ff7.css?family=Inter:wght@400;600&amp;display=swap" rel="stylesheet">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/user/user3/css/vendor.min.css">
    <link rel="stylesheet" href="/assets/user/user3/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="/assets/user/user3/css/theme.minc619.css?v=1.0">
    <link rel="stylesheet" href="/assets/user/user3/css/my-css.css">
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
                    <span class="js-text-animation text-primary fw-semibold"
                          data-hs-typed-options='{
                        "strings": ["Chào mừng đến với website!", "Uy tín và chất lượng!", "Chúc bạn một ngày tốt lành!"],
                        "typeSpeed": 60,
                        "loop": true,
                        "backSpeed": 25,
                        "backDelay": 1500
                      }'></span>
                </p>
            </div>
            <div class="col-sm-6">
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
                    <span style="color: #2c64cc; font-size: 14px">{{ "{$thu} $day" }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->

    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <!-- Default Logo -->
            <a class="navbar-brand" href="#" aria-label="Front">
                <img class="navbar-brand-logo" src="/assets/user/user3/svg/logos/logo.svg" alt="Logo">
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
                                    <input type="search" class="form-control" placeholder="tim kiem resp" aria-label="What do you want to learn?">
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

                <!-- Account -->
                <div class="dropdown">
                    <a href="#" id="navbarShoppingCartDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>
                        <img class="avatar avatar-xs avatar-circle" src="/assets/user/user3/img/160x160/img9.jpg" alt="Image Description">
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarShoppingCartDropdown" style="min-width: 16rem;">
                        <a class="d-flex align-items-center p-2" href="#">
                            <div class="flex-shrink-0">
                                <img class="avatar" src="/assets/user/user3/img/160x160/img9.jpg" alt="Image Description">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <span class="d-block fw-semibold">Lida Reidy <span class="badge bg-primary ms-1">Pro</span></span>
                                <span class="d-block text-muted small">lidareidy@gmail.com</span>
                            </div>
                        </a>

                        <div class="dropdown-divider my-3"></div>

                        <a class="dropdown-item" href="#">
              <span class="dropdown-item-icon">
                <i class="bi-chat-left-dots"></i>
              </span> Messages
                        </a>
                        <a class="dropdown-item" href="#">
              <span class="dropdown-item-icon">
                <i class="bi-wallet2"></i>
              </span> Purchase history
                        </a>
                        <a class="dropdown-item" href="#">
              <span class="dropdown-item-icon">
                <i class="bi-person"></i>
              </span> Account
                        </a>
                        <a class="dropdown-item" href="#">
              <span class="dropdown-item-icon">
                <i class="bi-credit-card"></i>
              </span> Payment methods
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#">
              <span class="dropdown-item-icon">
                <i class="bi-question-circle"></i>
              </span> Help
                        </a>
                        <a class="dropdown-item" href="#">
              <span class="dropdown-item-icon">
                <i class="bi-box-arrow-right"></i>
              </span> Log out
                        </a>
                    </div>
                </div>
                <!-- End Account -->
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
                    <!-- Category -->
                    <li class="hs-has-sub-menu nav-item">
                        <a id="main-category" class="hs-mega-menu-invoker nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi-journals me-2"></i> Danh mục</a>

                        <!-- Mega Menu -->
                        <div class="hs-sub-menu dropdown-menu" aria-labelledby="main-category" style="min-width: 16rem;">
                            <!-- Development -->
                            @php
                                $cats = resolve(\App\Services\User\User3\Category\GetAllService::class)->handle(\App\Models\Category::TYPE_DOCUMENT);
                            @endphp
                            @foreach($cats as $cat)
                                @if(!$cat->childrenRecursive->isEmpty())
                                    <div class="hs-has-sub-menu nav-item">
                                        <a id="category-{{ $cat->id }}" class="hs-mega-menu-invoker dropdown-item {{ !$cat->childrenRecursive->isEmpty() ? 'dropdown-toggle' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $cat->title }}
                                        </a>
                                        <div class="hs-sub-menu dropdown-menu" aria-labelledby="category-{{ $cat->id }}">
                                            @foreach($cat->childrenRecursive as $childCat)
                                                <a class="dropdown-item" href="#">{{ $childCat->title }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <a class="dropdown-item" href="#">{{ $cat->title }}</a>
                                @endif

                            @endforeach
                            <!-- End Development -->
                        </div>
                        <!-- End Mega Menu -->
                    </li>
                    <!-- End Courses -->

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

                    <!-- Dropdown -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Về chúng tôi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Liên hệ</a>
                    </li>
                    {{--<li class="hs-has-sub-menu nav-item">
                        <a id="listingsDropdown" class="hs-mega-menu-invoker nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                        <div class="hs-sub-menu dropdown-menu" aria-labelledby="listingsDropdown" style="min-width: 14rem;">
                            <a class="dropdown-item " href="#">Courses</a>
                            <a class="dropdown-item " href="#">Course Overview</a>
                            <a class="dropdown-item " href="#">Author Profile</a>
                        </div>
                    </li>--}}
                    <!-- End Dropdown -->
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
