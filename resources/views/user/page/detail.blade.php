@extends('user.layouts.master')
@section('content')
    <div class="ckeditor-content">
        {!! $item->description !!}
    </div>
@endsection
