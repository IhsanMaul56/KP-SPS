<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    
    @livewireStyles
</head>
<body style="font-family: 'Poppins', sans-serif;">
    <main class="py-0">
        @yield('content')
    </main>

    {{-- <footer class="bg-light text-center text-lg-start">
        copyright
        &copy; Copyright : 
    </footer> --}}
</body>
</html>
