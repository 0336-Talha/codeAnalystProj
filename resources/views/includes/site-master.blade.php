<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
    @php
    $page_title = empty($sitecontent['page_title'])
    ? ($page_title . " - " . $site_settings->site_name)
    : ($sitecontent['page_title'] . " - " . $site_settings->site_name);
    $meta_description = empty($sitecontent['meta_description'])
    ? $site_settings->site_meta_desc
    : $sitecontent['meta_description'];
    $meta_keywords = empty($sitecontent['meta_keywords'])
    ? $site_settings->site_meta_keyword
    : $sitecontent['meta_keywords'];
    $meta_image = empty($sitecontent['meta_image'])
    ? get_site_image_src("images", $site_settings->site_thumb) . '?v-' . $site_settings->site_version
    : $sitecontent['meta_image'];
    @endphp

    <meta name="title" content="{{ $page_title }}">
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">
    <meta property="og:type" content="website">
    <!-- <meta property="og:url" content="{{ request()->url() }}"> -->
    <meta property="og:title" content="{{ $page_title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:site_about" content="{{  $site_settings->site_about }}">
    <meta property="og:image" content="{{ $meta_image }}">
    <meta property="twitter:card" content="thumbnail">
    <!-- <meta property="twitter:url" content="{{ request()->url() }}"> -->
    <meta property="twitter:title" content="{{ $page_title }}">
    <meta property="twitter:description" content="{{ $meta_description }}">
    <meta property="twitter:image" content="{{ $meta_image }}">



    <!-- Css files -->

<!-- CommonCss Css -->


<link type="text/css" rel="stylesheet" href="{{ asset('css/commonCss.css') }}">

<!-- owl carousel -->

<link type="text/css" rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

<link type="text/css" rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">


<!-- Main Css -->

<link type="text/css" rel="stylesheet" href="{{ asset('css/main.css?v=48') }}">

<!-- Media-Query Css -->

<link type="text/css" rel="stylesheet" href="{{ asset('css/responsive.css?v=36') }}">

{{-- title --}}

<title>{{ $page_title }}</title>

<!-- Favicon -->
<link type="image/png" rel="icon" href="{{ get_site_image_src('images', $site_settings->site_icon) . '?v-' . $site_settings->site_version }}">


</head>

<body>
    
    
    @if(empty($page_404) && !empty($footer))
    @include('includes.header')
    @endif

    {{-- Dynamic Page Content --}}
    @include($pageView)

    @if(empty($page_404) && !empty($footer))
    @include('includes.footer')
    @endif

    
</body>