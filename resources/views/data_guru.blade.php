@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('partials.sidebar')
            <div class="col-md-4">
                <div class="custom-div2">
                    <div class="row p-4">
                        <div class="col-md-8">
                            <span class="h1 p-4"><strong class="text-biru">Beranda</strong></span>
                        </div>
                        <div class="col-md-4 text-kanan">
                            <span class="h3 text-right">Selamat Datang,</span><br>
                            <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="custom-div3" style="background-color: bisque">
                <div class="row">
                    <div class="col-md-4 p-4">
                        <i class="bi bi-gear" style="font-size: 280%"></i>
                    </div>  
                </div>
            </div>

        </div>
    </div>
@endsection