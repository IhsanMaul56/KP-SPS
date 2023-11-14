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
                                <select class="form-select" wire:model="tahunSelected" wire:change="loadDataMapel">
                                    <option hidden selected>Pilih Tahun Akademik</option>
                                    @if ($tahunAkademik)
                                        @foreach ($tahunAkademik as $item)
                                            <option value="{{ $item->kode_tahun }} {{ $item->semester_id }}">{{ $item->tahun_akademik }} - Semester {{ $item->nama_semester }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>                                                        
                            <div class="col text-end">
                                <a href="{{ route('nilai-progress') }}" class="btn btn-success"
                                    style="text-decoration: none">Nilai Progress</a>
                                    <iframe id="iframePageToPrint" src="nilai-print" style="display:none;"></iframe>
                                    <button onclick="cetakPDF()" class="btn btn-primary">Download Nilai</button>
                            </div>
                        </div>

                        @if ($dataMapel && count($dataMapel) > 0)
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
                        @else
                            <p>No data available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col p-0" style="z-index: 7; height:30px; weight:20px;">
            <div class="grid-kanan">
                @include('livewire.pengumuman-siswa')
            </div>
        </div>
    </div>

    <script>
        function cetakPDF() {
            // Dapatkan akses ke iframe
            var iframe = document.getElementById('iframePageToPrint').contentWindow;

            // Panggil fungsi untuk mencetak PDF dari halaman yang dimuat di dalam iframe
            iframe.cetakPDF();
        }
    </script>
@endsection
