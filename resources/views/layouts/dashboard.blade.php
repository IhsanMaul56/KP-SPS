@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('partials.sidebar')
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

            <<div class="grid-kanan">
                <div class="">
                    
                </div>
            </div>
    </div>
@endsection