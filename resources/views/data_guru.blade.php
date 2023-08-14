@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="custom-div">
                <center>
                    <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid mt-4 mb-3" alt="logo smk" height="120" width="120">
                    <br><h3 class="text-white">SMK SANGKURIANG <br> 1 CIMAHI</h3>
                </center>
                <div class="col">
                    <center>
                    <span class="btn btn-primary"><i class="fa-brands fa-bootstrap"></i>Beranda</span><br>
                    <span class="btn btn-primary">Beranda</span><br>
                    <span class="btn btn-primary">Beranda</span>
                    </center>
                </div>
            </div>
        
            <div class="col-md-4">
                <div class="custom-div2">
                    
                </div>
            </div>

            <div class="custom-div3">
                <div class="">
                    
                </div>
            </div>

        </div>
    </div>

@endsection
{{-- @extends('layouts.app')

@section('content')
<div class="main-continer d-flex">
    <div class="container-fluid">
        <div class="row">
            <div class="custom-div">
                
            </div>
        </div>
    </div>
    <nav class="sidebar" id="side_nav">
        <div class="header-box">
            <h1 class="fs-4">
                <span>Selamat datang GFU</span>
            </h1>
        </div>
    </nav>
    <div class="content">
        <h1>{{ Auth::user()->name }}</h1>
        <a href="/logout">logout</a>
    </div>
</div>
@endsection --}}