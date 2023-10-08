// active n inactive button
const buttons = document.querySelectorAll('.sidebar');
buttons.forEach(button => {
    button.addEventListener('click', () => {
        buttons.forEach(sidebar => sidebar.classList.remove('active'));
        button.classList.add('active');
    });
});

// show n hide password
document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const showPasswordToggle = document.getElementById('showPasswordToggle');
    const eyeIcon = showPasswordToggle.querySelector('i');

    showPasswordToggle.addEventListener('click', function() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('bi-eye');
            eyeIcon.classList.add('bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('bi-eye-slash');
            eyeIcon.classList.add('bi-eye');
        }
    });
});

// beranda admin
let valueDisplays = document.querySelectorAll(".num");
let interval = 500;

valueDisplays.forEach((valueDisplay) => {
    let startValue = 0;
    let endValue = parseInt(valueDisplay.getAttribute("data-val"));
    let duration = Math.floor(interval / endValue);
    let counter = setInterval(function () {
        startValue += 1;
        valueDisplay.textContent = startValue;
        if (startValue == endValue) {
            clearInterval(counter);
        }
    }, duration);
});
// Dapatkan semua tautan di sidebar
const sidebarLinks = document.querySelectorAll('#sidebar a');

// Loop melalui tautan dan tambahkan event listener
sidebarLinks.forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault(); // Hentikan navigasi ke halaman lain
        const targetContentId = this.getAttribute('href').substring(1); // Ambil ID konten dari href
        const targetContent = document.getElementById(targetContentId);

        // Sembunyikan semua konten dan tampilkan konten yang sesuai
        document.querySelectorAll('#content1, #content2').forEach(content => {
            content.style.display = 'none';
        });
        targetContent.style.display = 'block';
    });
});

// next and prev form
// const prevFormButton = document.getElementById('prevFormButton');
// const nextFormButton = document.getElementById('nextFormButton');
// const forms = document.querySelectorAll('form');
// let currentFormIndex = 0;

// function showForm(index) {
//     forms.forEach((form, i) => {
//         if (i === index) {
//             form.classList.remove('hidden');
//         } else {
//             form.classList.add('hidden');
//         }
//     });
// }

// showForm(currentFormIndex);

// prevFormButton.addEventListener('click', function() {
//     currentFormIndex = Math.max(0, currentFormIndex - 1);
//     showForm(currentFormIndex);
// });

// nextFormButton.addEventListener('click', function() {
//     currentFormIndex = Math.min(forms.length - 1, currentFormIndex + 1);
//     showForm(currentFormIndex);
// });