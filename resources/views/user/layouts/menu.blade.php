<div>
    <div class="menu-toggle">
        <div style="display: flex; align-items: center; justify-content: space-between">
            <h3 class="mt-0 mb-0">Danh mục</h3>
            <button type="button" id="menu-btn">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
    </div>
    <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
        <li class="{{ request()->is('/') ? 'active' : '' }}">
            <a href="/">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span class="title">Trang chủ</span>
            </a>
        </li>

{{--        <li>--}}
{{--            <a class="" href="javascript:;">--}}
{{--                <i class="fa fa-graduation-cap" aria-hidden="true"></i>--}}
{{--                <span class="title">Khóa học kế toán</span>--}}
{{--            </a>--}}
{{--            <ul>--}}
{{--                <li>--}}
{{--                    <a href="#">Lịch khai giảng--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">Học chứng chỉ kế toán--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="javascript:;">--}}
{{--                <span class="title">Dịch vụ kế toán</span>--}}
{{--            </a>--}}
{{--            <!-- Level Two-->--}}
{{--            <ul>--}}
{{--                <li>--}}
{{--                    <a href="javascript:;">--}}
{{--                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>--}}
{{--                        Sub Item One--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <i class="fa fa-database" aria-hidden="true"></i>--}}
{{--                        Sub Item Two--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:;">--}}
{{--                        <i class="fa fa-amazon" aria-hidden="true"></i>--}}
{{--                        Sub Item Three--}}
{{--                    </a>--}}
{{--                    <!-- Level Three-->--}}
{{--                    <ul>--}}
{{--                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>Sub Item Link 1</a></li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript:;">--}}
{{--                                <i class="fa fa-diamond" aria-hidden="true"></i>Sub Item Link 2</a>--}}
{{--                            <!-- Level Four-->--}}
{{--                            <ul>--}}
{{--                                <li><a href="#"><i class="fa fa-trash" aria-hidden="true"></i>Sub Item Link 1</a></li>--}}
{{--                                <li><a href="#"><i class="fa fa-dashcube" aria-hidden="true"></i>Sub Item Link 2</a></li>--}}
{{--                                <li><a href="#"><i class="fa fa-dropbox" aria-hidden="true"></i>Sub Item Link 3</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>Sub Item Link 3</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <i class="fa fa-database" aria-hidden="true"></i>--}}
{{--                        Sub Item Four--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}

{{--        <li>--}}
{{--            <a href="javascript:;">--}}
{{--                <span class="title">Đăng ký học</span>--}}
{{--            </a>--}}
{{--        </li>--}}
        @php
            $categories = resolve(\App\Services\User\Category\GetAllService::class)->handle();
        @endphp

        @foreach($categories as $category)
            <li class="{{ request()->is($category->slug) ? 'active' : ''}}">
                <a href="{{ route('user.page.detail', ['slug' => $category->slug]) }}">
                    <span class="title">{{ $category->title }}</span>
                </a>
            </li>
        @endforeach

        @php
            $pages = resolve(\App\Services\User\Page\GetAllService::class)->handle();
        @endphp
        @foreach($pages as $page)
            <li class="{{ request()->is($page->slug) ? 'active' : ''}}">
                <a href="{{ route('user.page.detail', ['slug' => $page->slug]) }}">
                    <span class="title">{{ $page->title }}</span>
                </a>
            </li>
        @endforeach
    </ul>
    <div style="clear: both"></div>
</div>
