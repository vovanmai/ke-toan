
<div id="mobile-main-menu">
    <div class="d-flex justify-content-between align-items-center" style="padding: 15px 15px">
        <h2>Danh mục</h2>
        <a href="" style="font-size: 30px; color: black">
            <i class="fa fa-times" aria-hidden="true"></i>
        </a>
    </div>
    <ul>
        <li>
            <div class="d-flex justify-content-between align-items-center">
                <a href="/" class="active">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Trang chủ</span>
                </a>
            </div>
        </li>

        @php
            $categories = resolve(\App\Services\User\Category\GetAllService::class)->handle();
        @endphp

        @foreach($categories as $firstCat)
            @php
                $hasSubMenu = $firstCat->childrenRecursive->isNotEmpty()
            @endphp
            <li>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="/">
                        <span>{{ $firstCat->title }}</span>
                    </a>
                    @if($hasSubMenu)
                    <div class="button-arrow">
                        <i style="padding-left: 20px" class="fa fa-chevron-down" aria-hidden="true"></i>
                    </div>
                    @endif
                </div>
                @if($hasSubMenu)
                    <ul class="sub-menu">
                        @foreach($firstCat->childrenRecursive as $secondCat)
                        <li>
                            <a href="">
                                <span>{{ $secondCat->title }}</span>
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
                <div class="d-flex justify-content-between align-items-center">
                    <a class="{{ request()->is($page->slug) ? 'active' : ''}}" href="{{ route('user.page.detail', ['slug' => $page->slug]) }}">
                        <span>{{ $page->title }}</span>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
</div>
