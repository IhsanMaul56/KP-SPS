<div class="row m-0">
    <div class="grid-kiri p-0 text-center">
            <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid" alt="logo smk" height="90" width="90" style="margin-top: 30px; margin-bottom: 20px;">
            <br><h5 class="text-white mb-2 fw-bold">SMK SANGKURIANG <br> 1 CIMAHI</h5>
        <div class="col">
            @if (Auth::user()->role == 'admin')
                <div class="row ms-5">
                    <span class="sidebar active my-5 fs-4" id="btnPage1"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-5 fs-4 mt-auto" id="btnPage2"><i class="bi bi-house fs-4 me-2"></i>Siswa</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-5 fs-4 mt-auto" id="btnPage3"><i class="bi bi-house fs-4 me-2"></i>Nilai</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-5 fs-4 mt-auto" id="btnPage4"><i class="bi bi-house fs-4 me-2"></i>Nilai</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-5 fs-4 mt-auto" id="btnPage5"><i class="bi bi-house fs-4 me-2"></i>Nilai</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-5 fs-4 mt-auto" id="btnPage6"><i class="bi bi-house fs-4 me-2"></i>Nilai</span><br>
                </div>
            @elseif (Auth::user()->role == 'kurikulum')
                <div class="row ms-5">
                    <span class="sidebar active my-5 fs-4" id="btnPage1"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-5 fs-4 mt-auto" id="btnPage2"><i class="bi bi-house fs-4 me-2"></i>Siswa</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-5 fs-4 mt-auto" id="btnPage3"><i class="bi bi-house fs-4 me-2"></i>Nilai</span><br>
                </div>
            @elseif (Auth::user()->role == 'guru')
                <div class="row ms-5">
                    <span class="sidebar active my-5 fs-4" id="btnPage1"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-5 fs-4 mt-auto" id="btnPage2"><i class="bi bi-house fs-4 me-2"></i>Siswa</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-5 fs-4 mt-auto" id="btnPage3"><i class="bi bi-house fs-4 me-2"></i>Nilai</span><br>
                </div>
            @elseif (Auth::user()->role == 'siswa')
                <div class="row ms-5">
                    <span class="sidebar active my-5 fs-4" id="btnPage1"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-5 fs-4 mt-auto" id="btnPage2"><i class="bi bi-house fs-4 me-2"></i>Siswa</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-5 fs-4 mt-auto" id="btnPage3"><i class="bi bi-house fs-4 me-2"></i>Nilai</span><br>
                </div>
            @endif
            <div class="row exit">
                <a href="/logout"><span class="btn btn-danger rounded-pill my-5 text-white fs-4 mt-auto px-4"><i class="bi bi-box-arrow-right fs-4 ps-2 me-2"></i>Keluar</span></a>
            </div>
                <div>
                    <ul class="nav nav-pills flex-column mt-2 mt-sm-0" id="menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link" aria-current="page">
                                <i class="fa fa-home"></i><span class="ms-2">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav nav-item">
                            <a href="#" class="nav-link" aria-current="page">
                                <i class="fas fa-clipboard"></i>
                                <span class="ms-2">Nilai</span>
                            </a>
                        </li>
                        <li class="nav nav-item">
                            <a href="#" class="nav-link" aria-current="page">
                                <i class="fas fa-user-tie"></i>
                                <span class="ms-2">Kelola Data Guru</span>
                            </a>
                        </li>
                    </ul>
                </div>
            @if(Auth::user()->role == 'kurikulum')
                    <span class="btn btn-primary"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                    <span class="btn btn-primary">Admin</span><br>
                    <span class="btn btn-primary">Nilai</span><br>
            @elseif (Auth::user()->role == 'kurikulum')
                    <span class="btn btn-primary"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                    <span class="btn btn-primary">Kurikulum</span><br>
                    <span class="btn btn-primary">Nilai</span><br>
            @elseif (Auth::user()->role == 'guru')
            <div class="row">
                <span class="sidebar active"><i class="bi bi-house-door" style="margin-left: 20px; margin-right: 15px; font-size: 30px;"></i>Beranda</span><br>
            </div>
            <div class="row">
                <span class="sidebar"><i class="bi bi-person-circle" style="margin-left: 20px; margin-right: 15px; font-size: 30px;"></i>Data Siswa</span><br>
            </div>
            <div class="row">
                <span class="sidebar"><i class="bi bi-clipboard-minus" style="margin-left: 20px; margin-right: 15px; font-size: 30px;"></i>Data Kelas</span><br>
            </div>
            @elseif (Auth::user()->role == 'siswa')
                <div class="row">
                    <span class="sidebar active"><i class="bi bi-house-door" style="margin-left: 20px; margin-right: 15px; font-size: 30px;"></i>Beranda</span><br>
                </div>
                <div class="row">
                    <span class="sidebar"><i class="bi bi-person-circle" style="margin-left: 20px; margin-right: 15px; font-size: 30px;"></i>Siswa</span><br>
                </div>
                <div class="row">
                    <span class="sidebar"><i class="bi bi-clipboard-minus" style="margin-left: 20px; margin-right: 15px; font-size: 30px;"></i>Nilai</span><br>
                </div>
            @endif
        </div>
        <div class="row mx-0">
            <a href="/logout" class="exit" style="text-decoration: none;"><i class="bi bi-box-arrow-right" style="margin-left: 20px; margin-right: 15px; font-size: 30px;"></i>Keluar</a>
        </div>
    </div>
