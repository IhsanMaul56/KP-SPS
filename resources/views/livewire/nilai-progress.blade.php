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
                        <span class="h1 fw-bold text-biru">Nilai |</span><span class="h2 text-biru" style="padding-left: 10px;">Nilai Progress</span>
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
                                <td rowspan="4"><img src="{{ URL::asset('/img/logosmk1@2x.png') }}" class="img-fluid"
                                        alt="logo smk" height="100" width="100"></td>
                                <td>
                                    <h3 class="fw-bold">SMK SANGKURIANG 1 CIMAHI</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Alamat: Jl. Sangkuriang No.76, Cipageran, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat
                                        40511</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Telepon: (022) 6651173</h6>
                                </td>
                            </tr>
                        </table>
                        <hr style="border-top: 4px double black; text-align: center;">
                        <div class="row">
                            <h3 class="text-center fw-bold">LAPORAN HASIL BELAJAR</h1>
                        </div>
                        <div class="row mb-3">
                            <h3 class="text-center fw-bold">(RAPOR)</h3>
                        </div>
                        @if ($siswa->isNotEmpty())
                            @foreach ($siswa as $student)
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Nama Peserta Didik</span>
                                    </div>
                                    <div class="col">
                                        <span>: {{ $student->nama_siswa }}</span>
                                    </div>

                                    <div class="col">
                                        <span>Fase</span>
                                    </div>
                                    <div class="col">
                                        <span>: E</span>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>NIS</span>
                                    </div>
                                    <div class="col">
                                        <span>: {{ $student->nis }}</span>
                                    </div>
                                    <div class="col">
                                        <span>Semester</span>
                                    </div>
                                    <div class="col">
                                        <span>: {{ $student->nama_semester }}</span>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <span>Kelas</span>
                                    </div>
                                    <div class="col">
                                        <span>: {{ $student->nama_tingkat }} {{ $student->nama_kelas }}</span>
                                    </div>
                                    <div class="col">
                                        <span>Tahun Ajaran</span>
                                    </div>
                                    <div class="col">
                                        <span>: {{ $student->tahun_akademik }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No student data available.</p>
                        @endif
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr class="text-center">
                                    <th rowspan="2">NO</th>
                                    <th rowspan="2">MATA PELAJARAN</th>
                                    <th colspan="2">FORMATIF</th>
                                    <th colspan="2">SUMATIF</th>
                                    <th rowspan="2">NILAI AKHIR</th>
                                </tr>
                                <tr class="text-center">
                                    <th>TUGAS</th>
                                    <th>KUIS</th>
                                    <th>UTS</th>
                                    <th>UAS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @if ($dataMapel && count($dataMapel) > 0)
                                    @foreach ($dataMapel as $item)
                                        <tr class="text-center">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nama_mapel }}</td>
                                            <td>{{ $item->formatifs ? $item->formatifs->tugas : '-' }}</td>
                                            <td>{{ $item->formatifs ? $item->formatifs->kuis : '-' }}</td>
                                            <td>{{ $item->sumatifs ? $item->sumatifs->uts : '-' }}</td>
                                            <td>{{ $item->sumatifs ? $item->sumatifs->uas : '-' }}</td>
                                            <td>{{ $item->nilai_akhir }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function cetakPDF() {
            // Cetak PDF atau lakukan operasi lain sesuai kebutuhan
            window.print();
        }
    </script>
@endsection
