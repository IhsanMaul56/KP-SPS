@extends('layout.app')

@section()
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
@endsection