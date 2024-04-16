<div class="offcanvas offcanvas-start" tabindex="-1" id="lv-mobile-main-menu">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title">Danh mục</h2>
        <a data-bs-dismiss="offcanvas">
            <i class="fa fa-times"></i>
        </a>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('user.search') }}">
            <div class="input-group">
                <input value="{{ $keyword ?? null }}" style="border-radius: 0" value="" type="text" name="keyword" class="form-control" placeholder="Tìm kiếm..." aria-label="Keyword" aria-describedby="basic-addon1">
            </div>
        </form>
        <div class="mobile-menu">
            <ul>
                @php
                    $cats = app('web_setting')->main_menu ?? [];
                @endphp

                @foreach($cats as $item)
                    @if($item['type'] === 'course')
                    <li>
                        <div>
                            <a href="{{ route('user.course.list_all') }}" class="{{ request()->is('khoa-hoc-ke-toan*') ? 'active' : ''}}">
                                <span class="title">
                                    Khóa học kế toán
                                </span>
                            </a>
                            @if($item['active_children_recursive'])
                                <span class="arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                            @endif
                        </div>
                        @if($item['active_children_recursive'])
                            <ul class="mb-dropdown-menu">
                                @foreach($item['active_children_recursive'] as $item)
                                <li class="mb-dropdown-menu-item">
                                    <div>
                                        <a href="{{ route('user.course.index', ['category' => $item['slug']]) }}" class="{{ request()->is('khoa-hoc-ke-toan/' . $item['slug']) ? 'active' : ''}}">
                                            <span class="title">
                                                {{ $item['title'] }}
                                            </span>
                                        </a>
                                        @if($item['active_children_recursive'])
                                            <span class="arrow">
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        @endif
                                    </div>
                                    @if($item['active_children_recursive'])
                                    <ul class="cat-third">
                                        @foreach($item['active_children_recursive'] as $item)
                                        <li class="cat-third-item">
                                            <a href="{{ route('user.course.index', ['category' => $item['slug']]) }}" class="{{ request()->is('khoa-hoc-ke-toan/' . $item['slug']) ? 'active' : ''}}">
                                            <span class="title">
                                                {{ $item['title'] }}
                                            </span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    @elseif($item['type'] === 'post')
                        <li>
                            <div>
                                <a href="{{ route('user.post.index', ['slug' => $item['slug']]) }}" class="{{ request()->is($item['slug']) ? 'active' : ''}}">
                                <span class="title">
                                    {{ $item['title'] }}
                                </span>
                                </a>
                                @if($item['active_children_recursive'])
                                    <span class="arrow">
                                    <i class="fas fa-chevron-down"></i>
                                </span>
                                @endif
                            </div>
                            @if($item['active_children_recursive'])
                                <ul class="mb-dropdown-menu">
                                    @foreach($item['active_children_recursive'] as $item)
                                        <li class="mb-dropdown-menu-item">
                                            <div>
                                                <a href="{{ route('user.post.index', ['slug' => $item['slug']]) }}" class="{{ request()->is($item['slug']) ? 'active' : ''}}">
                                            <span class="title">
                                                {{ $item['title'] }}
                                            </span>
                                                </a>
                                                @if($item['active_children_recursive'])
                                                    <span class="arrow">
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                                @endif
                                            </div>
                                            @if($item['active_children_recursive'])
                                                <ul class="cat-third">
                                                    @foreach($item['active_children_recursive'] as $item)
                                                        <li class="cat-third-item">
                                                            <a href="{{ route('user.post.index', ['slug' => $item['slug']]) }}" class="{{ request()->is($item['slug']) ? 'active' : ''}}">
                                                                <span class="title">
                                                                    {{ $item['title'] }}
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @elseif($item['type'] === 'page')
                        <li>
                            <div>
                                <a class="{{ request()->is($item['slug'] . '.html') ? 'active' : ''}}" href="{{ route('user.page.detail', ['slug' => $item['slug']]) }}">
                                    <span class="title">
                                        {{ $item['title'] }}
                                    </span>
                                </a>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
