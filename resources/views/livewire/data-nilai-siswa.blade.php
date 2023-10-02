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
                <div class="row" style="margin-bottom: 30px;">
                    <div class="col">
                        <span class="h1 fw-bold text-biru">Input Nilai Siswa</span>
                    </div>
                    <div class="col text-end">
                        <span class="h5">Selamat Datang,</span><br>
                        <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
                    </div>
                </div>
                {{-- Nilai  Formatif --}}
                <div class="row">
                    <form action="#" method="POST" id="form1">
                        <div class="card p-0">
                            <div class="card-body overflow-auto h-100 fs-5">
                                <h3>Nilai Formatif</h3><hr>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Kode Mata Pelajaran</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan NIP">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Mata Pelajaran</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nama Lengkap">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Kelas</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Agama">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>TP</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nomor HP" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-end">
                                    <div class="col-3 mt-5">
                                        <span class="btn btn-primary mt-5" id="nextFormButton">Next</span>
                                    </div>
                                    <div class="col-3 mt-5">
                                        <input type="submit" value="Simpan" class="btn btn-primary mt-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Nilai Sumatif --}}
                <div class="row">
                    <form action="#" method="POST" id="form1" class="hidden">
                        <div class="card p-0">
                            <div class="card-body overflow-auto h-100 fs-5">
                                <h3>Nilai Sumatif</h3><hr>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Kode Mata Pelajaran</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan NIP">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Mata Pelajaran</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nama Lengkap">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>Kelas</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Agama">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-3">
                                        <span>TP</span>
                                    </div>
                                    <div class="col-3">
                                        <div class="input-group">
                                            <input id="nama" type="text" class="form-control" style="border-color: rgba(168, 168, 168, 1);" placeholder="Masukan Nomor HP" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-end">
                                    <div class="col-3 mt-5">
                                        <span class="btn btn-primary mt-5" id="prevFormButton">Prevous</span>
                                    </div>
                                    <div class="col-3 mt-5">
                                        <input type="submit" value="Simpan" class="btn btn-primary mt-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
