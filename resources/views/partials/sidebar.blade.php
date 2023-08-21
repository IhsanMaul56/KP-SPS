<div class="row">
    <div class="grid-kiri text-center">
        {{-- <center> --}}
            <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid mt-4 mb-3" alt="logo smk" height="125" width="125">
            <br><h4 class="text-white"><b>SMK SANGKURIANG <br> 1 CIMAHI</b></h4>
        {{-- </center> --}}
        <div class="col text-center mt-5">
            @if (Auth::user()->role == 'admin')
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
                    <span class="btn btn-primary"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                    <span class="btn btn-primary">Admin</span><br>
                    <span class="btn btn-primary">Nilai</span><br>
                    {{-- <a href="/logout"><span class="btn btn-danger rounded-pill">Keluar</span></a> --}}
            @elseif (Auth::user()->role == 'kurikulum')
                    <span class="btn btn-primary"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                    <span class="btn btn-primary">Kurikulum</span><br>
                    <span class="btn btn-primary">Nilai</span><br>
                    {{-- <a href="/logout"><span class="btn btn-danger rounded-pill">Keluar</span></a> --}}
            @elseif (Auth::user()->role == 'guru')
                    <span class="btn btn-primary"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                    <span class="btn btn-primary">Guru</span><br>
                    <span class="btn btn-primary">Nilai</span><br>
                    {{-- <a href="/logout"><span class="btn btn-danger rounded-pill">Keluar</span></a> --}}
            @elseif (Auth::user()->role == 'siswa')
                <div class="row ms-5">
                    <span class="sidebar active my-5 fs-4"><i class="bi bi-house fs-4 me-2"></i>Beranda</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-5 fs-4 mt-auto"><i class="bi bi-house fs-4 me-2"></i>Siswa</span><br>
                </div>
                <div class="row ms-5">
                    <span class="sidebar my-5 fs-4 mt-auto"><i class="bi bi-house fs-4 me-2"></i>Nilai</span><br>
                </div>
            @endif
        </div>
        <div class="row align-items-end exit">
            <a href="/logout"><span class="btn btn-danger rounded-pill my-5 text-white fs-4 mt-auto px-4"><i class="bi bi-box-arrow-right fs-4 ps-2 me-2"></i>Keluar</span></a>
        </div>
    </div>
