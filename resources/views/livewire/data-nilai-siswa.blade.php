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
                        <span class="h1 fw-bold text-biru">Input Nilai Siswa</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                {{-- Nilai  Formatif --}}
                <div class="row p-0 m-0 page active-page" id="Formatif" style="font-size: unset">
                    <div class="card-body h-100 overflow-auto" id="shadow">
                        <form action="#" method="POST" id="form1">
                            <h3 class="fw-bold">NILAI FORMATIF</h3>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Kode Mata Pelajaran</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan Kode Mata Pelajaran">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Mata Pelajaran</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan Mata Pelajaran">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Tahun Ajaran</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan Tahun Ajaran">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>NIS</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan NIS">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Nama Siswa</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan Nama Siswa">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Kelas</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan Kelas">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>TP</span>
                                </div>
                                <div class="col-3">
                                    <select class="form-select" style="border-color: rgba(168, 168, 168, 1);">
                                        <option hidden selected>Pilih</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>NIS</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan ATP">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-3">
                                    <span class="btn btn-secondary" id="btnSumatif" style="margin-right: 10px">Selanjutnya</span>
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Nilai Sumatif --}}
                <div class="row p-0 m-0 page" id="Sumatif" style="font-size: unset">
                    <div class="card-body h-100 overflow-auto" id="shadow">
                        <form action="#" method="POST" id="form1">
                            <h3 class="fw-bold">NILAI SUMATIF</h3>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Nilai UTS</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan Nilai UTS">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <span>Nilai UAS</span>
                                </div>
                                <div class="col-3">
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan Nilai UAS">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-3">
                                    <span class="btn btn-secondary" id="btnFormatif" style="margin-right: 10px">Kembali</span>
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col p-0">
            <div class="grid-kanan">
                @include('partials.rightbar_guru')
            </div>
        </div>
    </div>
@endsection
