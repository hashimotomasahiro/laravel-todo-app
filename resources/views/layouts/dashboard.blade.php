<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('styles')
</head>
<body style="padding: 60px 0;">
    <div id="app">

    @component('components.dashboard.header')
    @endcomponent

    <!-- 管理画面にログインしていない状態でサイドバーが表示されてしまう不具合を修正 -->
    @if(Auth::guard('admins')->check())
    <div class="col-3 mt-3">
        @component('components.dashboard.sidebar')
        @endcomponent
    </div>
    @endauth
        @include('layouts.app')

        <main class="py-4">
            @yield('content')
        </main>

    </div>

    @stack('scripts')
</body>
</html>