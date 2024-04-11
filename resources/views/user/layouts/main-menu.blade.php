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
                $mainMenu = app('web_setting')->main_menu ?? [];
            @endphp

            @foreach($mainMenu as $item)
                @if($item['type'] === 'course')
                    <li>
                        <a title="Khóa học kế toán" class="{{ request()->is('khoa-hoc-ke-toan*') ? 'active' : ''}}" href="{{ route('user.course.list_all') }}">
                    <span class="title">
                        Khóa học kế toán
                    </span>
                            <span class="arrow"></span>
                        </a>
                        <ul>
                            @foreach($item['children_recursive'] as $item)
                                <li>
                                    <a title="{{ $item['title'] }}" class="{{ request()->is('khoa-hoc-ke-toan/' . $item['slug']) ? 'active' : ''}}" href="{{ route('user.course.index', ['category' => $item['slug']]) }}">
                                        {{ $item['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @elseif($item['type'] === 'post')
                    <li>
                        <a title="{{ $item['title'] }}" class="{{ request()->is($item['slug']) ? 'active' : ''}}" href="{{ route('user.post.index', ['slug' => $item['slug']]) }}">
                    <span class="title">
                        {{ $item['title'] }}
                    </span>
                            @if(!empty($item['children_recursive']))
                                <span class="arrow"></span>
                            @endif
                        </a>
                        @if(!empty($item['children_recursive']))
                            <ul>
                                @foreach($item['children_recursive'] as $item)
                                    <li>
                                        <a title="{{ $item['title'] }}" class="{{ request()->is($item['slug']) ? 'active' : ''}}" href="{{ route('user.post.index', ['slug' => $item['slug']]) }}">
                                            {{ $item['title'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @elseif($item['type'] === 'page')
                    <li>
                        <a title="{{ $item['title'] }}" class="{{ request()->is($item['slug'] . '.html') ? 'active' : ''}}" href="{{ route('user.page.detail', ['slug' => $item['slug']]) }}">
                    <span class="title">
                        {{ $item['title'] }}
                    </span>
                        </a>
                    </li>
                @endif
            @endforeach
            {{--@php
                $cats = app('main_menu');
                $courseCats = $cats['course_cats'] ?? [];
                $postCats = $cats['post_cats'] ?? [];
                $pageCats = $cats['page_cats'] ?? [];
            @endphp
            <li>
                <a title="Khóa học kế toán" class="{{ request()->is('khoa-hoc-ke-toan*') ? 'active' : ''}}" href="{{ route('user.course.list_all') }}">
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
            @endforeach--}}
        </ul>
        <div>
            <ul>
                <li>
                    <a id="search-button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div id="search-form">
                        <form action="{{ route('user.search') }}" method="GET">
                            <div class="input-group">
                                <input value="{{ $keyword ?? null }}" type="text" name="keyword" class="form-control" placeholder="Tìm kiếm..." aria-label="Keyword" aria-describedby="basic-addon1">
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
