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
            <div class="grid-tengah w-100 overflow-auto">
                <div class="row">
                    <div class="col">
                        <span class="h1 fw-bold text-biru">Akademik |</span><span class="h2 text-biru" style="padding-left: 10px;">Aktivasi Semester</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card-body shadow text-end">
                            <label class="fs-5 text-center">Aktivasi Tahun Akademik & Semester</label class="fs-5">
                            <select name="" id="" class="form-select my-3">
                                <option value="" hidden selected>Pilih Tahun Akademik</option>
                                <option value="">1</option>
                            </select>
                            <select name="" id="" class="form-select my-3">
                                <option value="" hidden selected>Pilih Semester</option>
                                <option value="">1</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Aktivasi</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body shadow text-end">
                            <button class="btn btn-primary mb-3 ml-auto">
                                <i class="bi bi-plus-lg" style="padding-right: 5px"></i>Tambah TA
                            </button>
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>TAHUN AKADEMIK</th>
                                        <th>SEMESTER</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2022/2023</td>
                                        <td>1</td>
                                        <td>Nonaktif</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection