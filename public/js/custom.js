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

// Perpindahan halaman
const btnPage1 = document.getElementById('btnPage1');
const btnPage2 = document.getElementById('btnPage2');
const btnPage3 = document.getElementById('btnPage3');
const btnPage4 = document.getElementById('btnPage4');
const btnPage5 = document.getElementById('btnPage5');
const btnPage6 = document.getElementById('btnPage6');
const btnPage7 = document.getElementById('btnPage7');
const btnPage8 = document.getElementById('btnPage8');
const btnPage9 = document.getElementById('btnPage9');
const page1 = document.getElementById('page1');
const page2 = document.getElementById('page2');
const page3 = document.getElementById('page3');
const page4 = document.getElementById('page4');
const page5 = document.getElementById('page5');
const page6 = document.getElementById('page6');
const page7 = document.getElementById('page7');
const page8 = document.getElementById('page8');
const page9 = document.getElementById('page9');

btnPage1.addEventListener('click', () => {
    page1.classList.add('active-page');
    page2.classList.remove('active-page');
    page3.classList.remove('active-page');
    page4.classList.remove('active-page');
    page5.classList.remove('active-page');
    page6.classList.remove('active-page');
    page7.classList.remove('active-page');
    page8.classList.remove('active-page');
    page9.classList.remove('active-page');
});
btnPage2.addEventListener('click', () => {
    page1.classList.remove('active-page');
    page2.classList.add('active-page');
    page3.classList.remove('active-page');
    page4.classList.remove('active-page');
    page5.classList.remove('active-page');
    page6.classList.remove('active-page');
    page7.classList.remove('active-page');
    page8.classList.remove('active-page');
    page9.classList.remove('active-page');
});
btnPage3.addEventListener('click', () => {
    page1.classList.remove('active-page');
    page2.classList.remove('active-page');
    page3.classList.add('active-page');
    page4.classList.remove('active-page');
    page5.classList.remove('active-page');
    page6.classList.remove('active-page');
    page7.classList.remove('active-page');
    page8.classList.remove('active-page');
    page9.classList.remove('active-page');
});
btnPage4.addEventListener('click', () => {
    page1.classList.remove('active-page');
    page2.classList.remove('active-page');
    page3.classList.remove('active-page');
    page4.classList.add('active-page');
    page5.classList.remove('active-page');
    page6.classList.remove('active-page');
    page7.classList.remove('active-page');
    page8.classList.remove('active-page');
    page9.classList.remove('active-page');
});
btnPage5.addEventListener('click', () => {
    page1.classList.remove('active-page');
    page2.classList.remove('active-page');
    page3.classList.remove('active-page');
    page4.classList.remove('active-page');
    page5.classList.add('active-page');
    page6.classList.remove('active-page');
    page7.classList.remove('active-page');
    page8.classList.remove('active-page');
    page9.classList.remove('active-page');
});
btnPage6.addEventListener('click', () => {
    page1.classList.remove('active-page');
    page2.classList.remove('active-page');
    page3.classList.remove('active-page');
    page4.classList.remove('active-page');
    page5.classList.remove('active-page');
    page6.classList.add('active-page');
    page7.classList.remove('active-page');
    page8.classList.remove('active-page');
    page9.classList.remove('active-page');
});
btnPage7.addEventListener('click', () => {
    page1.classList.remove('active-page');
    page2.classList.remove('active-page');
    page3.classList.remove('active-page');
    page4.classList.remove('active-page');
    page5.classList.remove('active-page');
    page6.classList.remove('active-page');
    page7.classList.add('active-page');
    page8.classList.remove('active-page');
    page9.classList.remove('active-page');
});
btnPage8.addEventListener('click', () => {
    page1.classList.remove('active-page');
    page2.classList.remove('active-page');
    page3.classList.remove('active-page');
    page4.classList.remove('active-page');
    page5.classList.remove('active-page');
    page6.classList.remove('active-page');
    page7.classList.remove('active-page');
    page8.classList.add('active-page');
    page9.classList.remove('active-page');
});
btnPage9.addEventListener('click', () => {
    page1.classList.remove('active-page');
    page2.classList.remove('active-page');
    page3.classList.remove('active-page');
    page4.classList.remove('active-page');
    page5.classList.remove('active-page');
    page6.classList.remove('active-page');
    page7.classList.remove('active-page');
    page8.classList.remove('active-page');
    page9.classList.add('active-page');
});

// datatable
