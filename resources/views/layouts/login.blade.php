<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} | @yield('title', 'etoolz')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset("/images/favicon.ico") }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset("/images/favicon-152.png") }}">
    <link href="{{ asset("css/full_sparkle.css") }}" rel="stylesheet">
    @stack('stylesheets')

</head>

<body id="login_screen">
<div id="loginPage">
    @yield('content')
</div>

<script src="{{ asset("/js/full_sparkle.js") }}"></script>
<script src="{{ asset("/js/icheck.min.js") }}"></script>
@stack('scripts')

</body>
</html>