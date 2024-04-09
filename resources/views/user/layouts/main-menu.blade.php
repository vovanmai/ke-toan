


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
                $postCats = $cats['post_cats'] ?? [];
                $pageCats = $cats['page_cats'] ?? [];
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
            @foreach($postCats as $item)
                @php
                    $hasSubMenu = $item->childrenRecursive->isNotEmpty()
                @endphp
            <li>
                <a title="{{ $item->title }}" class="{{ request()->is($item->slug) ? 'active' : ''}}" href="{{ route('user.post.index', ['slug' => $item->slug]) }}">
                    <span class="title">
                        {{ $item->title }}
                    </span>
                    @if($hasSubMenu)
                    <span class="arrow"></span>
                    @endif
                </a>
                @if($hasSubMenu)
                <ul>
                    @foreach($item->childrenRecursive as $item)
                        <li>
                            <a title="{{ $item->title }}" class="{{ request()->is($item->slug) ? 'active' : ''}}" href="{{ route('user.post.index', ['slug' => $item->slug]) }}">
                                {{ $item->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach

            @foreach($pageCats as $item)
            <li>
                <a title="{{ $item->title }}" class="{{ request()->is($item->slug . '.html') ? 'active' : ''}}" href="{{ route('user.page.detail', ['slug' => $item->slug]) }}">
                    <span class="title">
                        {{ $item->title }}
                    </span>
                </a>
            </li>
            @endforeach
        </ul>
        <div class="three-dot-menu">
            <i class="fas fa-ellipsis-v"></i>
        </div>
    </div>
</div>
