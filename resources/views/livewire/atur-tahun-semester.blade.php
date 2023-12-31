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
                        <span class="h1 fw-bold text-biru">Data Akademik</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col">
                                <div class="card-body shadow text-end">
                                    <form wire:submit.prevent="insertTahun" action="{{ route('tambah-tahun-akademik') }}"
                                        method="POST">
                                        @csrf
                                        <label class="fs-5 d-flex justify-content-center mb-3">Tambah Tahun Akademik</label>
                                        @if (Session::has('berhasil'))
                                            <div class="alert alert-success">
                                                {{ Session::get('berhasil') }}
                                            </div>
                                        @endif

                                        @if (Session::has('gagal'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('gagal') }}
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <input wire:model="tahun_akademik" name="tahun_akademik" id="tahun_akademik"
                                                type="text"
                                                class="form-control @error('tahun_akademik') is-invalid @enderror mb-2"
                                                placeholder="Masukkan Nama Tahun Akademik" oninput="this.value = this.value.replace(/[^0-9/]/g, '')">
                                            @error('tahun_akademik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <input type="submit" value="Tambah" class="btn btn-primary mt-3">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body shadow text-end h-100">
                            <h4 class="text-center">Tahun Akademik</h4>
                            <hr>
                            @if (Session::has('berhasil_aktif'))
                                <div class="alert alert-success">
                                    {{ Session::get('berhasil_aktif') }}
                                </div>
                            @elseif (Session::has('gagal_aktif'))
                                <div class="alert alert-danger">
                                    {{ Session::get('gagal_aktif') }}
                                </div>
                            @endif
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tahun Akademik</th>
                                        <th>Semester</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{ $no = 1; }}
                                    @foreach ($tahunAkademik as $tahuns)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $tahuns->tahun_akademik }}</td>
                                            <td>{{ $tahuns->nama_semester }}</td>
                                            <td>{{ $tahuns->status }}</td>
                                            <td>
                                                <form action="{{ route('update-status', ['kode_tahun' => $tahuns->kode_tahun, 'status' => $tahuns->status != 'aktif' ? 'aktif' : 'tidak aktif']) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    @if ($tahuns->status == 'aktif')
                                                        <button type="submit" class="btn btn-success">Aktif</button>
                                                    @else
                                                        <button type="submit" class="btn btn-danger">Tidak Aktif</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
