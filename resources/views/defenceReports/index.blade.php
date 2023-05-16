@extends('layouts.main')
@section('content')
    <div class="container">
        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
            <div class="control__block flex flex-col mt-5">
                <p class="my-2 text-red-500 grow">Внимание! Перед созданием отчета убедитесь, что вы создали защиту</p>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="createBtn createDefenceReportBtn">Создать отчет</a>
                    <a href="{{route('defences.index')}}" class="createBtn">Создать защиту</a>
                </div>
            </div>
        @endif

        <div style="background: #6162FD" ; class="defenceReport_filter__block  my-4 py-2 px-2 rounded">
            <form action="{{route('defenceReports.index')}}" method="get"
                  class="flex gap-2 flex-col sm:flex-row w-full">
                @csrf
                <div class="flex items-center gap-2 w-full max-w-auto flex-col sm:flex-row sm:max-w-[500px]">
                    <select name="student_id" id="student_id" class="p-0 px-2 py-1 rounded w-full">
                        <option value="" name="student_id">Выберите студента</option>

                        @foreach($students as $student)
                            <option value="{{$student->id}}"
                                    name="student_id">{{$student->surname}} {{$student->name}} {{$student->patronymic}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center gap-2 w-full max-w-auto flex-col sm:flex-row sm:max-w-[500px]">
                    <select name="status" id="status" class="p-0 px-2 py-1 rounded w-full">
                        <option value="0" name="status">Статус</option>
                        <option value="0" name="status">Не подписан</option>
                        <option value="1" name="status">Подписан</option>
                    </select>
                </div>
                <div class="flex items-center gap-2 w-full  sm:max-w-[300px] flex-col sm:flex-row">
                    <select name="commission_id" id="commission_id" class="p-0 px-2 py-1 rounded w-full">
                        <option value="" name="commission_id">Выберите коммиссию</option>
                        @foreach($commissions as $commission)
                            <option value="{{$commission->id}}"
                                    name="commission_id">{{$commission->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center gap-2 w-full  sm:max-w-[300px] flex-col sm:flex-row">
                    <select name="employee_id" id="employee_id" class="p-0 px-2 py-1 rounded w-full">
                        <option value="" name="employee_id">Выберите руководителя</option>
                        @foreach($managers as $manager)
                            <option value="{{$manager->id}}"
                                    name="employee_id">{{$manager->surname}} {{$manager->name}} {{$manager->patronymic}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center justify-end gap-2 sm:ml-auto">
                    <a href="{{route('defenceReports.index')}}"
                       class="text-center bg-gray-50 px-3 py-1.5 h-max rounded  w-full sm:w-auto hover:no-underline">Сбросить
                    </a>
                    <button type="submit" class="bg-gray-50 px-3 py-1.5 h-max rounded w-full sm:w-auto" value="type"
                            name="type">Найти
                    </button>
                </div>
            </form>
        </div>

        <div class="defenceReports__block mt-8">
            <div class="table__block">
                <table class="info__table border defenceReportsTable">
                    <thead>
                    <tr>
                        <td>Курс</td>
                        <td>Вид отчета</td>
                        <td>Студент</td>
                        <td>Коммиссия</td>
                        <td>Руководитель</td>
                        <td>Группа</td>
                        <td>Оценка</td>
                        <td>Тема</td>
                        <td>Дисциплина</td>
                        <td>Статус</td>
                        <td>Дата загрузки</td>
                        <td>Дата защиты</td>
                        <td>Управление</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reportDefences as $reportDefence)

                        <tr>
                            <form action="" data-report-id="{{$reportDefence->id}}" class="defenceReportForm"
                                  method="post">
                                @csrf

                                <td>{{$reportDefence->student->course}}</td>
                                <td>{{$reportDefence->defence->reportDiscipline->reportType->title}}</td>
                                <td>{{$reportDefence->student->surname}} {{$reportDefence->student->name}}
                                    {{$reportDefence->student->patronymic}}</td>
                                <td>{{$reportDefence->commission->title}}</td>
                                <td>{{$reportDefence->director->surname}} {{$reportDefence->director->name}} {{$reportDefence->director->patronymic}}</td>
                                <td>@if(isset($reportDefence->student->group->title))
                                        {{$reportDefence->student->group->title}}
                                    @else
                                        -
                                    @endif</td>
                                <td>
                                    <div class="select_div">
                                        <select name="grade" id="" class="grade p-o py-1 rounded grade">
                                            <option selected value="{{$reportDefence->grade}}">
                                                @if($reportDefence->grade == '')
                                                    ???
                                                @else
                                                    {{$reportDefence->grade}}
                                                @endif
                                            </option>
                                            <option name="grade" value="2">2</option>
                                            <option name="grade" value="3">3</option>
                                            <option name="grade" value="4">4</option>
                                            <option name="grade" value="5">5</option>
                                        </select>
                                        <svg class="" fill="#000000" width="64px" height="64px"
                                             viewBox="-3.2 -3.2 38.40 38.40" version="1.1"
                                             xmlns="http://www.w3.org/2000/svg"
                                             transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                               stroke="#CCCCCC" stroke-width="0.064"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path
                                                    d="M0.256 8.606c0-0.269 0.106-0.544 0.313-0.75 0.412-0.412 1.087-0.412 1.5 0l14.119 14.119 13.913-13.912c0.413-0.412 1.087-0.412 1.5 0s0.413 1.088 0 1.5l-14.663 14.669c-0.413 0.413-1.088 0.413-1.5 0l-14.869-14.869c-0.213-0.213-0.313-0.481-0.313-0.756z"></path>
                                            </g>
                                        </svg>
                                    </div>
                                </td>
                                <td class="">
                                    <input value="{{$reportDefence->theme}}" name="theme"
                                           class="theme rounded outline-none border-none pl-1 py-1"
                                           id="theme"
                                           type="text"
                                           placeholder="Пожалуйста заполните тему">
                                </td>
                                <td>{{$reportDefence->defence->reportDiscipline->discipline->title}}</td>
                                <td>@if($reportDefence->status == 1)
                                        <span class="text-green-700">подписан</span>
                                    @else
                                        <span class="text-red-700">не подписан</span>
                                    @endif</td>
                                <td>@if($reportDefence->upload_date == "")
                                        <span class="text-red-700">не загружалось</span>
                                    @else
                                        {{$reportDefence->upload_date}}
                                    @endif</td>
                                <td>{{$reportDefence->actual_delivery_date}}</td>

                                <td>
                                    <div class="flex items-center flex-col">
                                        <button
                                            type="submit"
                                            class="save self-end lg:self-start  !bg-green-500 hover:bg-green-600 py-1 px-2 max-w-[200px] text-white rounded w-full"
                                            name="value"
                                            value="edit"
                                            data-report-id="{{$reportDefence->id}}"
                                        >Сохранить
                                        </button>

                                        @if($reportDefence->file != "")
                                            <a class="downloadBtn hover:border-solid max-w-[200px] bg-blue-500 hover:bg-blue-600 text-white rounded py-1 px-2 w-full no-underline"
                                               href="{{ env('APP.URL') }}/storage/{{$reportDefence->file}}"
                                               target="_blank">Скачать</a>
                                        @endif
                                        <button type="submit"
                                                class="signed hover:bg-green-500 bg-green-600 rounded text-white py-1 px-2 w-full"
                                                name="value"
                                                value="signed"
                                                data-report-id="{{$reportDefence->id}}"
                                                @if($reportDefence->file == "")
                                                    disabled
                                                @elseif($reportDefence->status == 1)
                                                    disabled
                                            @endif
                                        >Подписать
                                        </button>

                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>

        </div>

        <div class="mt-8 paginate__block">
            {{$reportDefences->withQueryString()->links()}}
        </div>
        @if($reportDefences->isEmpty())
            <p class="my-8 text-xl">По вашему запросу ничего не найдено!</p>
        @endif
        <div class="form__overlay min-h-screen  fixed  top-0">

        </div>
        <form action="" method="post"
              class="createForm mx-auto flex flex-col gap-2 absolute createDefReportForm">
            @csrf
            <div>
                <label for="commission_id">Коммиссия</label>
                <select id="commission_id" name="commission_id" class="commission_id">
                    @foreach($commissions as $commission)
                        <option value="{{$commission->id}}" name="commission_id">{{$commission->title}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="defence_id">Дисциплина защиты</label>
                <select id="defence_id" name="defence_id" class="defence_id">
                    @if($defences->isEmpty())
                        <option value="" selected>Создайте дисциплину защиты</option>
                    @endif
                    @foreach($defences as $defence)

                        <option
                            value="{{$defence->id}}"
                            name="defence_id">
                            {{$defence->reportDiscipline->group->title}}
                            {{$defence->reportDiscipline->discipline->title}}
                            {{$defence->reportDiscipline->reportType->title}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="employee_id">Руководитель</label>
                <select id="employee_id" name="employee_id" class="employee_id">
                    @foreach($managers as $manager)
                        <option value="{{$manager->id}}"
                                name="employee_id">{{$manager->surname}} {{$manager->name}} {{$manager->patronymic}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="actual_delivery_date">Дата защиты</label>
                <input type="date" class="actual_delivery_date" name="actual_delivery_date" id="actual_delivery_date"
                       required>
            </div>
            <div>
                <div class="flex flex-col gap-2">
                    <a href="" class="createForm__close absolute">
                        <svg fill="#000000" width="40px" height="40px" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.707,8.707,13.414,12l3.293,3.293a1,1,0,1,1-1.414,1.414L12,13.414,8.707,16.707a1,1,0,1,1-1.414-1.414L10.586,12,7.293,8.707A1,1,0,1,1,8.707,7.293L12,10.586l3.293-3.293a1,1,0,1,1,1.414,1.414Z"/>
                        </svg>
                    </a>
                    <button type="submit">Создать</button>
                </div>
            </div>
        </form>
    </div>
@endsection
