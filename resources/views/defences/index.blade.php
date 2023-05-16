@extends('layouts.main')
@section('content')
    <div class="container">

        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
            <div class="control__block flex flex-col mt-5">
                <p class="my-2 text-red-500 grow">Внимание! Перед созданием защиты убедитесь, что вы создали дисциплину
                    отчета</p>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="createBtn">Создать защиту</a>
                    <a href="{{route('report-disciplines.index')}}" class="createBtn">Создать дисциплину отчета</a>
                </div>
            </div>
        @endif
        <div style="background: #6162FD" ; class="defence_filter__block  my-4 py-2 px-2 rounded">
            <form action="{{route('defences.index')}}" method="get"
                  class="flex gap-2 flex-col sm:flex-row items-center w-full">
                @csrf
                <div class="flex items-center gap-2 w-full max-w-auto flex-col sm:flex-row">
                    <label for="commission_id" class="text-white">Коммиссия</label>
                    <select name="commission_id" id="commission_id" class="p-0 px-2 py-1 rounded w-full">
                        <option name="commission_id" value="">Все</option>
                        @foreach($commissions as $commission)
                            <option name="commission_id" value="{{$commission->id}}">{{$commission->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center gap-2  w-full max-w-auto flex-col sm:flex-row">
                    <label for="report_discipline_id" class="text-white lg:whitespace-nowrap">Дисциплина отчета</label>
                    <select name="report_discipline_id" id="report_discipline_id" class="p-0 px-2 py-1 rounded w-full">
                        <option name="report_discipline_id" value="">Все</option>
                        @foreach($reportDisciplines as $reportDiscipline)
                            <option name="report_discipline_id"
                                    value="{{$reportDiscipline->id}}">{{$reportDiscipline->discipline->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center gap-2  w-full max-w-auto flex-col sm:flex-row">
                    <label for="defence_date" class="text-white lg:whitespace-nowrap">Дата защиты</label>
                    <input type="date" name="defence_date" id="defence_date" class="p-0 px-2 py-1 rounded w-full">
                </div>
                <div class="flex w-full items-center justify-end gap-2">
                    <a href="{{route('defences.index')}}"
                       class="text-center bg-gray-50 px-3 py-2 h-max rounded  w-full sm:w-auto hover:no-underline">Сбросить
                    </a>
                    <button type="submit" class="bg-gray-50 px-3 py-2 h-max rounded  w-full sm:w-auto" value="type"
                            name="type">Поиск
                    </button>
                </div>
            </form>
        </div>
        <div class="table__block">
            <table class="info__table border">
                <thead>
                <tr>
                    <td>Коммиссия</td>
                    <td>Дисциплина отчета</td>
                    <td>Дата защиты</td>
                    <td>Управление</td>
                </tr>
                </thead>
                <tbody>
                @foreach($defences as $defence)
                    <tr data-aos="zoom-in">
                        <form action="{{route('defence.edit', $defence->id )}}" method="post">
                            @csrf
                            @method('PATCH')
                            <td>
                                <div class="select_div">
                                    <select name="commission_id" id="commission_id" class="w-full">
                                        <option value="{{$defence->commission->id}}" selected
                                                name="commission_id">{{$defence->commission->title}}</option>
                                        @foreach($commissions as $commission)
                                            <option value="{{$commission->id}}"
                                                    name="commission_id">{{$commission->title}}</option>
                                        @endforeach
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
                            <td>
                                <div class="select_div">
                                    <select
                                        name="report_discipline_id" id="report_discipline_id" class="w-full">
                                        <option value="{{$defence->reportDiscipline->id}}"
                                                selected
                                                name="report_discipline_id">{{$defence->reportDiscipline->discipline->title}} {{$defence->reportDiscipline->reportType->title}}
                                        </option>
                                        @foreach($reportDisciplines as $reportDiscipline)
                                            <option
                                                value="{{$reportDiscipline->id}}" name="report_discipline_id">
                                                {{$reportDiscipline->discipline->title}} {{$reportDiscipline->reportType->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if(\Illuminate\Support\Facades\Auth::user()->id == 1)
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
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="date" name="defence_date" id="defence_date"
                                           value="{{$defence->defence_date}}" class="w-full">
                                </div>
                            </td>
                            <td class="w-[200px]">
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
            {{$defences->withQueryString()->links()}}
        </div>
        @if($defences->isEmpty())
            <p class="my-8 text-xl">По вашему запросу ничего не найдено!</p>
        @endif
            <div class="form__overlay min-h-screen  fixed  top-0">

            </div>
            <form action="{{route('defence.create')}}" method="post"
                  class="createForm mx-auto flex flex-col gap-2 absolute">
                @csrf
                <div>
                    <label for="commission_id">Коммиссия</label>
                    <select id="commission_id" name="commission_id">
                        @foreach($commissions as $commission)
                            <option value="{{$commission->id}}" name="commission_id">{{$commission->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="report_discipline_id">Дисциплина отчета</label>
                    <select id="report_discipline_id" name="report_discipline_id">
                        @foreach($reportDisciplines as $reportDiscipline)
                            <option value="{{$reportDiscipline->id}}"
                                    name="report_discipline_id">{{$reportDiscipline->discipline->title}} {{$reportDiscipline->reportType->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="defence_date">Дата защиты</label>
                    <input type="date" class="defence_date" id="defence_date" name="defence_date" required>
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
