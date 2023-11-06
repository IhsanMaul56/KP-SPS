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
                        <span class="h1 fw-bold text-biru">Nilai</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                <div class="row p-0 m-0">
                    <div class="card-body h-100 overflow-auto" id="shadow">
                        <div class="row mb-1" style="display: flex; align-items: center;">
                            <div class="col">
                                <select class="form-select"
                                    style="border-color: rgba(168, 168, 168, 1); width: max-content; border-radius: 10px 10px 10px 10px">
                                    <option hidden selected>Pilih Tahun Akademik</option>
                                    @foreach ($akademikList as $kodeTahun => $tahunAkademik)
                                        <option value="{{ $akademikList }}">{{ $tahunAkademik }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col text-end">
                                <a href="{{ route('nilai-progress') }}" class="btn btn-success"
                                    style="text-decoration: none">Nilai Progress</a>
                            </div>
                        </div>
                        <table class="table table-bordered my-3">
                            <thead>
                                <tr class="text-center">
                                    <th>NO</th>
                                    <th>MATA PELAJARAN</th>
                                    <th>NILAI AKHIR</th>
                                    <th>HURUF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($dataMapel as $item)
                                    <tr class="text-center">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nama_mapel }}</td>
                                        <td>{{ $item->nilai_akhir }}</td>
                                        <td>{{ $item->huruf_nilai }}</td>
                                    </tr>
                                @endforeach
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
