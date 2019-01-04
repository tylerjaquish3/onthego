<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset("/images/favicon.ico") }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset("/images/favicon-152.png") }}">
    @stack('stylesheets')
    <link href="{{ asset("/css/full_sparkle.css") }}" rel="stylesheet">
    <link href="{{ asset("/css/admin.css") }}" rel="stylesheet">
    <script src="{{ asset("/js/jquery-full.js") }}"></script>
    @stack('header-scripts')

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        @include('includes.global.sidebar')

        @include('includes.global.header')
        <div class="right_col" role="main">
            @include('includes.global.alerts')
            @yield('content')
        </div>
    </div>
</div>
@include('includes.global.footer')

<!-- Sparkle Combined Scripts -->
<script src="{{ asset("/js/sparkle.js") }}"></script>
<script src="{{ asset("/js/dataTables.min.js") }}"></script>
@stack('scripts')
</body>
</html>