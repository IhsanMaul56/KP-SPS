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
                        <span class="h1 fw-bold text-biru">Nilai Progress</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row p-0 m-0">
                    <div class="card-body h-100 overflow-auto" id="shadow">
                        <table style="display: flex; justify-content: center">
                            <tr>
                                <td rowspan="4"><img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid" alt="logo smk" height="100" width="100"></td>
                                <td><h3 class="fw-bold">SMK SANGKURIANG 1 CIMAHI</h3></td>
                            </tr>
                            <tr>
                                <td><h6>Alamat: Jl. Sangkuriang No.76, Cipageran, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40511</h6></td>
                            </tr>
                            <tr>
                                <td><h6>Telepon: (022) 6651173</h6></td>
                            </tr>
                        </table>
                        <hr style="border-top: 4px double black; text-align: center;">
                        <div class="row">
                            <h3 class="text-center fw-bold">LAPORAN HASIL BELAJAR</h1>
                        </div>
                        <div class="row mb-3">
                            <h3 class="text-center fw-bold">(RAPOR)</h3>
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <span>Nama Peserta Didik</span>
                            </div>
                            <div class="col">
                                <span>: Ahmad Reza</span>
                            </div>
                            <div class="col">
                                <span>Kelas</span>
                            </div>
                            <div class="col">
                                <span>: X RPL 1</span>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <span>NIS</span>
                            </div>
                            <div class="col">
                                <span>: 112233</span>
                            </div>
                            <div class="col">
                                <span>Fase</span>
                            </div>
                            <div class="col">
                                <span>: F</span>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <span>Sekolah</span>
                            </div>
                            <div class="col">
                                <span>: SMK Sangkuriang 1</span>
                            </div>
                            <div class="col">
                                <span>Semester</span>
                            </div>
                            <div class="col">
                                <span>: 2</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <span>Alamat</span>
                            </div>
                            <div class="col">
                                <span>: Cimahi</span>
                            </div>
                            <div class="col">
                                <span>Tahun Ajaran</span>
                            </div>
                            <div class="col">
                                <span>: 2023⁄2024 Ganjil</span>
                            </div>
                        </div>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr class="text-center">
                                    <th>NO</th>
                                    <th>MATA PELAJARAN</th>
                                    <th>NILAI AKHIR</th>
                                    <th>CAPAIAN KOMPETENSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td rowspan="2">1</td>
                                    <td rowspan="2" class="text-start">Bahasa Inggris</td>
                                    <td rowspan="2">75</td>
                                    <td>0</td>
                                </tr>
                                <tr class="text-center">
                                    <td>0</td>
                                </tr>
                                <tr class="text-center">
                                    <td rowspan="2">2</td>
                                    <td rowspan="2" class="text-start">RPL</td>
                                    <td rowspan="2">65</td>
                                    <td>0</td>
                                </tr>
                                <tr class="text-center">
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col p-0" style="z-index: 7; height:30px; weight:20px;">
            <div class="grid-kanan">
                @include('partials.rightbar_siswa')
            </div>
        </div>
    </div>
@endsection