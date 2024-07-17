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

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/img/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome/css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome/css/all.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/admin/css/feathericon.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables/datatables.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/@form-validation/umd/styles/index.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}" />

</head>

<body>
    <div class="main-wrapper">
