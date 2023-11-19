<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Nilai Progress</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body h-100 w-100 overflow-auto" id="shadow">
                <table style="justify-content: center">
                    <tr>
                        <td rowspan="4"><img src="{{ asset('/img/logosmk1@2x.png') }}" class="img-fluid"alt="logo smk" height="100" width="100"></td>
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
</body>

<script>
        function cetakPDF() {
            // Cetak PDF atau lakukan operasi lain sesuai kebutuhan
            window.print();
        }
    </script>
</html>