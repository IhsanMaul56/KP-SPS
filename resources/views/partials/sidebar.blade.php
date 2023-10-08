<div class="row m-0">
    <div class="grid-kiri p-0 text-center">
    <img src="{{URL::asset('/img/logosmk1@2x.png')}}" class="img-fluid" alt="logo smk" height="120" width="120" style="margin-top: 20px; margin-bottom: 10px;">
            <br><h5 class="text-white fw-bold" style="margin-bottom: 0px;">SMK SANGKURIANG <br> 1 CIMAHI</h5>
        <div class="col sedbar" style="margin-top: 40px">
            @if (Auth::user()->role == 'admin')
                <div class="row mx-0">
                    <a href="{{ route('beranda') }}" id="btnBerandaAdmin" class="sidebar active" style="text-decoration: none"><i class="bi bi-house-door icon-kiri"></i>Beranda</a><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#DataGuru" aria-expanded="false"><i class="bi bi-person-vcard icon-kiri"></i>Data Guru</span>
                    <div class="row mx-0 collapse" id="DataGuru">
                        <span class="sidebar dd-kiri fs-5" id="btnGuruWaliAdmin">Guru Wali</span>
                        <span class="sidebar dd-kiri fs-5" id="btnGuruMapelAdmin">Guru Mapel</span>
                        <span class="sidebar dd-kiri fs-5" id="btnMasterGuruAdmin">Master Guru</span>
                    </div>
                    <br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnDataSiswaAdmin"><i class="bi bi-person-lines-fill icon-kiri"></i>Data Siswa</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#Akademik" aria-expanded="false"><i class="bi bi-clipboard2-minus icon-kiri"></i>Akademik</span>
                    <div class="row mx-0 collapse" id="Akademik">
                        <span class="sidebar dd-kiri fs-5" id="btnJadwalMapelAdmin">Jadwal Mapel</span>
                        <span class="sidebar dd-kiri fs-5" id="btnJurusanAdmin">Jurusan</span>
                        <span class="sidebar dd-kiri fs-5" id="btnKelasAdmin">Kelas</span>
                    </div>
                    <br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#DataNilai" aria-expanded="false"><i class="bi bi-clipboard2-data icon-kiri"></i>Data Nilai</span>
                    <div class="row mx-0 collapse" id="DataNilai">
                        <span class="sidebar dd-kiri fs-5" id="btnNilaiMapelAdmin">Nilai Mapel</span>
                        <span class="sidebar dd-kiri fs-5" id="btnRaporAdmin">Rapor</span>
                    </div>
                    <br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnProfilAdmin"><i class="bi bi-person-circle icon-kiri"></i>Profil</span><br>
                </div>

            @elseif (Auth::user()->role == 'kurikulum')
                <div class="row mx-0">
                    <a href="{{ route('beranda') }}" id="btnAdmin1" class="sidebar active" style="text-decoration: none"><i class="bi bi-house-door icon-kiri"></i>Beranda</a><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#DataGuru" aria-expanded="false"><i class="bi bi-person-vcard icon-kiri"></i>Data Guru</span>
                    <div class="row mx-0 collapse" id="DataGuru">
                        <span class="sidebar dd-kiri fs-5" id="btnGuruWaliKurikulum">Guru Wali</span>
                        <span class="sidebar dd-kiri fs-5" id="btnGuruMapelKurikulum">Guru Mapel</span>
                        <span class="sidebar dd-kiri fs-5" id="btnMasterGuruKurikulum">Master Guru</span>
                    </div>
                    <br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnDataSiswaKurikulum"><i class="bi bi-person-lines-fill icon-kiri"></i>Data Siswa</span><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#Akademik" aria-expanded="false"><i class="bi bi-clipboard2-minus icon-kiri"></i>Akademik</span>
                    <div class="row mx-0 collapse" id="Akademik">
                        <span class="sidebar dd-kiri fs-5" id="btnJadwalMapelKurikulum">Jadwal Mapel</span>
                        <span class="sidebar dd-kiri fs-5" id="btnJurusanKurikulum">Jurusan</span>
                        <span class="sidebar dd-kiri fs-5" id="btnKelasKurikulum">Kelas</span>
                    </div>
                    <br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnProfilKurikulum"><i class="bi bi-person-circle icon-kiri"></i>Profil</span><br>
                </div>

            @elseif (Auth::user()->role == 'guru')
                <div class="row mx-0">
                    <a href="{{ route('beranda') }}" id="btnGuru1" class="sidebar active" style="text-decoration: none"><i class="bi bi-house-door icon-kiri"></i>Beranda</a><br>
                </div>
                <div class="row mx-0">
                    <a href="#" id="btnGuru2" class="sidebar" style="text-decoration: none"><i class="bi bi-journal-text icon-kiri"></i>Data Nilai</a><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnDataKelasGuru"><i class="bi bi-journal-richtext icon-kiri"></i>Data Kelas</span><br>
                </div>
                <div class="row mx-0">
                    <a href="#" class="sidebar" id="btnGuru4" style="text-decoration: none"><i class="bi bi-person-circle icon-kiri"></i>Profil</a><br>
                </div>

            @elseif (Auth::user()->role == 'siswa')
                <div class="row mx-0">
                    <a href="{{ route('beranda') }}" id="btnSiswa1" class="sidebar active" style="text-decoration: none"><i class="bi bi-house-door icon-kiri"></i>Beranda</a><br>
                </div>
                <div class="row mx-0">
                    <span class="sidebar" id="btnNilaiSiswa"><i class="bi bi-clipboard-minus icon-kiri"></i>Nilai</span><br>
                </div>
                <div class="row mx-0">
                    <a href="{{ route('profile-siswa') }}" class="sidebar" id="btnSiswa3" style="text-decoration: none"><i class="bi bi-person-circle icon-kiri"></i>Profil</a>
                </div>
            @endif
        </div>
        <div class="row mx-0">
            <a href="/logout" class="exit" style="text-decoration: none;"><i class="bi bi-box-arrow-right keluar"></i>Keluar</a>
        </div>
    </div>