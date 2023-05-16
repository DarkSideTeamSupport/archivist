<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

</head>


<body class="font-sans bg-gray-100 mb-6">
<style>
    .page-break {
        page-break-after: always;
    }

    h1, h2 {
        text-align: center;
        font-size: 14px;
    }

    p {
        text-align: justify;
    }

    table {
        border-collapse: collapse;
    }

    table thead td {
        text-align: center;
    }

    table tbody td {
        padding-left: 5px;
    }

    .grade {
        font-size: 11px;
        white-space: nowrap;
    }
</style>
<h1>АКТ</h1>
<h2>О передаче курсовых проектов в архив техникума на хранение</h2>
<p>Мы, нижеподписавшиеся преподаватель {{$reportDefences[0]->director->surname}} <?php echo mb_substr($reportDefences[0]->director->name, 0, 1)?>.<?php echo mb_substr($reportDefences[0]->director->patronymic, 0, 1)?>. архивариус Ветлугина Е.Н. , Минвалиева Н.Г составили настоящий акт о приеме-передаче
    курсовых работ по «{{$reportDefences[0]->defence->reportDiscipline->discipline->specialty->decoding}}
    «{{$reportDefences[0]->defence->reportDiscipline->discipline->title}}» студентов
    группы {{$reportDefences[0]->defence->reportDiscipline->group->title}}
    специальности {{$reportDefences[0]->defence->reportDiscipline->discipline->specialty->title}} Информационные системы
    и программирование за {{date('Y')-1}}-{{date('Y')}} учебный год в количестве {{$reportDefences->count()}} шт,
    согласно прилагаемого списка.</p>
<table border="1" width="100%">
    <thead>
    <tr>
        <td>№ п/п</td>
        <td>Ф.И.О.</td>
        <td>Тема курсовой работы</td>
        <td>Оценка работы</td>
    </tr>
    </thead>
    <tbody>
    @foreach($reportDefences as $reportDefence)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$reportDefence->student->surname}} {{$reportDefence->student->name}}
                {{$reportDefence->student->patronymic}}</td>
            <td class="">{{$reportDefence->theme}}</td>
            <td class="grade">
                @if($reportDefence->grade == 5)
                    {{$reportDefence->grade}} (отлично)
                @elseif($reportDefence->grade == 4)
                    {{$reportDefence->grade}} (хорошо)
                @elseif($reportDefence->grade == 3)
                    {{$reportDefence->grade}} (неудовлетворительно)
                @endif
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
<div class="mt-3">
    <p>Преподаватель_____________<span class="ml-3">{{$reportDefences[0]->director->surname}} <?php echo mb_substr($reportDefences[0]->director->name, 0, 1)?>.<?php echo mb_substr($reportDefences[0]->director->patronymic, 0, 1)?>.</span><span> дата сдачи {{date('d')}}.{{date('m')}}.{{date('Y')}}</span></p>
    <p>Архивариус_____________Ветлугина Е.Н.</p>
    <p>Зав. отделением_____________Минвалиева Н. Г.</p>
</div>
</body>
</html>
