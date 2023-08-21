const buttons = document.querySelectorAll('.sidebar');
buttons.forEach(button => {
    button.addEventListener('click', () => {
        buttons.forEach(sidebar => sidebar.classList.remove('active'));
        button.classList.add('active');
    });
});