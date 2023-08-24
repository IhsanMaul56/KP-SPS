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
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body style="font-family: 'Poppins', sans-serif;">
    <main class="py-0">
        @yield('content')
    </main>
    
    @include('partials.footer')
    <script src="{{ asset('datatables/css/jquery.dataTables.min.css') }}"></script>
    <script src="{{ asset('datatables/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
        $('#datatable').DataTable({
            serverSide: true,
            ajax: '{!! route('lihatdt') !!}',
            columns: [
                { data: 'nip', name: 'nip' },
                { data: 'nama_guru', name: 'nama_guru' },
                // Add more columns as needed
            ],
            });
        });
    </script>
    @livewireScripts
</body>
</html>
