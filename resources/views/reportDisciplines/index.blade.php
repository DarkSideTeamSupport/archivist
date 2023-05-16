@extends('layouts.main')
@section('content')
    <div class="container">

    @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3 || Auth::user()->role_id == 5)
            <div class="control__block mt-5">
                <a href="#" class="createBtn">Создать дисциплину отчета</a>
            </div>
    @endif
        <div style="background: #6162FD" ; class="reportDisciplines_filter__block  my-4 py-2 px-2 rounded">
            <form action="{{route('report-disciplines.index')}}" method="get"
                  class="flex gap-2 flex-col sm:flex-row items-center w-full">
                @csrf
                <div class="flex items-center gap-2 w-full max-w-auto flex-col sm:flex-row">
                    <select name="discipline_id" id="discipline_id" class="p-0 px-2 py-1 rounded w-full">
                        <option name="discipline_id" value="">Выберите дисциплину</option>
                        @foreach($disciplines as $discipline)
                            <option name="discipline_id" value="{{$discipline->id}}">{{$discipline->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center gap-2  w-full max-w-auto flex-col sm:flex-row">

                    <select name="report_id" id="report_id" class="p-0 px-2 py-1 rounded w-full">
                        <option name="report_id" value="">Выберите вид отчета</option>
                        @foreach($reportTypes as $reportType)
                            <option name="report_id" value="{{$reportType->id}}">{{$reportType->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center gap-2  w-full max-w-auto flex-col sm:flex-row">
                    <select name="group_id" id="group_id" class="p-0 px-2 py-1 rounded w-full">
                        <option name="group_id" value="">Выберите группу</option>
                        @foreach($groups as $group)
                            <option name="group_id" value="{{$group->id}}">{{$group->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center gap-2  w-full max-w-auto flex-col sm:flex-row">
                    <select name="user_id" id="user_id" class="p-0 px-2 py-1 rounded w-full">
                        <option name="user_id" value="">Выберите руководителя</option>
                        @foreach($managers as $manager)
                            <option name="user_id"
                                    value="{{$manager->id}}">{{$manager->surname}} {{$manager->name}} {{$manager->patronymic}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex w-full items-center justify-end gap-2">
                    <a href="{{route('report-disciplines.index')}}"
                       class="text-center bg-gray-50 px-3 py-1.5 h-max rounded  w-full sm:w-auto hover:no-underline">Сбросить
                    </a>
                    <button type="submit" class="bg-gray-50 px-3 py-1.5 h-max rounded  w-full sm:w-auto" value="type"
                            name="type">Поиск
                    </button>
                </div>
            </form>
        </div>

        <div class="table__block">
            <table class="info__table border">
                <thead>
                <tr>
                    <td>Дисциплина</td>
                    <td>Вид отчета</td>
                    <td>Группа</td>
                    <td>Руководитель</td>
                    <td>Запланированная дата</td>
                    <td>Управление</td>
                </tr>
                </thead>
                <tbody>
                @foreach($reportDisciplines as $reportDiscipline)
                    <tr data-aos="zoom-in">
                        <form action="{{route('report-discipline.edit',$reportDiscipline->id)}}" method="post">
                            @csrf
                            @method('PATCH')

                            <td class="w-[200px]">
                                <div class="select_div">
                                    <select name="discipline_id" id="discipline_id" class="w-full rounded p-0 px-2 !bg-black rounded p-0 px-2 !bg-black">
                                        <option name="discipline_id" value="{{$reportDiscipline->discipline->id}}" selected>{{$reportDiscipline->discipline->title}}</option>
                                        @foreach($disciplines as $discipline)
                                            <option name="discipline_id" value="{{$discipline->id}}">{{$discipline->title}}</option>
                                        @endforeach
                                    </select>
                                    <svg class="" fill="#000000" width="64px" height="64px" viewBox="-3.2 -3.2 38.40 38.40" version="1.1" xmlns="http://www.w3.org/2000/svg" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.064"></g><g id="SVGRepo_iconCarrier"> <path d="M0.256 8.606c0-0.269 0.106-0.544 0.313-0.75 0.412-0.412 1.087-0.412 1.5 0l14.119 14.119 13.913-13.912c0.413-0.412 1.087-0.412 1.5 0s0.413 1.088 0 1.5l-14.663 14.669c-0.413 0.413-1.088 0.413-1.5 0l-14.869-14.869c-0.213-0.213-0.313-0.481-0.313-0.756z"></path> </g></svg>
                                </div>
                            </td>
                            <td>
                                <div class="select_div">
                                    <select name="report_id" id="report_id" class="w-full rounded p-0 px-2 !bg-black">
                                        <option name="report_id" value="{{$reportDiscipline->reportType->id}}" selected>{{$reportDiscipline->reportType->title}}</option>
                                        @foreach($reportTypes as $reportType)
                                            <option name="report_id" value="{{$reportType->id}}">{{$reportType->title}}</option>
                                        @endforeach
                                    </select>
                                    <svg class="" fill="#000000" width="64px" height="64px" viewBox="-3.2 -3.2 38.40 38.40" version="1.1" xmlns="http://www.w3.org/2000/svg" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.064"></g><g id="SVGRepo_iconCarrier"> <path d="M0.256 8.606c0-0.269 0.106-0.544 0.313-0.75 0.412-0.412 1.087-0.412 1.5 0l14.119 14.119 13.913-13.912c0.413-0.412 1.087-0.412 1.5 0s0.413 1.088 0 1.5l-14.663 14.669c-0.413 0.413-1.088 0.413-1.5 0l-14.869-14.869c-0.213-0.213-0.313-0.481-0.313-0.756z"></path> </g></svg>
                                </div>
                            </td>
                            <td>
                                <div class="select_div">
                                    <select name="group_id" id="group_id" class="w-full rounded p-0 px-2 !bg-black">
                                        <option name="group_id" value="{{$reportDiscipline->group->id}}" selected>{{$reportDiscipline->group->title}}</option>
                                        @foreach($groups as $group)
                                            <option name="group_id" value="{{$group->id}}">{{$group->title}}</option>
                                        @endforeach
                                    </select>
                                    <svg class="" fill="#000000" width="64px" height="64px" viewBox="-3.2 -3.2 38.40 38.40" version="1.1" xmlns="http://www.w3.org/2000/svg" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.064"></g><g id="SVGRepo_iconCarrier"> <path d="M0.256 8.606c0-0.269 0.106-0.544 0.313-0.75 0.412-0.412 1.087-0.412 1.5 0l14.119 14.119 13.913-13.912c0.413-0.412 1.087-0.412 1.5 0s0.413 1.088 0 1.5l-14.663 14.669c-0.413 0.413-1.088 0.413-1.5 0l-14.869-14.869c-0.213-0.213-0.313-0.481-0.313-0.756z"></path> </g></svg>
                                </div>
                            </td>
                            <td>
                                <div class="select_div">
                                    <select name="user_id" id="user_id" class="rounded p-0 px-2 !bg-black w-full">
                                        <option name="user_id" value="{{$reportDiscipline->teacher->id}}" selected>{{$reportDiscipline->teacher->surname}} {{$reportDiscipline->teacher->name}} {{$reportDiscipline->teacher->patronymic}}</option>

                                        @foreach($managers as $manager)
                                            <option name="user_id" value="{{$manager->id}}">{{$manager->surname}} {{$manager->name}} {{$manager->patronymic}}</option>
                                        @endforeach
                                    </select>
                                    <svg class="" fill="#000000" width="64px" height="64px" viewBox="-3.2 -3.2 38.40 38.40" version="1.1" xmlns="http://www.w3.org/2000/svg" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.064"></g><g id="SVGRepo_iconCarrier"> <path d="M0.256 8.606c0-0.269 0.106-0.544 0.313-0.75 0.412-0.412 1.087-0.412 1.5 0l14.119 14.119 13.913-13.912c0.413-0.412 1.087-0.412 1.5 0s0.413 1.088 0 1.5l-14.663 14.669c-0.413 0.413-1.088 0.413-1.5 0l-14.869-14.869c-0.213-0.213-0.313-0.481-0.313-0.756z"></path> </g></svg>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="date" class="w-full" value="{{$reportDiscipline->planned_delivery_date}}" name="planned_delivery_date">
                                </div>
                            </td>

                            <td class="w-[100px]">
                                <div class="flex items-center !flex-row justify-between">
                                    <button type="submit"
                                            class="text-white rounded px-4 bg-red-500  hover:bg-blue-700"
                                            value="delete" name="value">Удалить
                                    </button>
                                    <button type="submit" class="text-white rounded px-4 bg-green-500 hover:bg-blue-700"
                                            value="edit" name="value">Изменить
                                    </button>
                                </div>

                            </td>
                        </form>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="mt-8 paginate__block">
            {{$reportDisciplines->withQueryString()->links()}}
        </div>
        @if($reportDisciplines->isEmpty())
            <p class="my-8 text-xl">По вашему запросу ничего не найдено!</p>
        @endif
        <div class="form__overlay min-h-screen  fixed  top-0">

        </div>

        <form action="{{route('report-disciplines.create')}}" method="post" class="createForm mx-auto flex flex-col gap-2 absolute">
            @csrf
            <div>
                <label for="discipline_id">Дисциплина</label>
                <select name="discipline_id" id="discipline_id" class="border-none">
                    @foreach($disciplines as $discipline)
                        <option value="{{$discipline->id}}" name="discipline_id">{{$discipline->title}}</option>
                    @endforeach
                </select>

            </div>
            <div>
                <label for="report_id">Вид отчета</label>
                <select name="report_id" id="report_id" class="border-none">

                    @foreach($reportTypes as $reportType)
                        <option value="{{$reportType->id}}" name="report_id">{{$reportType->title}}</option>
                    @endforeach
                </select>

            </div>
            <div>
                <label for="group_id">Группа</label>
                <select name="group_id" id="group_id" class="border-none">
                    @foreach($groups as $group)
                        <option value="{{$group->id}}" name="group_id">{{$group->title}}</option>
                    @endforeach
                </select>

            </div>
            <div>
                <label for="user_id">Руководитель</label>
                <select name="user_id" id="user_id" class="border-none">
                    @foreach($managers as $manager)
                        <option value="{{$manager->id}}" name="user_id">{{$manager->surname}} {{$manager->name}} {{$manager->patronymic}}</option>
                    @endforeach
                </select>

            </div>
            <div>
                <label for="planned_delivery_date">Запланированная дата</label>
                <input type="date" name="planned_delivery_date" id="planned_delivery_date" required>
            </div>

            <div class="flex flex-col gap-2">

                <a href="" class="createForm__close absolute">
                    <svg fill="#000000" width="40px" height="40px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.707,8.707,13.414,12l3.293,3.293a1,1,0,1,1-1.414,1.414L12,13.414,8.707,16.707a1,1,0,1,1-1.414-1.414L10.586,12,7.293,8.707A1,1,0,1,1,8.707,7.293L12,10.586l3.293-3.293a1,1,0,1,1,1.414,1.414Z"/></svg>
                </a>
                <button type="submit">Создать</button>
            </div>
        </form>

    </div>

@endsection
