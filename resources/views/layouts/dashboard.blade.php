@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        @include('partials.sidebar')
        <div class="col p-0">
            <div class="grid-tengah">
                <div class="row">
                    <div class="col">
                        <span class="h1"><strong style="color: #16498c;">Beranda</strong></span>
                    </div>
                    <div class="col" style="text-align: right">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4"><strong>{{ Auth::user()->name }}</strong></span>
                    </div>
                </div>
                <div class="row p-0 m-0">
                    <div class="card-body" id="shadow">
                        <div class="row">
                            <div class="col">
                                <div class="persegi">
                                    <p class="text-white" style="margin-bottom: 0px;">Semester Ganjil</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="persegi2">
                                    <p class="text-white" style="margin-bottom: 0px;">X RPL 1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col p-0">
            <div class="grid-kanan">
                <div class="row">
                    <div class="col" style="text-align: right">
                        <span class="h5"><strong>NIS</strong></span>
                    </div>
                    <div class="col" style="text-align: right; font-size: 30px;">
                        <i class="bi bi-person-circle"></i>
                    </div>
                </div>
                <div class="row p-0 m-0">
                    <div class="card-body" id="shadow">
                        <div class="row">
                            <div class="col">
                                <p><i class="bi bi-megaphone-fill"><u style="padding-left: 10px;">Pengumuman</u></i></p>
                            </div>
                            <div class="row m-0 p-0" style="text-align: center">
                                <img src="{{URL::asset('/img/no-data.png')}}" alt="clipboard" width="150px"><br>
                                <span>Tidak Ada Pengumuman Saat Ini</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
