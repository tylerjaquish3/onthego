<!DOCTYPE html>
<html lang="en" class="blank">

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
    <!-- Sparkle -->
    <link href="{{ asset("/css/full_sparkle.css") }}" rel="stylesheet">
    @stack('stylesheets')
</head>

<body>
<div class="container body">
    <div class="main_container">

        @yield('content')

    </div>
    <div class="push"></div>
</div>
@include('includes.global.footer')
@stack('scripts')

</body>
</html>