<ul id="menu">
    <li>
        <a href="/" class="{{ request()->is('/') ? 'active' : null }}">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>Trang chủ</span>
        </a>
    </li>

    @php
        $categories = resolve(\App\Services\User\Category\GetAllService::class)->handle();
    @endphp

    @foreach($categories as $firstCat)
        @php
            $hasSubMenu = $firstCat->childrenRecursive->isNotEmpty()
        @endphp
    <li>
        <a class="{{ request()->is('danh-muc/' . $firstCat->slug) ? 'active' : ''}}" href="{{ route('user.post.index', ['slug' => $firstCat->slug]) }}">
            <span>{{ $firstCat->title }}</span>
            @if($hasSubMenu)
                <span class="arrow arrow-down"></span>
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
                                <a class="{{ request()->is('danh-muc/' . $thirdCat->slug) ? 'active' : ''}}" href="{{ route('user.post.index', ['slug' => $thirdCat->slug]) }}">
                                    <span>{{ $thirdCat->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                    <a class="{{ request()->is('danh-muc/' . $secondCat->slug) ? 'active' : ''}}" href="{{ route('user.post.index', ['slug' => $secondCat->slug]) }}">
                        <span>{{ $secondCat->title }}</span>
                        @if($hasSubMenu)
                        <span class="arrow arrow-right"></span>
                        @endif
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
            <a class="{{ request()->is($page->slug) ? 'active' : ''}}" href="{{ route('user.page.detail', ['slug' => $page->slug]) }}">
                <span>{{ $page->title }}</span>
            </a>
        </li>
    @endforeach
</ul>
