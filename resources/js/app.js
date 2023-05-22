import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

AOS.init();


$('.createBtn').click(function () {
    formOpen()
});

$("input").on("focus", function () {
    $(this).closest("tr").addClass('active');
}).on('focusout', function () {
    $(this).closest("tr").removeClass('active');
})

$("select").on("focus", function () {
    $(this).closest("tr").addClass('active');
}).on('focusout', function () {
    $(this).closest("tr").removeClass('active');
})

function formOpen() {
    $(".form__overlay").addClass("active");
    $(".createForm").addClass("active");
}

function formClose() {
    $(".form__overlay").removeClass("active");
    $(".createForm").removeClass("active");
}

$(".form__overlay, .createForm__close").click(function (e) {
    e.preventDefault()
    formClose()
});


