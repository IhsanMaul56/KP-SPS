@extends('layouts.app')

@push('styles')
    @livewireStyles
@endpush

@push('script')
    @livewireScripts
@endpush

@section('content')
    <div class="container-fluid p-0">
        @include('partials.sidebar')
        <div class="col p-0">
            <div class="grid-tengah">
                <div class="row">
                    <div class="col">
                        <span class="h1 fw-bold text-biru">Profil |</span><span class="h2 text-biru" style="padding-left: 10px;">Data Diri</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row p-0 m-0">
                    <div class="card-body h-100 overflow-auto" id="shadow">
                        @livewire('akun-guru')
                    </div>
                </div>
            </div>
        </div>
        <div class="col p-0" style="z-index: 7; height:30px; weight:20px;">
            <div class="grid-kanan">
                @livewire('profile-akun')
            </div>
        </div>
    </div>
@endsection
