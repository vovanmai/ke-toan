@extends('user.user4.layouts.master')

@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        @include('user.user4.layouts.slider')
        <div class="container content-space-t-1 content-space-t-md-2 content-space-b-2">
            @if($post)
            <h2 class="m-bottom-30">{{ $post->title }}</h2>
            <div class="mb-2">
                <span style="font-size: 15px"><i class="bi bi-calendar3"></i> {{ $post->created_at->format('Y-m-d H:i') }}</span>
                <span style="font-size: 15px"><i class="bi bi-eye-fill"></i> {{ number_format($post->total_view) }}</span>
            </div>
{{--            <div class="m-bottom-30">--}}
{{--                <div id="fb-root"></div>--}}
{{--                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0" nonce="lRZqiehh"></script>--}}
{{--                <div class="fb-like" data-href="{{ route('user.index') }}" data-width="" data-layout="" data-action="" data-size="" data-share="true"></div>--}}
{{--            </div>--}}
            <p class="m-bottom-30">{{ $post->short_description }}</p>
            <div>
                {!! $post->description ?? null !!}
            </div>
            @endif
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection


