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

var currentStep = 1;
var form = document.getElementById('form-nilai');

function showStep(step) {
    for (var i = 1; i <= 3; i++) {
        document.getElementById('step-' + i).style.display = 'none';
    }
    document.getElementById('step-' + step).style.display = 'block';
}

function previousStep() {
    if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
    }
}

function nextStep() {
    if (currentStep < 3) {
        currentStep++;
        showStep(currentStep);
    }
}

showStep(currentStep);

// Modal
$(document).ready(function() {
    // Sembunyikan modal saat halaman dimuat
    $('#InsertGuruWali').modal('hide');
    $('#UpdateGuruWali').modal('hide');
    $('#DeleteDataWali').modal('hide');
});
