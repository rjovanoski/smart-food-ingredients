<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Scripts -->
   <script src="{{ asset('js/user.js') }}" defer></script>
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
</head>
<body>

    @include('user.includes.sidepanel')

    <main class="profile">
        @yield('content')
    </main>

    @yield('script')
</body>
</html>