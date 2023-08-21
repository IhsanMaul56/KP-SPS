<div class="row m-0">
    <div class="grid-kiri p-0">
        <center>
            <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid" alt="logo smk" height="90" width="90" style="margin-top: 30px; margin-bottom: 20px;">
            <br><h5 class="text-white" style="margin-bottom: 50px;"><b>SMK SANGKURIANG <br> 1 CIMAHI</b></h5>
        </center>
        <div class="col">
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
