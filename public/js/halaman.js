// Role Siswa
const btnBerandaSiswa = document.getElementById('btnBerandaSiswa');
const btnNilaiSiswa = document.getElementById('btnNilaiSiswa');
const btnProfilSiswa = document.getElementById('btnProfilSiswa');

const BerandaSiswa = document.getElementById('BerandaSiswa');
const NilaiSiswa = document.getElementById('NilaiSiswa');
const ProfilSiswa = document.getElementById('ProfilSiswa');
const PengumumanSiswa = document.getElementById('PengumumanSiswa');
const FotoSiswa = document.getElementById('FotoSiswa');

var userRole = 'siswa';
document.addEventListener("DOMContentLoaded", function() {
    if(userRole === 'siswa'){

        let activePage = BerandaSiswa; // Menyimpan halaman yang sedang aktif

        btnBerandaSiswa.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = BerandaSiswa; // Memperbarui halaman yang sedang aktif
            BerandaSiswa.classList.add('active-page');
            PengumumanSiswa.classList.add('active-page');
        });

        btnNilaiSiswa.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = NilaiSiswa; // Memperbarui halaman yang sedang aktif
            NilaiSiswa.classList.add('active-page');
            PengumumanSiswa.classList.add('active-page');
        });

        btnProfilSiswa.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = ProfilSiswa; // Memperbarui halaman yang sedang aktif
            ProfilSiswa.classList.add('active-page');
            FotoSiswa.classList.add('active-page');
        });

        function resetPage(page) {
            page.classList.remove('active-page'); // Menghapus kelas 'active-page' dari halaman yang diberikan
            PengumumanSiswa.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar1
            FotoSiswa.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar2
        }
    }
});

// Role Kurikulum
const btnBerandaKurikulum = document.getElementById('btnBerandaKurikulum');
const btnGuruWaliKurikulum = document.getElementById('btnGuruWaliKurikulum');
const btnGuruMapelKurikulum = document.getElementById('btnGuruMapelKurikulum');
const btnMasterGuruKurikulum = document.getElementById('btnMasterGuruKurikulum');
const btnDataSiswaKurikulum = document.getElementById('btnDataSiswaKurikulum');
const btnJadwalMapelKurikulum = document.getElementById('btnJadwalMapelKurikulum');
const btnJurusanKurikulum = document.getElementById('btnJurusanKurikulum');
const btnKelasKurikulum = document.getElementById('btnKelasKurikulum');
const btnProfilKurikulum = document.getElementById('btnProfilKurikulum');

const BerandaKurikulum = document.getElementById('BerandaKurikulum');
const GuruWaliKurikulum = document.getElementById('GuruWaliKurikulum');
const GuruMapelKurikulum = document.getElementById('GuruMapelKurikulum');
const MasterGuruKurikulum = document.getElementById('MasterGuruKurikulum');
const DataSiswaKurikulum = document.getElementById('DataSiswaKurikulum');
const JadwalMapelKurikulum = document.getElementById('JadwalMapelKurikulum');
const JurusanKurikulum = document.getElementById('JurusanKurikulum');
const KelasKurikulum = document.getElementById('KelasKurikulum');
const ProfilKurikulum = document.getElementById('ProfilKurikulum');
const PengumumanKurikulum = document.getElementById('PengumumanKurikulum');
const FotoKurikulum = document.getElementById('FotoKurikulum');

var userRole2 = 'kurikulum';
document.addEventListener("DOMContentLoaded", function() {
    if(userRole2 === 'kurikulum'){

        let activePage = BerandaKurikulum; // Menyimpan halaman yang sedang aktif

        btnBerandaKurikulum.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = BerandaKurikulum; // Memperbarui halaman yang sedang aktif
            BerandaKurikulum.classList.add('active-page');
            PengumumanKurikulum.classList.add('active-page');
        });

        btnGuruWaliKurikulum.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = GuruWaliKurikulum; // Memperbarui halaman yang sedang aktif
            GuruWaliKurikulum.classList.add('active-page');
            PengumumanKurikulum.classList.add('active-page');
        });

        btnGuruMapelKurikulum.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = GuruMapelKurikulum; // Memperbarui halaman yang sedang aktif
            GuruMapelKurikulum.classList.add('active-page');
            PengumumanKurikulum.classList.add('active-page');
        });

        btnMasterGuruKurikulum.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = MasterGuruKurikulum; // Memperbarui halaman yang sedang aktif
            MasterGuruKurikulum.classList.add('active-page');
            PengumumanKurikulum.classList.add('active-page');
        });

        btnDataSiswaKurikulum.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = DataSiswaKurikulum; // Memperbarui halaman yang sedang aktif
            DataSiswaKurikulum.classList.add('active-page');
            PengumumanKurikulum.classList.add('active-page');
        });

        btnJadwalMapelKurikulum.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = JadwalMapelKurikulum; // Memperbarui halaman yang sedang aktif
            JadwalMapelKurikulum.classList.add('active-page');
            PengumumanKurikulum.classList.add('active-page');
        });

        btnJurusanKurikulum.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = JurusanKurikulum; // Memperbarui halaman yang sedang aktif
            JurusanKurikulum.classList.add('active-page');
            PengumumanKurikulum.classList.add('active-page');
        });

        btnKelasKurikulum.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = KelasKurikulum; // Memperbarui halaman yang sedang aktif
            KelasKurikulum.classList.add('active-page');
            PengumumanKurikulum.classList.add('active-page');
        });

        btnProfilKurikulum.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = ProfilKurikulum; // Memperbarui halaman yang sedang aktif
            ProfilKurikulum.classList.add('active-page');
            FotoKurikulum.classList.add('active-page');
        });

        function resetPage(page) {
            page.classList.remove('active-page'); // Menghapus kelas 'active-page' dari halaman yang diberikan
            PengumumanKurikulum.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar1
            FotoKurikulum.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar2
        }
    }
});

// Role Admin
const btnBerandaAdmin = document.getElementById('btnBerandaAdmin');
const btnGuruWaliAdmin = document.getElementById('btnGuruWaliAdmin');
const btnGuruMapelAdmin = document.getElementById('btnGuruMapelAdmin');
const btnMasterGuruAdmin = document.getElementById('btnMasterGuruAdmin');
const btnDataSiswaAdmin = document.getElementById('btnDataSiswaAdmin');
const btnJadwalMapelAdmin = document.getElementById('btnJadwalMapelAdmin');
const btnJurusanAdmin = document.getElementById('btnJurusanAdmin');
const btnKelasAdmin = document.getElementById('btnKelasAdmin');
const btnNilaiMapelAdmin = document.getElementById('btnNilaiMapelAdmin');
const btnRaporAdmin = document.getElementById('btnRaporAdmin');
const btnProfilAdmin = document.getElementById('btnProfilAdmin');

const BerandaAdmin = document.getElementById('BerandaAdmin');
const GuruWaliAdmin = document.getElementById('GuruWaliAdmin');
const GuruMapelAdmin = document.getElementById('GuruMapelAdmin');
const MasterGuruAdmin = document.getElementById('MasterGuruAdmin');
const DataSiswaAdmin = document.getElementById('DataSiswaAdmin');
const JadwalMapelAdmin = document.getElementById('JadwalMapelAdmin');
const JurusanAdmin = document.getElementById('JurusanAdmin');
const KelasAdmin = document.getElementById('KelasAdmin');
const NilaiMapelAdmin = document.getElementById('NilaiMapelAdmin');
const RaporAdmin = document.getElementById('RaporAdmin');
const ProfilAdmin = document.getElementById('ProfilAdmin');
const PengumumanAdmin = document.getElementById('PengumumanAdmin');
const FotoAdmin = document.getElementById('FotoAdmin');

var userRole3 = 'admin';
document.addEventListener("DOMContentLoaded", function() {
    if(userRole3 === 'admin'){

        let activePage = BerandaAdmin; // Menyimpan halaman yang sedang aktif

        btnBerandaAdmin.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = BerandaAdmin; // Memperbarui halaman yang sedang aktif
            BerandaAdmin.classList.add('active-page');
            PengumumanAdmin.classList.add('active-page');
        });

        btnGuruWaliAdmin.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = GuruWaliAdmin; // Memperbarui halaman yang sedang aktif
            GuruWaliAdmin.classList.add('active-page');
            PengumumanAdmin.classList.add('active-page');
        });

        btnGuruMapelAdmin.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = GuruMapelAdmin; // Memperbarui halaman yang sedang aktif
            GuruMapelAdmin.classList.add('active-page');
            PengumumanAdmin.classList.add('active-page');
        });

        btnMasterGuruAdmin.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = MasterGuruAdmin; // Memperbarui halaman yang sedang aktif
            MasterGuruAdmin.classList.add('active-page');
            PengumumanAdmin.classList.add('active-page');
        });

        btnDataSiswaAdmin.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = DataSiswaAdmin; // Memperbarui halaman yang sedang aktif
            DataSiswaAdmin.classList.add('active-page');
            PengumumanAdmin.classList.add('active-page');
        });

        btnJadwalMapelAdmin.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = JadwalMapelAdmin; // Memperbarui halaman yang sedang aktif
            JadwalMapelAdmin.classList.add('active-page');
            PengumumanAdmin.classList.add('active-page');
        });

        btnJurusanAdmin.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = JurusanAdmin; // Memperbarui halaman yang sedang aktif
            JurusanAdmin.classList.add('active-page');
            PengumumanAdmin.classList.add('active-page');
        });

        btnKelasAdmin.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = KelasAdmin; // Memperbarui halaman yang sedang aktif
            KelasAdmin.classList.add('active-page');
            PengumumanAdmin.classList.add('active-page');
        });

        btnNilaiMapelAdmin.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = NilaiMapelAdmin; // Memperbarui halaman yang sedang aktif
            NilaiMapelAdmin.classList.add('active-page');
            PengumumanAdmin.classList.add('active-page');
        });

        btnRaporAdmin.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = RaporAdmin; // Memperbarui halaman yang sedang aktif
            RaporAdmin.classList.add('active-page');
            PengumumanAdmin.classList.add('active-page');
        });

        btnProfilAdmin.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = ProfilAdmin; // Memperbarui halaman yang sedang aktif
            ProfilAdmin.classList.add('active-page');
            FotoAdmin.classList.add('active-page');
        });
        
        function resetPage(page) {
            page.classList.remove('active-page'); // Menghapus kelas 'active-page' dari halaman yang diberikan
            PengumumanAdmin.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar1
            FotoAdmin.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar2
        }
    }
});

// Role Guru
const btnGuru1 = document.getElementById('btnGuru1');
const btnGuru2 = document.getElementById('btnGuru2');
const btnGuru3 = document.getElementById('btnGuru3');
const btnGuru4 = document.getElementById('btnGuru4');

const guru1 = document.getElementById('guru1');
const guru2 = document.getElementById('guru2');
const guru3 = document.getElementById('guru3');
const guru4 = document.getElementById('guru4');
const rightguru1 = document.getElementById('rightguru1');
const rightguru2 = document.getElementById('rightguru2');

var userRole4 = 'guru';
document.addEventListener("DOMContentLoaded", function() {
    if(userRole4 === 'guru'){

        let activePage = guru1; // Menyimpan halaman yang sedang aktif

        btnGuru1.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = guru1; // Memperbarui halaman yang sedang aktif
            guru1.classList.add('active-page');
            rightguru1.classList.add('active-page');
        });

        btnGuru2.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = guru2; // Memperbarui halaman yang sedang aktif
            guru2.classList.add('active-page');
            rightguru1.classList.add('active-page');
        });

        btnGuru3.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = guru3; // Memperbarui halaman yang sedang aktif
            guru3.classList.add('active-page');
            rightguru1.classList.add('active-page');
        });

        btnGuru4.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = guru4; // Memperbarui halaman yang sedang aktif
            guru4.classList.add('active-page');
            rightguru2.classList.add('active-page');
        });
        
        function resetPage(page) {
            page.classList.remove('active-page'); // Menghapus kelas 'active-page' dari halaman yang diberikan
            rightguru1.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar1
            rightguru2.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar2
        }
    }
});