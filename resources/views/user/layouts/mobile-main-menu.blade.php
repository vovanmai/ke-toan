<div id="mobile-main-menu">
    <div class="d-flex justify-content-between align-items-center">
        <h2 style="font-weight: 600; margin-bottom: 0px">Danh mục</h2>
        <a class="hidden-menu" href="javascript:void(0)" style="font-size: 30px; color: white">
            <i class="fa fa-times" aria-hidden="true"></i>
        </a>
    </div>
    <ul>
        <li>
            <div class="d-flex justify-content-between align-items-center">
                <a href="/" class="{{ request()->is('/') ? 'active' : ''}}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Trang chủ</span>
                </a>
            </div>
        </li>

        @php
            $cats = app('web_setting')->main_menu ?? [];
        @endphp

        @foreach($cats as $item)
            @if($item['type'] === 'course')
                <li>
                    <div class="d-flex justify-content-between align-items-center">
                        <a title="Đào tạo kế toán" href="{{ route('user.course.list_all') }}" class="{{ request()->is('khoa-hoc-ke-toan*') ? 'active' : ''}}">
                            <span>{{ $item['title'] }}</span>
                        </a>
                        <div class="button-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <ul class="sub-menu">
                        @foreach($item['active_children_recursive'] as $item)
                            <li>
                                <a title="{{ $item['title'] }}" href="{{ route('user.course.index', ['category' => $item['slug']]) }}" class="{{ request()->is('khoa-hoc-ke-toan/' . $item['slug']) ? 'active' : ''}}">
                                    <span>{{ $item['title'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @elseif($item['type'] === 'post')
                <li>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('user.post.index', ['slug' => $item['slug']]) }}" class="{{ request()->is($item['slug']) ? 'active' : ''}}">
                            <span>{{ $item['title'] }}</span>
                        </a>
                        @if(!empty($item['active_children_recursive']))
                            <div class="button-arrow">
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        @endif
                    </div>
                    @if(!empty($item['active_children_recursive']))
                        <ul class="sub-menu">
                            @foreach($item['active_children_recursive'] as $item)
                                <li>
                                    <a href="{{ route('user.post.index', ['slug' => $item['slug']]) }}" class="{{ request()->is($item['slug']) ? 'active' : ''}}">
                                        <span>{{ $item['title'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @elseif($item['type'] === 'page')
                <li>
                    <div class="d-flex justify-content-between align-items-center">
                        <a class="{{ request()->is($item['slug'] . '.html') ? 'active' : ''}}" href="{{ route('user.page.detail', ['slug' => $item['slug']]) }}">
                            <span>{{ $item['title'] }}</span>
                        </a>
                    </div>
                </li>
            @endif
        @endforeach
    </ul>
</div>
