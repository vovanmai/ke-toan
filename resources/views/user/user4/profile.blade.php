@extends('user.user4.layouts.master')

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main" class="bg-light">
        <!-- Breadcrumb -->
        <div class="navbar-dark bg-dark" style="background-image: url(/assets/user/user4/svg/wave-pattern-light.svg);">
            <div class="container content-space-1 content-space-b-lg-3">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="d-none d-lg-block">
                            <h1 class="h2 text-white">Thông tin cá nhân</h1>
                        </div>
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-light mb-0">
                                {{--
                                <li class="breadcrumb-item">Account</li>
                                --}} {{--
                            <li class="breadcrumb-item active" aria-current="page">Personal Info</li>
                            --}}
                            </ol>
                        </nav>
                        <!-- End Breadcrumb -->
                    </div>
                    <!-- End Col -->
                    <div class="col-auto">
                        <div class="d-none d-lg-block">
                            <a class="btn btn-soft-light btn-sm" href="#">Đăng xuất</a>
                        </div>
                        <!-- Responsive Toggle Button -->
                        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarNav" aria-controls="sidebarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-default">
                            <i class="bi-list"></i>
                        </span>
                            <span class="navbar-toggler-toggled">
                            <i class="bi-x"></i>
                        </span>
                        </button>
                        <!-- End Responsive Toggle Button -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Breadcrumb -->
        <!-- Content -->
        <div class="container content-space-1 content-space-t-lg-0 content-space-b-lg-2 mt-lg-n10">
            <div class="row">
                <div class="col-lg-3">
                    <!-- Navbar -->
                    <div class="navbar-expand-lg navbar-light">
                        <div id="sidebarNav" class="collapse navbar-collapse navbar-vertical">
                            <!-- Card -->
                            <div class="card flex-grow-1 mb-5">
                                <div class="card-body">
                                    <!-- Avatar -->
                                    <div class="d-none d-lg-block text-center mb-5">
                                        <div class="avatar avatar-xxl avatar-circle mb-3">
                                            <img class="avatar-img" src="/assets/user/user4/img/160x160/img9.jpg" alt="Image Description" />
                                            <img
                                                class="avatar-status avatar-lg-status"
                                                src="/assets/user/user4/svg/illustrations/top-vendor.svg"
                                                alt="Image Description"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                aria-label="Verified user"
                                                data-bs-original-title="Verified user"
                                            />
                                        </div>
                                        <h4 class="card-title mb-0">Natalie Curtis</h4>
                                        <p class="card-text small">natalie@example.com</p>
                                    </div>
                                    <!-- End Avatar -->
                                    <!-- Nav -->
                                    <span class="text-cap">Account</span>
                                    <!-- List -->
                                    <ul class="nav nav-sm nav-tabs nav-vertical mb-4">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="./account-overview.html"> <i class="bi-person-badge nav-icon"></i> Personal info </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./account-security.html"> <i class="bi-shield-shaded nav-icon"></i> Security </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./account-notifications.html">
                                                <i class="bi-bell nav-icon"></i> Notifications
                                                <span class="badge bg-soft-dark text-dark rounded-pill nav-link-badge">1</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./account-preferences.html"> <i class="bi-sliders nav-icon"></i> Preferences </a>
                                        </li>
                                    </ul>
                                    <!-- End List -->
                                    <span class="text-cap">Shopping</span>
                                    <!-- List -->
                                    <ul class="nav nav-sm nav-tabs nav-vertical mb-4">
                                        <li class="nav-item">
                                            <a class="nav-link" href="./account-orders.html"> <i class="bi-basket nav-icon"></i> Your orders </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./account-wishlist.html">
                                                <i class="bi-heart nav-icon"></i> Wishlist
                                                <span class="badge bg-soft-dark text-dark rounded-pill nav-link-badge">2</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- End List -->
                                    <span class="text-cap">Billing</span>
                                    <!-- List -->
                                    <ul class="nav nav-sm nav-tabs nav-vertical">
                                        <li class="nav-item">
                                            <a class="nav-link" href="./account-payments.html"> <i class="bi-credit-card nav-icon"></i> Payments </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./account-address.html"> <i class="bi-geo-alt nav-icon"></i> Address </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="./account-teams.html">
                                                <i class="bi-people nav-icon"></i> Teams
                                                <span class="badge bg-soft-dark text-dark rounded-pill nav-link-badge">+2 new users</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- End List -->
                                    <div class="d-lg-none">
                                        <div class="dropdown-divider"></div>
                                        <!-- List -->
                                        <ul class="nav nav-sm nav-tabs nav-vertical">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"> <i class="bi-box-arrow-right nav-icon"></i> Log out </a>
                                            </li>
                                        </ul>
                                        <!-- End List -->
                                    </div>
                                    <!-- End Nav -->
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                    </div>
                    <!-- End Navbar -->
                </div>
                <!-- End Col -->
                <div class="col-lg-9">
                    <div class="d-grid gap-3 gap-lg-5">
                        <!-- Card -->
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-header-title">Thông tin cơ bản</h4>
                            </div>
                            <!-- Body -->
                            <div class="card-body">
                                <form>
                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label form-label">Ảnh đại diện</label>
                                        <div class="col-sm-9">
                                            <!-- Media -->
                                            <div class="d-flex align-items-center">
                                                <!-- Avatar -->
                                                <label class="avatar avatar-xl avatar-circle" for="avatarUploader">
                                                    <img id="avatarImg" class="avatar-img" src="/assets/user/user4/img/160x160/img9.jpg" alt="Image Description" />
                                                </label>
                                                <div class="d-grid d-sm-flex gap-2 ms-4">
                                                    <div class="form-attachment-btn btn btn-primary btn-sm">
                                                        Tải ảnh lên
                                                        <input
                                                            type="file"
                                                            class="js-file-attach form-attachment-btn-label"
                                                            id="avatarUploader"
                                                            data-hs-file-attach-options='{
                                          "textTarget": "#avatarImg",
                                          "mode": "image",
                                          "targetAttr": "src",
                                          "resetTarget": ".js-file-attach-reset-img",
                                          "resetImg": "/assets/user/user4/img/160x160/img1.jpg",
                                          "allowTypes": [".png", ".jpeg", ".jpg"]
                                          }'
                                                        />
                                                    </div>
                                                    <!-- End Avatar -->
                                                    <button type="button" class="js-file-attach-reset-img btn btn-white btn-sm">Xóa</button>
                                                </div>
                                            </div>
                                            <!-- End Media -->
                                        </div>
                                    </div>
                                    <!-- End Form -->
                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Họ & tên <span class="form-label-secondary"> (Bắt buộc)</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="lastName" id="lastNameLabel" placeholder="Vd: Nguyễn" aria-label="Boone" value="" />
                                                <input type="text" class="form-control" name="firstName" id="firstNameLabel" placeholder="Vd: Hùng" aria-label="Clarice" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form -->
                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label for="emailLabel" class="col-sm-3 col-form-label form-label">Email<span class="form-label-secondary"> (*)</span></label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" name="email" id="emailLabel" placeholder="clarice@example.com" aria-label="clarice@example.com" value="natalie@example.com" />
                                        </div>
                                    </div>
                                    <!-- End Form -->
                                    <!-- Form -->
                                    <div
                                        class="js-add-field row mb-4"
                                        data-hs-add-field-options='{
                                       "template": "#addPhoneFieldTemplate",
                                       "container": "#addPhoneFieldContainer",
                                       "defaultCreated": 0}'
                                    >
                                        <label for="phoneLabel" class="col-sm-3 col-form-label form-label">Phone <span class="form-label-secondary">(Bắt buộc)</span></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input
                                                    type="text"
                                                    class="js-input-mask form-control"
                                                    name="phone"
                                                    id="phoneLabel"
                                                    placeholder="+x(xxx)xxx-xx-xx"
                                                    aria-label="+x(xxx)xxx-xx-xx"
                                                    value="+1(605)5618929"
                                                    data-hs-mask-options='{
                                                    "mask": "+{0}(000)000-00-00"
                                                    }'
                                                />
                                                <!-- Select -->
                                                <div class="tom-select-custom w-30">
                                                    <select class="js-select form-select" autocomplete="off" data-hs-tom-select-options='{"hideSearch": true}'>
                                                        <option value="1">Di động</option>
                                                        <option value="2" selected>Nơi làm việc</option>
                                                        <option value="3">Nhà</option>
                                                    </select>
                                                </div>
                                                <!-- End Select -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Form -->
                                    <!-- Form -->
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label form-label">Giới tính</label>
                                        <div class="col-sm-9">
                                            <div class="input-group input-group-md-down-break">
                                                <!-- Radio Check -->
                                                <label class="form-control" for="genderTypeRadio1">
                                                <span class="form-check">
                                                    <input type="radio" class="form-check-input" name="genderTypeRadio" id="genderTypeRadio1" />
                                                    <span class="form-check-label">Male</span>
                                                </span>
                                                </label>
                                                <!-- End Radio Check -->
                                                <!-- Radio Check -->
                                                <label class="form-control" for="genderTypeRadio2">
                                                <span class="form-check">
                                                    <input type="radio" class="form-check-input" name="genderTypeRadio" id="genderTypeRadio2" checked="" />
                                                    <span class="form-check-label">Female</span>
                                                </span>
                                                </label>
                                                <!-- End Radio Check -->
                                                <!-- Radio Check -->
                                                <label class="form-control" for="genderTypeRadio3">
                                                <span class="form-check">
                                                    <input type="radio" class="form-check-input" name="genderTypeRadio" id="genderTypeRadio3" />
                                                    <span class="form-check-label">Other</span>
                                                </span>
                                                </label>
                                                <!-- End Radio Check -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Body -->
                            <!-- Footer -->
                            <div class="card-footer pt-0">
                                <div class="d-flex justify-content-end gap-3">
                                    {{--<a class="btn btn-white" href="javascript:;">Cancel</a>--}}
                                    <a class="btn btn-primary" href="javascript:;">Cập nhật</a>
                                </div>
                            </div>
                            <!-- End Footer -->
                        </div>
                        <!-- End Card -->
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Content -->
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
