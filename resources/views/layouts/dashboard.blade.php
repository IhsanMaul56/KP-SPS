<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>Dashboard | {{ Auth::user()->role }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="main-continer d-flex">
        <nav class="sidebar" id="side_nav">
            <div class="header-box">
                <h1 class="fs-4">
                    <span class="text-white">Selamat datang</span>
                </h1>
            </div>
        </nav>
        <div class="content">
            <h1>{{ Auth::user()->name }}</h1>
            <a href="/logout">logout</a>
        </div>
    </div>
</body>
</html>