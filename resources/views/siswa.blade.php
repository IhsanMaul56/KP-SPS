@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="grid-kiri">
            <center>
                <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid mt-4 mb-3" alt="logo smk" height="90" width="90">
                <br><h5 class="text-white"><b>SMK SANGKURIANG <br> 1 CIMAHI</b></h5>
            </center>
            <div class="col">
                <center>
                <span class="btn btn-primary"><i class="fa-brands fa-bootstrap"></i>Beranda</span><br>
                <span class="btn btn-primary">Akun</span><br>
                <span class="btn btn-primary">Nilai</span><br>
                <span class="btn btn-primary">Keluar</span>
                </center>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="grid-tengah">
                <h1 class="font">Beranda</h1>
            </div>
            <div class="card" style="position: absolute; z-index: 2;  width: 696px; height: 449px; bottom: 191px; top: 100px">
                <div class="card-body">
                    <div class="row" style="position: right">
                        <span>Semester Ganjil</span>
                    </div>

                </div>
            </div>
        </div>

        <div class="grid-kanan">
            <div class="">
                
            </div>
        </div>

    </div>
    </div>

@endsection