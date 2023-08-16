<div class="row">
    <div class="grid-kiri">
        <center>
            <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid mt-4 mb-3" alt="logo smk" height="90" width="90">
            <br><h5 class="text-white"><b>SMK SANGKURIANG <br> 1 CIMAHI</b></h5>
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
                <center>
                    <span class="btn btn-primary"><i class="fa-brands fa-bootstrap"></i>Beranda</span><br>
                    <span class="btn btn-primary">Admin</span><br>
                    <span class="btn btn-primary">Nilai</span><br>
                    <a href="/logout"><span class="btn btn-danger">Logout</span></a>
                </center>
            @elseif (Auth::user()->role == 'kurikulum')
                <center>
                    <span class="btn btn-primary"><i class="fa-brands fa-bootstrap"></i>Beranda</span><br>
                    <span class="btn btn-primary">Kurikulum</span><br>
                    <span class="btn btn-primary">Nilai</span><br>
                    <a href="/logout"><span class="btn btn-danger">Logout</span></a>
                </center>
            @elseif (Auth::user()->role == 'guru')
                <center>
                    <span class="btn btn-primary"><i class="fa-brands fa-bootstrap"></i>Beranda</span><br>
                    <span class="btn btn-primary">Guru</span><br>
                    <span class="btn btn-primary">Nilai</span><br>
                    <a href="/logout"><span class="btn btn-danger">Logout</span></a>
                </center>
            @elseif (Auth::user()->role == 'siswa')
                <center>
                <span class="btn btn-primary"><i class="fa-brands fa-bootstrap"></i>Beranda</span><br>
                <span class="btn btn-primary">Siswa</span><br>
                <span class="btn btn-primary">Nilai</span><br>
                <a href="/logout"><span class="btn btn-danger">Logout</span></a>
                </center>
            @endif
        </div>
    </div>