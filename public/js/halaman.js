// Role Siswa
const btnSiswa1 = document.getElementById('btnSiswa1');
const btnSiswa2 = document.getElementById('btnSiswa2');
const btnSiswa3 = document.getElementById('btnSiswa3');

const siswa1 = document.getElementById('siswa1');
const siswa2 = document.getElementById('siswa2');
const siswa3 = document.getElementById('siswa3');
const rightbar1 = document.getElementById('rightbar1');
// const rightbar2 = document.getElementById('rightbar2');

var userRole = 'siswa';
document.addEventListener("DOMContentLoaded", function() {
    if(userRole === 'siswa'){

        let activePage = siswa1; // Menyimpan halaman yang sedang aktif

        btnSiswa1.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = siswa1; // Memperbarui halaman yang sedang aktif
            siswa1.classList.add('active-page');
            rightbar1.classList.add('active-page');
        });

        btnSiswa2.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = siswa2; // Memperbarui halaman yang sedang aktif
            siswa2.classList.add('active-page');
            rightbar1.classList.add('active-page');
        });

        btnSiswa3.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = siswa3; // Memperbarui halaman yang sedang aktif
            siswa3.classList.add('active-page');
            // rightbar2.classList.add('active-page');
        });

        function resetPage(page) {
            page.classList.remove('active-page'); // Menghapus kelas 'active-page' dari halaman yang diberikan
            rightbar1.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar1
            // rightbar2.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar2
        }
    }
});

// Role Kurikulum
const btnKurlum1 = document.getElementById('btnKurlum1');
const btnKurlum2 = document.getElementById('btnKurlum2');
const btnKurlum3 = document.getElementById('btnKurlum3');
const btnKurlum4 = document.getElementById('btnKurlum4');
const btnKurlum5 = document.getElementById('btnKurlum5');
const btnKurlum6 = document.getElementById('btnKurlum6');
const btnKurlum7 = document.getElementById('btnKurlum7');

const kurlum1 = document.getElementById('kurlum1');
const kurlum2 = document.getElementById('kurlum2');
const kurlum3 = document.getElementById('kurlum3');
const kurlum4 = document.getElementById('kurlum4');
const kurlum5 = document.getElementById('kurlum5');
const kurlum6 = document.getElementById('kurlum6');
const kurlum7 = document.getElementById('kurlum7');
const rightkurlum1 = document.getElementById('rightkurlum1');
const rightkurlum2 = document.getElementById('rightkurlum2');

var userRole2 = 'kurikulum';
document.addEventListener("DOMContentLoaded", function() {
    if(userRole2 === 'kurikulum'){

        let activePage = kurlum1; // Menyimpan halaman yang sedang aktif

        btnKurlum1.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = kurlum1; // Memperbarui halaman yang sedang aktif
            kurlum1.classList.add('active-page');
            rightkurlum1.classList.add('active-page');
        });

        btnKurlum2.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = kurlum2; // Memperbarui halaman yang sedang aktif
            kurlum2.classList.add('active-page');
            rightkurlum1.classList.add('active-page');
        });

        btnKurlum3.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = kurlum3; // Memperbarui halaman yang sedang aktif
            kurlum3.classList.add('active-page');
            rightkurlum1.classList.add('active-page');
        });

        btnKurlum4.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = kurlum4; // Memperbarui halaman yang sedang aktif
            kurlum4.classList.add('active-page');
            rightkurlum1.classList.add('active-page');
        });

        btnKurlum5.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = kurlum5; // Memperbarui halaman yang sedang aktif
            kurlum5.classList.add('active-page');
            rightkurlum1.classList.add('active-page');
        });

        btnKurlum6.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = kurlum6; // Memperbarui halaman yang sedang aktif
            kurlum6.classList.add('active-page');
            rightkurlum1.classList.add('active-page');
        });

        btnKurlum7.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = kurlum7; // Memperbarui halaman yang sedang aktif
            kurlum7.classList.add('active-page');
            rightkurlum2.classList.add('active-page');
        });

        function resetPage(page) {
            page.classList.remove('active-page'); // Menghapus kelas 'active-page' dari halaman yang diberikan
            rightkurlum1.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar1
            rightkurlum2.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar2
        }
    }
});

// Role Admin
const btnAdmin1 = document.getElementById('btnAdmin1');
const btnAdmin2 = document.getElementById('btnAdmin2');
const btnAdmin3 = document.getElementById('btnAdmin3');
const btnAdmin4 = document.getElementById('btnAdmin4');
const btnAdmin5 = document.getElementById('btnAdmin5');
const btnAdmin6 = document.getElementById('btnAdmin6');
const btnAdmin7 = document.getElementById('btnAdmin7');
const btnAdmin8 = document.getElementById('btnAdmin8');
const btnAdmin9 = document.getElementById('btnAdmin9');

const admin1 = document.getElementById('admin1');
const admin2 = document.getElementById('admin2');
const admin3 = document.getElementById('admin3');
const admin4 = document.getElementById('admin4');
const admin5 = document.getElementById('admin5');
const admin6 = document.getElementById('admin6');
const admin7 = document.getElementById('admin7');
const admin8 = document.getElementById('admin8');
const admin9 = document.getElementById('admin9');
const rightmin1 = document.getElementById('rightmin1');
const rightmin2 = document.getElementById('rightmin2');

var userRole3 = 'admin';
document.addEventListener("DOMContentLoaded", function() {
    if(userRole3 === 'admin'){

        let activePage = admin1; // Menyimpan halaman yang sedang aktif

        btnAdmin1.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = admin1; // Memperbarui halaman yang sedang aktif
            admin1.classList.add('active-page');
            rightmin1.classList.add('active-page');
        });

        btnAdmin2.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = admin2; // Memperbarui halaman yang sedang aktif
            admin2.classList.add('active-page');
            rightmin1.classList.add('active-page');
        });

        btnAdmin3.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = admin3; // Memperbarui halaman yang sedang aktif
            admin3.classList.add('active-page');
            rightmin1.classList.add('active-page');
        });

        btnAdmin4.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = admin4; // Memperbarui halaman yang sedang aktif
            admin4.classList.add('active-page');
            rightmin1.classList.add('active-page');
        });

        btnAdmin5.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = admin5; // Memperbarui halaman yang sedang aktif
            admin5.classList.add('active-page');
            rightmin1.classList.add('active-page');
        });

        btnAdmin6.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = admin6; // Memperbarui halaman yang sedang aktif
            admin6.classList.add('active-page');
            rightmin1.classList.add('active-page');
        });

        btnAdmin7.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = admin7; // Memperbarui halaman yang sedang aktif
            admin7.classList.add('active-page');
            rightmin1.classList.add('active-page');
        });

        btnAdmin8.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = admin8; // Memperbarui halaman yang sedang aktif
            admin8.classList.add('active-page');
            rightmin1.classList.add('active-page');
        });

        btnAdmin9.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = admin9; // Memperbarui halaman yang sedang aktif
            admin9.classList.add('active-page');
            rightmin2.classList.add('active-page');
        });
        
        function resetPage(page) {
            page.classList.remove('active-page'); // Menghapus kelas 'active-page' dari halaman yang diberikan
            rightmin1.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar1
            rightmin2.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar2
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
// const rightguru2 = document.getElementById('rightguru2');

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
        });
        
        function resetPage(page) {
            page.classList.remove('active-page'); // Menghapus kelas 'active-page' dari halaman yang diberikan
            rightguru1.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar1
            // rightguru2.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar2
        }
    }
});

