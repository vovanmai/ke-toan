@extends('user.user2.layouts.master')

@section('content')
    @include('user.user2.layouts.slider')

    <div class="container" style="margin-top: 30px">
        @php
            $cats = resolve(\App\Services\User\User2\Post\ListPostService::class)->handle();
        @endphp
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    @foreach($cats as $cat)
                    @if($cat->posts->count())
                    <div class="col-md-12 col-lg-6 pb-20">
                        <h5 class="mb-15" style="border-bottom: 2px solid #0a804a">
                            <a class="fw-bold text-white display-inline-block" style="background: #0a804a;padding: 4px 5px;" href="{{ route('user.post.index', ['slug' => $cat->slug]) }}">{{ $cat->title }}</a>
                        </h5>
                        <div>
                            @php
                                $posts = $cat->posts->toArray();
                                $firstPost = $posts[0] ?? null;
                                array_shift($posts);
                            @endphp
                            @if($firstPost)
                            <div class="first-post" style="display: flex">
                                <div>
                                    <a href="{{ route('user.post.detail', ['slug' => $firstPost['slug']]) }}">
                                        <img style="width: 200px; border: 1px solid #adadad; height: 120px; object-fit: cover;" src="{{ $firstPost['image']['url'] }}" alt="">
                                    </a>
                                </div>
                                <div style="padding-left: 15px">
                                    <a class="title" href="{{ route('user.post.detail', ['slug' => $firstPost['slug']]) }}">{{ $firstPost['title'] }}</a>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="list-post" style="margin-top: 10px">
                            <ul style="list-style-type: square; padding-left: 13px">
                                @foreach($posts as $post)
                                <li>
                                    <a href="{{ route('user.post.detail', ['slug' => $post['slug']]) }}" class="title">{{ $post['title'] }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-12">
                        <div>
                            <h5 class="mb-42" style="border-bottom: 2px solid #0a804a">
                                <a class="fw-bold text-white display-inline-block" style="background: #0a804a;padding: 4px 5px;" href="">TÀI LIỆU MỚI NHẤT</a>
                            </h5>
                            <div class="row documents">
                                @php
                                    $documents = resolve(\App\Services\User\User2\Document\ListRecentDocumentService::class)->handle();
                                @endphp
                                @foreach($documents as $document)
                                <div class="col-md-4 col-sm-6 col-sm-6">
                                    <div class="document p-3 mb-4">
                                        @if($document->file['extension'] == 'pdf')
                                        <i title="PDF" class="fa fa-file-pdf-o" style="color: red; font-size: 20px"></i>
                                        @elseif($document->file['extension'] == 'doc' || $document->file['extension'] == 'docx')
                                        <i title="WORD" class="fa fa-file-word-o" style="color: #0a804a; font-size: 20px"></i>
                                        @else
                                            <i title="ZIP" class="fa fa fa-fw fa-file-zip-o" style="color: purple; font-size: 20px"></i>
                                        @endif
                                        <div class="preview-image">
                                            <a href="{{ route('user.document.detail', ['slug' => $document->slug]) }}">
                                                <img src="{{ $document->preview_image['url'] }}" alt="">
                                            </a>
                                        </div>
                                        <div class="mt-2">
                                            @php
                                                $title = mb_substr($document->title, 0, 50);
                                            @endphp
                                            <a class="title" href="{{ route('user.document.detail', ['slug' => $document->slug]) }}">{{ mb_strlen($document->title) <= 50 ? $document->title : "{$title}..." }}</a>
                                        </div>
                                        <div class="document-footer">
                                            <div style="font-size: 13px">
                                                <i style="opacity: 0.7" class="fa fa-eye"></i>
                                                <span>{{ number_format($document->total_view) }}</span>
                                                &nbsp;
                                                <i style="opacity: 0.7" class="fa fa-download"></i>
                                                <span>{{ number_format($document->total_download) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div>
                    <h5 class="text-center" style="font-weight: bold; color: white; background: #3c8dbc; padding: 6px 5px; margin-bottom: 10px">
                        TƯ VẤN KHÓA HỌC KẾ TOÁN
                    </h5>
                    <div style="margin-bottom: 15px">
                        <div>
                            <marquee onmouseover="this.stop();" onmouseout="this.start();" behavior="" direction="">
                                <span style="color: red; font-weight: bold">HOTLINE OR ZALO:</span>
                                <a style="color: #0a804a" href="tel:0984969752">0984.96.97.52</a>
                                <span>(cô Phương)</span>
                            </marquee>
                        </div>
                    </div>
                </div>
                <div class="view-post">
                    @php
                        $posts = resolve(\App\Services\User\User2\Post\ListPostByViewService::class)->handle();
                        $first = $posts[0] ?? null;
                    @endphp
                    <h5 class="text-center" style="color: white; font-weight: bold; background: #0a804a; padding: 6px 5px; margin-bottom: 10px">
                        BÀI VIẾT XEM NHIỀU NHẤT
                    </h5>
                    <div>
                        <div class="first-post" style="display: flex">
                            <div>
                                <a href="{{ route('user.post.detail', ['slug' => $first['slug'] ?? '1']) }}">
                                    <img style="width: 400px; border: 1px solid #adadad;" src="{{ $first->image['url'] ?? '' }}" alt="">
                                </a>
                            </div>
                            <div style="padding-left: 10px; line-height: 16px">
                                <a class="title" style="font-size: 13px" href="{{ route('user.post.detail', ['slug' => $first['slug'] ?? '1']) }}">{{ $first->title ?? '' }}</a>
                            </div>
                        </div>
                        <div>
                            <ul style="list-style-type: square; padding-left: 13px">
                                @foreach($posts as $post)
                                    <li style="line-height: 16px; margin-top: 10px">
                                        <a href="{{ route('user.post.detail', ['slug' => $post['slug']]) }}" class="title" style="font-size: 13px" >{{ $post['title'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

