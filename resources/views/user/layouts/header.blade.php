<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="googlebot" content="index, follow" />
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
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="167x167" href="/favicon/apple-icon-167x167.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="icon" href="/favicon.ico" />
    <link rel="manifest" href="/favicon/site.webmanifest">
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/fontawesome/css/all.css" rel="stylesheet" type="text/css" />
    <link href="/css/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/user/css/app.css" rel="stylesheet" type="text/css" />
</head>
