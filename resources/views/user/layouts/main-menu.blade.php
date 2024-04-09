<div id="menu-wrap">
    <ul id="menu">
        <li>
            <a href="/" class="{{ request()->is('/') ? 'active' : null }}">
                <i class="fas fa-home"></i>
                <span>Trang chủ</span>
            </a>
        </li>

        @php
            $courseCategories = resolve(\App\Services\User\Category\GetAllService::class)->handle(\App\Models\Category::TYPE_COURSE);
        @endphp

        <li>
            <a class="{{ request()->is('khoa-hoc-ke-toan') ? 'active' : ''}}" href="{{ route('user.course.list_all') }}">
                <span>Khóa học kế toán</span>
                <i class="fas fa-chevron-down"></i>
            </a>
            <ul class="dropdown_menu">
                @foreach($courseCategories as $courseCat)
                    <li>
                        <a class="{{ request()->is('khoa-hoc/' . $courseCat->slug) ? 'active' : ''}}" href="{{ route('user.course.index', ['category' => $courseCat->slug]) }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <span>{{ $courseCat->title }}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>

        @php
            $categories = resolve(\App\Services\User\Category\GetAllService::class)->handle();
        @endphp

        @foreach($categories as $firstCat)
            @php
                $hasSubMenu = $firstCat->childrenRecursive->isNotEmpty()
            @endphp
            <li>
                <a class="{{ request()->is($firstCat->slug) ? 'active' : ''}}" href="{{ route('user.post.index', ['slug' => $firstCat->slug]) }}">
                    <span>{{ $firstCat->title }}</span>
                    @if($hasSubMenu)
                        <i class="fas fa-chevron-down"></i>
                    @endif
                </a>
                @if($hasSubMenu)
                    <ul class="dropdown_menu">
                        @foreach($firstCat->childrenRecursive as $secondCat)
                            <li>
                                @php
                                    $hasSubMenu = $secondCat->childrenRecursive->isNotEmpty()
                                @endphp
                                @if($hasSubMenu)
                                    <ul class="submenu">
                                        @foreach($secondCat->childrenRecursive as $thirdCat)
                                            <li>
                                                <a class="{{ request()->is($thirdCat->slug) ? 'active' : ''}}" href="{{ route('user.post.index', ['slug' => $thirdCat->slug]) }}">
                                                    <span>{{ $thirdCat->title }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                                <a class="{{ request()->is($secondCat->slug) ? 'active' : ''}}" href="{{ route('user.post.index', ['slug' => $secondCat->slug]) }}">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span>{{ $secondCat->title }}</span>
                                        @if($hasSubMenu)
                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                        @endif
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        @php
            $pages = resolve(\App\Services\User\Page\GetAllService::class)->handle();
        @endphp
        @foreach($pages as $page)
            <li>
                <a class="{{ request()->is($page->slug . '.html') ? 'active' : ''}}" href="{{ route('user.page.detail', ['slug' => $page->slug]) }}">
                    <span>{{ $page->title }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>



<div id="lv-navbar">
    <div class="menu">
        <ul>
            <li>
                <a href="/" class="{{ request()->is('/') ? 'active' : null }}">
                    <span class="title">
                        <i class="fas fa-home"></i>
                        Trang chủ
                    </span>
                </a>
            </li>
            @php
                $cats = app('main_menu');
                $courseCats = $cats['course_cats'] ?? [];
            @endphp
            <li>
                <a title="Khóa học kế toán" class="{{ request()->is('khoa-hoc-ke-toan/*') ? 'active' : ''}}" href="{{ route('user.course.list_all') }}">
                    <span class="title">
                        Khóa học kế toán
                    </span>
                    <span class="arrow"></span>
                </a>
                <ul>
                    @foreach($courseCats as $item)
                    <li>
                        <a title="{{ $item->title }}" class="{{ request()->is('khoa-hoc-ke-toan/' . $item->slug) ? 'active' : ''}}" href="{{ route('user.course.index', ['category' => $item->slug]) }}">
                            {{ $item->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <div class="three-dot-menu">
            <i class="fas fa-ellipsis-v"></i>
        </div>
    </div>
</div>
