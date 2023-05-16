"use strict";

import './app';

//create discipline
$(".createDisciplineForm").submit(function (e) {
    e.preventDefault();
    const title = $('.DisciplineTitle').val();
    const specialty_id = $('.DisciplineS_id').val();
    const token = $('meta[name="csrf-token"]').attr('content');

    $('.createDisciplineBtn').text('Добавление...');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        url: 'disciplines',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'JSON',

        success: function (response, data) {
            if (response.status = 200) {
                Swal.fire(
                    'Успешно!',
                    'Дисциплина добавлена успешна',
                    'success'
                ).then(function () {
                    location.reload();
                    return false;
                })
            }

            formOpen()

            $('.d-title').val('');

        },
        error: function (response) {
            console.log('error')
        }
    });
})

//edit discipline
$(".disciplineForm").submit(function (e) {
    e.preventDefault();
    let id = $(this).data('discipline-id');
    let token = $('meta[name="_token"]').attr('content');
    let submitter = $(e.originalEvent.submitter).val();
    let form = $(this);


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if (submitter == 'delete') {

        $.ajax({
            url: "disciplines/" + id,
            method: 'POST',
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content'),
                value: submitter,
            },

            success: function (response, data) {

                if (response.status = 200) {
                    form.parent('tr').fadeOut(200, function () {
                        $(this).css({"visibility": "hidden", display: 'flex'}).slideUp();
                    });

                    Swal.fire(
                        'Успешно!',
                        'Дисциплина добавлена удалена',
                        'success'
                    ).then(function () {

                    })
                }

            },
            error: function (response, data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Упсс...',
                    text: 'Что-то пошло не так!',
                    footer: '<p>Обратитесь к администратору</p>'
                })

            }
        });

    } else if (submitter == 'edit') {
        console.log($(this).serialize());
        $.ajax({
            url: "disciplines/" + id,
            method: 'POST',
            data: $(this).serialize(),
            success: function (response, data) {
                console.log(data)
                Swal.fire(
                    'Успешно!',
                    'Данные дисциплины успешно изменены',
                    'success'
                )
            },
            error: function (response, data) {
                console.log('error')
            }
        });
    }

})

