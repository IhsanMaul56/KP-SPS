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
                <div class="row p-0 m-0 page active-page" id="Formatif" style="font-size: unset">
                    <div class="card-body h-100 overflow-auto" id="shadow">
                        <div class="row mb-1">
                            <div class="col">
                                <span>Nama Peserta Didik</span>
                            </div>
                            <div class="col">
                                <span>: </span>
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
                                <span>: </span>
                            </div>
                            <div class="col">
                                <span>Semester</span>
                            </div>
                            <div class="col">
                                <span>: 1</span>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col">
                                <span>Kelas</span>
                            </div>
                            <div class="col">
                                <span>: </span>
                            </div>
                            <div class="col">
                                <span>Tahun Ajaran</span>
                            </div>
                            <div class="col">
                                <span>: </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="font-size: unset">
                    <div class="col">
                        <div class="card-body h-100 overflow-auto" id="shadow">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-bold text-center">NILAI FORMATIF</h3>
                                    <hr>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Nilai Tugas</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama" type="text" class="form-control"
                                                style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Nilai Kuis</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama" type="text" class="form-control"
                                                style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-3">
                                        <input type="submit" value="Simpan" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body h-100 overflow-auto" id="shadow">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-bold text-center">NILAI SUMATIF</h3>
                                    <hr>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Nilai Tugas</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama" type="text" class="form-control"
                                                style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Nilai Kuis</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama" type="text" class="form-control"
                                                style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukkan">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-3">
                                        <input type="submit" value="Simpan" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
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
