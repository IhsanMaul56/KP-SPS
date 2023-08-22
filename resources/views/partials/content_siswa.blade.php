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
            <div class="card-body" id="shadow">
                <div class="row">
                    <div class="col-3" style="width: 200px">
                        <div class="persegi">
                            <p class="text-white m-0 fs-5">Semester Siswa</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="persegi2 m-0">
                            <p class="text-white m-0 fs-5">X RPL 1</p>
                        </div>
                    </div>
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
                        <form method="POST">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3" style="width: 30%;">
                        <span>NIS</span>
                    </div>
                    <div class="col-3" style="width: 40%;">
                        <form method="POST">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3" style="width: 30%;">
                        <span>Jenis Kelamin</span>
                    </div>
                    <div class="col-3" style="width: 40%;">
                        <form method="POST">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                                <button href="#" class="input-group-text" style="border-color: rgba(168, 168, 168, 1);"><i class="bi bi-caret-down-fill"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3" style="width: 30%;">
                        <span>Tempat, Tanggal Lahir</span>
                    </div>
                    <div class="col-3" style="width: 40%;">
                        <form method="POST">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                            </div>
                        </form>
                    </div>
                    <div class="col-3">
                        <form method="POST">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                                <button class="input-group-text" style="border-color: rgba(168, 168, 168, 1);"><i class="bi bi-calendar-event"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3" style="width: 30%;">
                        <span>Telepon/HP</span>
                    </div>
                    <div class="col-3" style="width: 40%;">
                        <form method="POST">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3" style="width: 30%;">
                        <span>E-mail</span>
                    </div>
                    <div class="col-3" style="width: 40%;">
                        <form method="POST">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="border-color: rgba(168, 168, 168, 1);">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3" style="width: 30%;">
                        <span>Alamat Lengkap</span>
                    </div>
                    <div class="col">
                        <form method="POST">
                            <div class="input-group">
                                <input id="nama" type="nama" class="form-control" style="height: 150px; border-color: rgba(168, 168, 168, 1);">
                            </div>
                        </form>
                    </div>
                </div>
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
                <div class="row">
                    <div class="col">
                        <div class="persegi">
                            <p class="text-white">Semester Siswa</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="persegi2">
                            <p class="text-white">X RPL 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>