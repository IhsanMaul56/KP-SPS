<div class="row m-0 h-100 overflow-auto">
    <div class="grid-kiri p-0 text-center">
        <img src="{{ URL::asset('/img/logosmk1@2x.png') }}" class="img-fluid" alt="logo smk" height="120" width="120"
            style="margin-top: 20px; margin-bottom: 10px;">
        <br>
        <h5 class="text-white fw-bold" style="margin-bottom: 0px;">SMK SANGKURIANG <br> 1 CIMAHI</h5>
        <div class="col sedbar" style="margin-top: 40px">
            @if (Auth::user()->role == 'admin')
                <div class="row mx-0">
                    <a href="{{ route('beranda-admin') }}" id="btnBerandaAdmin"
                        class="sidebar {{ Request::is('dashboard/admin') ? 'active' : '' }}"
                        style="text-decoration: none"><i class="bi bi-house-door icon-kiri"></i>Beranda</a><br>
                </div>
                <div class="row mx-0">
                    <span
                        class="sidebar dropdown-toggle {{ Request::is('dashboard/guru-wali') ? 'active' : '' }} {{ Request::is('dashboard/guru-mapel') ? 'active' : '' }} {{ Request::is('dashboard/guru-master') ? 'active' : '' }}"
                        data-bs-toggle="collapse" data-bs-target="#DataGuru" aria-expanded="false"><i
                            class="bi bi-person-vcard icon-kiri"></i>Data Guru</span>
                    <div class="row mx-0 collapse" id="DataGuru">
                        <a href="{{ route('data-walis') }}" class="sidebar dd-kiri fs-5"
                            style="text-decoration: none">Guru Wali</a>
                        <a href="{{ route('data-mapels') }}" class="sidebar dd-kiri fs-5"
                            style="text-decoration: none">Guru Mapel</a>
                        <a href="{{ route('master-guru') }}" class="sidebar dd-kiri fs-5"
                            style="text-decoration: none">Master Guru</a>
                    </div>
                    <br>
                </div>
                <div class="row mx-0">
                    <a href="{{ route('siswa-kurikulum') }}"
                        class="sidebar fs-5 {{ Request::is('dashboard/data-siswa') ? 'active' : '' }} {{ Request::is('dashboard/admin/tambah-siswa') ? 'active' : '' }}"
                        style="text-decoration: none"><i class="bi bi-person-lines-fill icon-kiri"></i>Data
                        Siswa</a><br>
                </div>
                <div class="row mx-0">
                    <span
                        class="sidebar dropdown-toggle {{ Request::is('dashboard/jadwal-pelajaran') ? 'active' : '' }} {{ Request::is('dashboard/jurusan') ? 'active' : '' }} {{ Request::is('dashboard/admin/kelas') ? 'active' : '' }}"
                        data-bs-toggle="collapse" data-bs-target="#Akademik" aria-expanded="false"><i
                            class="bi bi-clipboard2-minus icon-kiri"></i>Akademik</span>
                    <div class="row mx-0 collapse" id="Akademik">
                        <a href="{{ route('m-jadwal') }}" class="sidebar dd-kiri fs-5 ling  ">Jadwal Mapel</a>
                        <a href="{{ route('m-jurusan') }}" class="sidebar dd-kiri fs-5 ling">Jurusan</a>
                        <a href="{{ route('data-kelas') }}" class="sidebar dd-kiri fs-5 ling">Kelas</a>
                        <a href="{{ route('master-mapel') }}" class="sidebar dd-kiri fs-5 ling">Mapel</a>
                        <a href="{{ route('atur-tasem') }}" class="sidebar ling dd-kiri fs-5">Aktivasi<br>Semester</a>
                    </div>
                    <br>
                </div>
                {{-- <div class="row mx-0">
                    <span class="sidebar dropdown-toggle {{ Request::is('dashboard/admin/set-tp') ? 'active' : ''}}" data-bs-toggle="collapse" data-bs-target="#DataNilai" aria-expanded="false"><i class="bi bi-clipboard2-data icon-kiri"></i>Formatif</span>
                    <div class="row mx-0 collapse" id="DataNilai">
                        <a href="{{ route('cek-tp') }}" class="ling dd-kiri sidebar fs-5">TP</a>
                        <a href="{{ route('cek-atp') }}" class="ling dd-kiri sidebar fs-5">ATP</a>
                    </div>
                    <br>
                </div> --}}
                {{-- <div class="row mx-0">
                    <a href="#" class="sidebar" style="text-decoration: none"><i
                            class="bi bi-person-circle icon-kiri"></i>Akun</a><br>
                </div> --}}
                {{-- <div class="row mx-0">
                    <a href="{{ route('show-pengumuman') }}"
                        class="sidebar {{ Request::is('dashboard/admin/pengumuman') ? 'active' : '' }}"
                        style="text-decoration: none"><i class="bi bi-megaphone icon-kiri"></i>Pusat Informasi</a><br>
                </div> --}}

            @elseif (Auth::user()->role == 'kurikulum')
                <div class="row mx-0">
                    <a href="{{ route('beranda-kurikulum') }}" id="btnBerandaKurikulum" class="sidebar"
                        style="text-decoration: none"><i class="bi bi-house-door icon-kiri"></i>Beranda</a><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#DataGuru"
                        aria-expanded="false"><i class="bi bi-person-vcard icon-kiri"></i>Data Guru</span>
                    <div class="row mx-0 collapse" id="DataGuru">
                        <a href="{{ route('data-walis') }}" class="sidebar dd-kiri fs-5"
                            style="text-decoration: none">Guru Wali</a>
                        <a href="{{ route('data-mapels') }}" class="sidebar dd-kiri fs-5"
                            style="text-decoration: none">Guru Mapel</a>
                        <a href="{{ route('master-guru') }}" class="sidebar dd-kiri fs-5"
                            style="text-decoration: none">Master Guru</a>
                    </div>
                    <br>
                </div>
                <div class="row mx-0">
                    <a href="{{ route('siswa-kurikulum') }}" class="sidebar fs-5" style="text-decoration: none"><i
                            class="bi bi-person-lines-fill icon-kiri"></i>Data Siswa</a><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#Akademik"
                        aria-expanded="false"><i class="bi bi-clipboard2-minus icon-kiri"></i>Akademik</span>
                    <div class="row mx-0 collapse" id="Akademik">
                        <a href="{{ route('m-jadwal') }}" class="sidebar dd-kiri fs-5"
                            style="text-decoration:none">Jadwal Mapel</a>
                        <a href="{{ route('m-jurusan') }}" class="sidebar dd-kiri fs-5"
                            style="text-decoration:none">Jurusan</a>
                        <a href="{{ route('m-kelas') }}" class="sidebar dd-kiri fs-5"
                            style="text-decoration:none">Kelas</a>
                    </div>
                    <br>
                </div>
                <div class="row mx-0">
                    <a href="{{ route('nilai-gurus') }}" id="btnDataNilaiGuru" class="sidebar"
                        style="text-decoration: none"><i class="bi bi-journal-text icon-kiri"></i>Data Nilai</a><br>
                </div>
                <div class="row mx-0">
                    <a href="{{ route('profile-guru') }}" class="sidebar" style="text-decoration: none"><i
                            class="bi bi-person-circle icon-kiri"></i>Profil</a><br>
                </div>
                <div class="row mx-0">
                    <a href="{{ route('create-pengumuman') }}" class="sidebar {{ Request::is('dashboard/pengumuman') ? 'active' : ''}}" style="text-decoration: none"><i class="bi bi-megaphone icon-kiri"></i>Pusat Informasi</a><br>
                </div>

            @elseif (Auth::user()->role == 'guru')
                <div class="row mx-0">
                    <a href="{{ route('beranda-guru') }}" id="btnBerandaGuru" class="sidebar"
                        style="text-decoration: none"><i class="bi bi-house-door icon-kiri"></i>Beranda</a><br>
                </div>
                <div class="row mx-0">
                    <a href="{{ route('nilai-gurus') }}" id="btnDataNilaiGuru" class="sidebar"
                        style="text-decoration: none"><i class="bi bi-journal-text icon-kiri"></i>Data Nilai</a><br>
                </div>
                <div class="row mx-0">
                    <a href="{{ route('nilai-walis') }}" class="sidebar" style="text-decoration: none"><i
                            class="bi bi-journal-richtext icon-kiri"></i>Data Wali</a>
                    <br>
                </div>
                <div class="row mx-0">
                    <a href="{{ route('show-pengumuman') }}"
                        class="sidebar {{ Request::is('dashboard/admin/pengumuman') ? 'active' : '' }}"
                        style="text-decoration: none"><i class="bi bi-megaphone icon-kiri"></i>Pusat Informasi</a><br>
                </div>
                <div class="row mx-0">
                    <a href="{{ route('profile-guru') }}" class="sidebar" id="btnGuru4"
                        style="text-decoration: none" style="text-decoration: none"><i
                            class="bi bi-person-circle icon-kiri"></i>Profil</a><br>
                    <a href="{{ route('show_pengumuman') }}" class="sidebar {{ Request::is('dashboard/pengumuman') ? 'active' : ''}}" style="text-decoration: none"><i class="bi bi-megaphone icon-kiri"></i>Pusat Informasi</a><br>
                </div>

            @elseif (Auth::user()->role == 'siswa')
                <div class="row mx-0">
                    <a href="{{ route('beranda') }}" id="home" class="sidebar"
                        style="text-decoration: none"><i class="bi bi-house-door icon-kiri"></i>Beranda</a><br>
                </div>
                <div class="row mx-0">
                    <a href="{{ route('nilai-siswa') }}" id="nilai" class="sidebar"
                        style="text-decoration: none"><i class="bi bi-clipboard-minus icon-kiri"></i>Nilai</a><br>
                </div>
                <div class="row mx-0">
                    <a href="{{ route('profile-siswa') }}" class="sidebar" id="profile"
                        style="text-decoration: none"><i class="bi bi-person-circle icon-kiri"></i>Profil</a>
                </div>
            @endif
        </div>
        <div class="row mx-0">
            <a href="/logout" class="exit" style="text-decoration: none;"><i
                    class="bi bi-box-arrow-right icon-kiri"></i>Keluar</a>
        </div>
    </div>
