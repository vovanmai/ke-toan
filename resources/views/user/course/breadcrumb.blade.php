<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @php
            $title = $item->title ?? '';
            $title = mb_strlen($title) > 30 ? mb_substr($title, 0, 30) . '...' : $title;
            $categories = $item->category ? $item->category->toArray() : [];
            $titles = [];
            $slugs = [];
            array_walk_recursive($categories, function ($data, $key) use (&$titles, &$slugs) {
                if ($key == 'title') {
                    $titles[] = $data ?? null;
                }
                if ($key == 'slug') {
                    $slugs[] = $data ?? null;
                }
            });
            $cats = array_reverse(array_combine($slugs, $titles));
        @endphp
        <li class="breadcrumb-item"><a href="/">
            <i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('user.course.list_all') }}">Khóa học kế toán</a>
        </li>
        @foreach($cats as $slug => $catTitle)
            <li class="breadcrumb-item">
                <a href="{{ route('user.course.index', ['category' => $slug]) }}">{{ $catTitle }}</a>
            </li>
        @endforeach
    </ol>
</nav>
