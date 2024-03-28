<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <meta name="google-site-verification" content="jF7ooTqh583AJEnuZ1M2DDrSrCarnf2NhiXe0-jkE94">
    {!! \Artesaos\SEOTools\Facades\SEOMeta::generate() !!}
    {!! \Artesaos\SEOTools\Facades\OpenGraph::generate() !!}
    @if($link = app('web_setting')->link_fan_page_facebook ?? null)
        <meta property="article:publisher" content="{{ $link }}" />
    @endif
    {!! \Artesaos\SEOTools\Facades\TwitterCard::generate() !!}
    {!! \Artesaos\SEOTools\Facades\JsonLd::generate() !!}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Start: Favicon-->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="167x167" href="/favicon/apple-icon-167x167.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="icon" href="/favicon.ico" />
    <link rel="manifest" href="/favicon/site.webmanifest">
    <!-- End: Favicon-->
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/fontawesome/css/all.css" rel="stylesheet" type="text/css" />
    <link href="/css/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/app.css" rel="stylesheet" type="text/css" />
    <style>
        @-moz-keyframes quick-alo-circle-anim {
            0% {
                -moz-transform: rotate(0) scale(0.5) skew(1deg);
                opacity: 0.1;
                -moz-opacity: 0.1;
                -webkit-opacity: 0.1;
                -o-opacity: 0.1;
            }
            30% {
                -moz-transform: rotate(0) scale(0.7) skew(1deg);
                opacity: 0.5;
                -moz-opacity: 0.5;
                -webkit-opacity: 0.5;
                -o-opacity: 0.5;
            }
            100% {
                -moz-transform: rotate(0) scale(1) skew(1deg);
                opacity: 0.6;
                -moz-opacity: 0.6;
                -webkit-opacity: 0.6;
                -o-opacity: 0.1;
            }
        }
        @-webkit-keyframes quick-alo-circle-anim {
            0% {
                -webkit-transform: rotate(0) scale(0.5) skew(1deg);
                -webkit-opacity: 0.1;
            }
            30% {
                -webkit-transform: rotate(0) scale(0.7) skew(1deg);
                -webkit-opacity: 0.5;
            }
            100% {
                -webkit-transform: rotate(0) scale(1) skew(1deg);
                -webkit-opacity: 0.1;
            }
        }
        @-o-keyframes quick-alo-circle-anim {
            0% {
                -o-transform: rotate(0) kscale(0.5) skew(1deg);
                -o-opacity: 0.1;
            }
            30% {
                -o-transform: rotate(0) scale(0.7) skew(1deg);
                -o-opacity: 0.5;
            }
            100% {
                -o-transform: rotate(0) scale(1) skew(1deg);
                -o-opacity: 0.1;
            }
        }
        @-moz-keyframes quick-alo-circle-fill-anim {
            0% {
                -moz-transform: rotate(0) scale(0.7) skew(1deg);
                opacity: 0.2;
            }
            50% {
                -moz-transform: rotate(0) -moz-scale(1) skew(1deg);
                opacity: 0.2;
            }
            100% {
                -moz-transform: rotate(0) scale(0.7) skew(1deg);
                opacity: 0.2;
            }
        }
        @-webkit-keyframes quick-alo-circle-fill-anim {
            0% {
                -webkit-transform: rotate(0) scale(0.7) skew(1deg);
                opacity: 0.2;
            }
            50% {
                -webkit-transform: rotate(0) scale(1) skew(1deg);
                opacity: 0.2;
            }
            100% {
                -webkit-transform: rotate(0) scale(0.7) skew(1deg);
                opacity: 0.2;
            }
        }
        @-o-keyframes quick-alo-circle-fill-anim {
            0% {
                -o-transform: rotate(0) scale(0.7) skew(1deg);
                opacity: 0.2;
            }
            50% {
                -o-transform: rotate(0) scale(1) skew(1deg);
                opacity: 0.2;
            }
            100% {
                -o-transform: rotate(0) scale(0.7) skew(1deg);
                opacity: 0.2;
            }
        }
        @-moz-keyframes quick-alo-circle-img-anim {
            0% {
                transform: rotate(0) scale(1) skew(1deg);
            }
            10% {
                -moz-transform: rotate(-25deg) scale(1) skew(1deg);
            }
            20% {
                -moz-transform: rotate(25deg) scale(1) skew(1deg);
            }
            30% {
                -moz-transform: rotate(-25deg) scale(1) skew(1deg);
            }
            40% {
                -moz-transform: rotate(25deg) scale(1) skew(1deg);
            }
            50% {
                -moz-transform: rotate(0) scale(1) skew(1deg);
            }
            100% {
                -moz-transform: rotate(0) scale(1) skew(1deg);
            }
        }
        @-webkit-keyframes quick-alo-circle-img-anim {
            0% {
                -webkit-transform: rotate(0) scale(1) skew(1deg);
            }
            10% {
                -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
            }
            20% {
                -webkit-transform: rotate(25deg) scale(1) skew(1deg);
            }
            30% {
                -webkit-transform: rotate(-25deg) scale(1) skew(1deg);
            }
            40% {
                -webkit-transform: rotate(25deg) scale(1) skew(1deg);
            }
            50% {
                -webkit-transform: rotate(0) scale(1) skew(1deg);
            }
            100% {
                -webkit-transform: rotate(0) scale(1) skew(1deg);
            }
        }
        @-o-keyframes quick-alo-circle-img-anim {
            0% {
                -o-transform: rotate(0) scale(1) skew(1deg);
            }
            10% {
                -o-transform: rotate(-25deg) scale(1) skew(1deg);
            }
            20% {
                -o-transform: rotate(25deg) scale(1) skew(1deg);
            }
            30% {
                -o-transform: rotate(-25deg) scale(1) skew(1deg);
            }
            40% {
                -o-transform: rotate(25deg) scale(1) skew(1deg);
            }
            50% {
                -o-transform: rotate(0) scale(1) skew(1deg);
            }
            100% {
                -o-transform: rotate(0) scale(1) skew(1deg);
            }
        }
    </style>
</head>
