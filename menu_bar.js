document.addEventListener("DOMContentLoaded", function () {
    var menuBtn = document.querySelector('.botondelmenu');
    var nav = document.getElementById('barranavegacion');
    var contador = 0;

    menuBtn.addEventListener('click', function () {
        if (contador == 0) {
            $(nav).show(600);
            contador = 1;
        } else {
            $(nav).hide(600);
            contador = 0;
        }
    });
});
