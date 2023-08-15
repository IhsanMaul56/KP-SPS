@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('partials.sidebar')
            <div class="col-md-4">
                <div class="custom-div2">
                    <h1>{{ Auth::user()->name }}</h1>
                </div>
            </div>

            <div class="custom-div3">
                <div class="">
                    
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="main-continer d-flex">
        <nav class="sidebar" id="side_nav">
            <div class="header-box">
                <h1 class="fs-4">
                    <span class="text-white">Selamat datang</span>
                </h1>
            </div>
        </nav>
        <div class="content">
            
        </div>
    </div>   --}}
@endsection