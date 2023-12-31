<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link href="{{URL::asset('/img/logosmk1@2x.png')}}" rel="icon">
    <link href="{{URL::asset('/img/logosmk1@2x.png')}}" rel="apple-touch-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/summernote/summernote-lite.min.css') }}">
    <script src="{{ asset('assets/summernote/summernote-lite.min.js') }}"></script>
    @livewireStyles

    @stack('styles')

</head>
<body style="font-family: 'Poppins', sans-serif;">
    <main class="py-0 w-100 h-100 overflow-auto">
        @yield('content')
    </main>
    
    @include('partials.footer')
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/halaman.js') }}"></script>
    @stack('script')
</body>
</html>
