"use strict";

import Swal from 'sweetalert2/dist/sweetalert2.js'

import 'sweetalert2/src/sweetalert2.scss'

//create defence-reports
$(".createDefReportForm").submit(function (e) {
    e.preventDefault();
    const commission_id = $('.commission_id').val();
    const group_id = $('.group_id').val();
    const defence_id = $('.defence_id').val();
    const employee_id = $('.employee_id').val();
    const actual_delivery_date = $('.actual_delivery_date').val();
    const token = $('meta[name="csrf-token"]').attr('content');

    $('.createDefenceReportBtn').text('Формирование отчетов...');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $.ajax({
        url: 'defence-reports',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'JSON',

        success: function (response, data) {
            if (response.status = 200) {
                console.log(response)
                Swal.fire(
                    'Успешно!',
                    'Отчеты созданы успешно',
                    'success'
                ).then(function () {
                    location.reload();
                    return false;
                })
            }
            $(".form__overlay").removeClass("active");
            $(".createForm").removeClass("active");
            $('.d-title').val('');

        },
        error: function (response) {
            console.log('error')
        }
    });
})


//edit-download defence-reports
$(".defenceReportForm").submit(function (e) {
    e.preventDefault();
    let id = $(this).data('report-id');
    let token = $('meta[name="_token"]').attr('content');
    let submitter = $(e.originalEvent.submitter).val();
    let form = $(this);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });

    if (submitter == 'signed') {

        $.ajax({
            url: "defence-reports/" + id,
            method: 'POST',
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content'),
                value: submitter,
            },

            success: function (response, data) {

                Swal.fire(
                    'Успешно!',
                    'Отчет успешно подписан',
                    'success'
                ).then(function () {
                    location.reload();
                    return false;
                })

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

    }
    if (submitter == 'edit') {

        $.ajax({
            url: "defence-reports/" + id,
            method: 'POST',
            dataType: 'html',
            data: $(this).serialize(),

            success: function (response, data) {

                Swal.fire(
                    'Успешно!',
                    'Данные отчета успешно обновлены',
                    'success'
                ).then(function () {

                })
            },
            error: function (response, data) {
                console.log('error')

            }
        });
    }
    if (submitter == 'download') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "defence-reports/upload/" + id,
            method: 'get',
            data: {
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content'),
                value: submitter,
            },
            success: function (response, data) {
                console.log('success')
            },

            error: function (response, data) {

                console.log('error')
            }
        });
    }
})
