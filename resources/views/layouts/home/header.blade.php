<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />


    <title>{{ $page_title }} : DocOnTap</title>

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link type="image/x-icon" href="{{ asset('assets/img/favicon.png')}}" rel="icon" />

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/css/feather.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/css/aos.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}" />
</head>

<body>
    <div class="main-wrapper">
