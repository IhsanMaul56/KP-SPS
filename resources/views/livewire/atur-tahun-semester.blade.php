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
                        <span class="h1 fw-bold text-biru">Data Akademik</span></span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>

                

                <div class="row">
                    <div class="col-lg-3">
                        <div class="row mb-3">
                            <div class="col">
                                <div class="card-body shadow text-end" style="height:100%">
                                    <label class="fs-5 text-center">Aktivasi Tahun Akademik & Semester</label>
                                    <form wire:submit.prevent="updateStatus" method="POST" action="{{ route('aktifasi-tahun-akademik') }}">
                                        @csrf
                                    
                                        @if (session()->has('berhasil'))
                                            <div class="alert alert-success">
                                                {{ session('berhasil') }}
                                            </div>
                                        @endif
                                    
                                        @if (session()->has('gagal_aktifasi'))
                                            <div class="alert alert-danger">
                                                {{ session('gagal_aktifasi') }}
                                            </div>
                                        @endif
                                        <select name="kode_tahun" wire:model="data.kode_tahun" class="form-control my-3">
                                            <option value="" hidden selected>Pilih Tahun Akademik</option>
                                            @foreach ($tahunAkademikList as $combinedKey => $displayText)
                                                <option value="{{ $combinedKey }}">{{ $displayText }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary">Aktivasi</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="card-body shadow text-end" style="height:100%">
                                    <form wire:submit.prevent="insertTahun" action="{{ route('tambah-tahun-akademik') }}" method="POST">
                                        @csrf
                                        <label class="fs-5 d-flex justify-content-center">Tambah Tahun Akademik</label class="fs-5">
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
                                            <input wire:model="tahun_akademik" name="tahun_akademik" id="tahun_akademik" type="text" class="form-control @error('tahun_akademik') is-invalid @enderror" placeholder="Masukkan Nama Tahun Akademik">
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
                        <div class="card-body shadow text-end">
                            <h4 class="text-center">Tahun Akademik</h4><hr>
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tahun Akademik</th>
                                        <th>Semester</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($tahunAkademik as $tahuns)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $tahuns->tahun_akademik }}</td>
                                            <td>{{ $tahuns->nama_semester }}</td>
                                            <td>{{ $tahuns->status }}</td>
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

    <script>
        window.livewire.on('turbolinks:load', () => {
            Livewire.restart();
        });
    </script>
@endsection
