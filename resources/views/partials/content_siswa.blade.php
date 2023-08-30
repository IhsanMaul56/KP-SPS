{{-- Page 1 --}}
<div class="col p-0 page active-page" id="page1">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Beranda</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body h-100 overflow-auto" id="shadow">
                <div class="row">
                    @livewire('tabel-siswa')
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Page 2 --}}
<div class="col p-0 page" id="page2">
    <div class="grid-tengah">
        <div class="row">
            <div class="col">
                <span class="h1 fw-bold text-biru">Akun</span>
            </div>
            <div class="col text-end">
                <span class="h5">Selamat Datang,</span><br>
                <span class="h4 fw-bold">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="row p-0 m-0">
            <div class="card-body" id="shadow" style="height: 575px">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col" style="margin-bottom: 20px">
                            <div class="persegi">
                                <p class="text-white m-0 fs-5">Ubah Data | Akun</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3" style="width: 30%;">
                            <span>Nama</span>
                        </div>
                        <div class="col-3" style="width: 40%;">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3" style="width: 30%;">
                            <span>NIS</span>
                        </div>
                        <div class="col-3" style="width: 40%;">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3" style="width: 30%;">
                            <span>Jenis Kelamin</span>
                        </div>
                        <div class="col-3" style="width: 40%;">
                            <select id="jeniskelamin" class="form-select" style="border-color: rgba(168, 168, 168, 1);">
                                <option selected></option>
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3" style="width: 30%;">
                            <span>Tempat, Tanggal Lahir</span>
                        </div>
                        <div class="col-3" style="width: 40%;">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                {{-- <input id="datepicker" type="input-group date" class="form-control" placeholder="dd/mm/yyyy" style="border-color: rgba(168, 168, 168, 1);"> --}}
                                @livewire('date-picker')
                                {{-- <span><i class="bi bi-calendar-event"></i></span> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3" style="width: 30%;">
                            <span>Telepon/HP</span>
                        </div>
                        <div class="col-3" style="width: 40%;">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3" style="width: 30%;">
                            <span>E-mail</span>
                        </div>
                        <div class="col-3" style="width: 40%;">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-3" style="width: 30%;">
                            <span>Alamat Lengkap</span>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="height: 150px; border-color: rgba(168, 168, 168, 1);">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Page 3 --}}
<div class="col p-0 page" id="page3">
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
            <div class="card-body" id="shadow">
                <div class="row mb-2">
                    <p class="m-0 fs-5">Pilih Tahun Akademik:</p>
                </div>
                <div class="row mb-1" style="display: flex; align-items: center;">
                    <div class="col">
                        <select class="form-select" style="border-color: rgba(168, 168, 168, 1); width: 300px; border-radius: 100px">
                            <option selected>Semester Ganjil</option>
                            <option>Semester Genap</option>
                        </select>
                    </div>
                    <div class="col-3" style="width: max-content;">
                        <button class="btn btn-danger m-0" onclick="pdf();" id="shadow">Cetak Rapor</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>