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
                        <span class="h1 fw-bold text-biru">Beranda |</span><span class="h2 text-biru" style="padding-left: 10px;">Jadwal Pelajaran</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row p-0 m-0">
                    @livewire('tabel-siswa')
                </div>
            </div>
        </div>
        <div class="col p-0" style="z-index: 7; height:30px; weight:20px;">
            <div class="grid-kanan">
                {{-- @include('partials.rightbar_siswa') --}}
                @livewire('pengumuman-siswa')
            </div>
        </div>
    </div>
@endsection
