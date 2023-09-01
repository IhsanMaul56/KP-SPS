const btnPage1 = document.getElementById('btnPage1');
const btnPage2 = document.getElementById('btnPage2');
const btnPage3 = document.getElementById('btnPage3');
const btnPage44 = document.getElementById('btnPage44');

const page1 = document.getElementById('page1');
const page2 = document.getElementById('page2');
const page3 = document.getElementById('page3');
const page44 = document.getElementById('page44');
const rightbar1 = document.getElementById('rightbar1');
const rightbar2 = document.getElementById('rightbar2');

var userRole = 'siswa';
document.addEventListener("DOMContentLoaded", function() {
    if(userRole === 'siswa'){
        let activePage = page1; // Menyimpan halaman yang sedang aktif

        btnPage1.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = page1; // Memperbarui halaman yang sedang aktif
            page1.classList.add('active-page');
            rightbar1.classList.add('active-page');
        });

        btnPage2.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = page2; // Memperbarui halaman yang sedang aktif
            page2.classList.add('active-page');
            rightbar2.classList.add('active-page');
        });

        btnPage3.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = page3; // Memperbarui halaman yang sedang aktif
            page3.classList.add('active-page');
            rightbar1.classList.add('active-page');
        });
        
        btnPage44.addEventListener('click', () => {
            resetPage(activePage); // Menghapus tampilan sebelumnya
            activePage = page44; // Memperbarui halaman yang sedang aktif
            page44.classList.add('active-page');
            rightbar2.classList.add('active-page');
        }); 

        function resetPage(page) {
            page.classList.remove('active-page'); // Menghapus kelas 'active-page' dari halaman yang diberikan
            rightbar1.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar1
            rightbar2.classList.remove('active-page'); // Menghapus kelas 'active-page' dari rightbar2
        }
    }
});


// Perpindahan halaman
const btnPage11 = document.getElementById('btnPage11');
const btnPage22 = document.getElementById('btnPage22');
const btnPage33 = document.getElementById('btnPage33');
const btnPage4 = document.getElementById('btnPage4');
const btnPage5 = document.getElementById('btnPage5');
const btnPage6 = document.getElementById('btnPage6');
const btnPage7 = document.getElementById('btnPage7');
const btnPage8 = document.getElementById('btnPage8');
const btnPage9 = document.getElementById('btnPage9');

const page11 = document.getElementById('page11');
const page22 = document.getElementById('page22');
const page33 = document.getElementById('page33');
const page4 = document.getElementById('page4');
const page5 = document.getElementById('page5');
const page6 = document.getElementById('page6');
const page7 = document.getElementById('page7');
const page8 = document.getElementById('page8');
const page9 = document.getElementById('page9');

var userRole = 'siswa';
document.addEventListener("DOMContentLoaded", function() {
    if(userRole === 'siswa'){
        btnPage11.addEventListener('click', () => {
            page11.classList.add('active-page');
            page22.classList.remove('active-page');
            page33.classList.remove('active-page');
            page4.classList.remove('active-page');
            page5.classList.remove('active-page');
            page6.classList.remove('active-page');
            page7.classList.remove('active-page');
            page8.classList.remove('active-page');
            page9.classList.remove('active-page');
        });
        btnPage22.addEventListener('click', () => {
            page11.classList.remove('active-page');
            page22.classList.add('active-page');
            page33.classList.remove('active-page');
            page4.classList.remove('active-page');
            page5.classList.remove('active-page');
            page6.classList.remove('active-page');
            page7.classList.remove('active-page');
            page8.classList.remove('active-page');
            page9.classList.remove('active-page');
        });
        btnPage33.addEventListener('click', () => {
            page11.classList.remove('active-page');
            page22.classList.remove('active-page');
            page33.classList.add('active-page');
            page4.classList.remove('active-page');
            page5.classList.remove('active-page');
            page6.classList.remove('active-page');
            page7.classList.remove('active-page');
            page8.classList.remove('active-page');
            page9.classList.remove('active-page');
        });
        btnPage4.addEventListener('click', () => {
            page11.classList.remove('active-page');
            page22.classList.remove('active-page');
            page33.classList.remove('active-page');
            page4.classList.add('active-page');
            page5.classList.remove('active-page');
            page6.classList.remove('active-page');
            page7.classList.remove('active-page');
            page8.classList.remove('active-page');
            page9.classList.remove('active-page');
        });
        btnPage5.addEventListener('click', () => {
            page11.classList.remove('active-page');
            page22.classList.remove('active-page');
            page33.classList.remove('active-page');
            page4.classList.remove('active-page');
            page5.classList.add('active-page');
            page6.classList.remove('active-page');
            page7.classList.remove('active-page');
            page8.classList.remove('active-page');
            page9.classList.remove('active-page');
        });
        btnPage6.addEventListener('click', () => {
            page11.classList.remove('active-page');
            page22.classList.remove('active-page');
            page33.classList.remove('active-page');
            page4.classList.remove('active-page');
            page5.classList.remove('active-page');
            page6.classList.add('active-page');
            page7.classList.remove('active-page');
            page8.classList.remove('active-page');
            page9.classList.remove('active-page');
        });
        btnPage7.addEventListener('click', () => {
            page11.classList.remove('active-page');
            page22.classList.remove('active-page');
            page33.classList.remove('active-page');
            page4.classList.remove('active-page');
            page5.classList.remove('active-page');
            page6.classList.remove('active-page');
            page7.classList.add('active-page');
            page8.classList.remove('active-page');
            page9.classList.remove('active-page');
        });
        btnPage8.addEventListener('click', () => {
            page11.classList.remove('active-page');
            page22.classList.remove('active-page');
            page33.classList.remove('active-page');
            page4.classList.remove('active-page');
            page5.classList.remove('active-page');
            page6.classList.remove('active-page');
            page7.classList.remove('active-page');
            page8.classList.add('active-page');
            page9.classList.remove('active-page');
        });
        btnPage9.addEventListener('click', () => {
            page11.classList.remove('active-page');
            page22.classList.remove('active-page');
            page33.classList.remove('active-page');
            page4.classList.remove('active-page');
            page5.classList.remove('active-page');
            page6.classList.remove('active-page');
            page7.classList.remove('active-page');
            page8.classList.remove('active-page');
            page9.classList.add('active-page');
        });
    }
});
