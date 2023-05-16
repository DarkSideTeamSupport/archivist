{{--@extends('layouts.main')--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="filter__block">--}}
{{--            <p class="filter__title">Выберите фильтры поиска</p>--}}

{{--            <form class="flex justify-between flex-col lg:flex-row gap-2 flex-wrap">--}}

{{--                <div class="form__items flex gap-2 flex-col lg:flex-row flex-wrap">--}}
{{--                    <select class="form-select appearance-none--}}
{{--                      text-base--}}
{{--                      font-normal--}}
{{--                      text-gray-700--}}
{{--                      border border-solid border-gray-300--}}
{{--                      rounded--}}
{{--                      transition--}}
{{--                      ease-in-out--}}
{{--                      focus:text-gray-700  focus:border-blue-600 focus:outline-none"--}}
{{--                            aria-label="Default select example">--}}

{{--                        <option selected>Курс</option>--}}
{{--                        <option value="1">One</option>--}}
{{--                        <option value="2">Two</option>--}}
{{--                        <option value="3">Three</option>--}}

{{--                    </select>--}}
{{--                    <select class=" appearance-none--}}
{{--                      text-gray-700--}}
{{--                      bg-clip-padding bg-no-repeat--}}
{{--                      border border-solid border-gray-300--}}
{{--                      rounded--}}
{{--                      transition--}}
{{--                      ease-in-out--}}
{{--                      m-0--}}
{{--                      focus:text-gray-700  focus:border-blue-600 focus:outline-none"--}}
{{--                            aria-label="Default select example">--}}
{{--                        <option selected>Дисциплина</option>--}}
{{--                        @foreach($disciplines as $discipline)--}}
{{--                            <option value="{{$discipline->id}}">{{$discipline->title}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    <select class="appearance-none--}}
{{--                      text-base--}}
{{--                      font-normal--}}
{{--                      text-gray-700--}}
{{--                      bg-clip-padding bg-no-repeat--}}
{{--                      border border-solid border-gray-300--}}
{{--                      rounded--}}
{{--                      transition--}}
{{--                      ease-in-out--}}
{{--                      m-0--}}
{{--                      focus:text-gray-700  focus:border-blue-600 focus:outline-none"--}}
{{--                            aria-label="Default select example">--}}
{{--                        <option selected>Группа</option>--}}
{{--                        @foreach($groups as $group)--}}
{{--                            <option value="{{$group->id}}">{{$group->title}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    <select class="grow appearance-none--}}
{{--                      text-base--}}
{{--                      font-normal--}}
{{--                      text-gray-700--}}
{{--                      bg-clip-padding bg-no-repeat--}}
{{--                      border border-solid border-gray-300--}}
{{--                      rounded--}}
{{--                      transition--}}
{{--                      ease-in-out--}}
{{--                      m-0--}}
{{--                      focus:text-gray-700  focus:border-blue-600 focus:outline-none"--}}
{{--                            aria-label="Default select example">--}}
{{--                        <option selected>Вид модуля</option>--}}
{{--                        @foreach($reportTypes as $reportType)--}}
{{--                            <option value="{{$reportType->id}}">{{$reportType->title}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                    <select class="grow appearance-none--}}
{{--                      text-base--}}
{{--                      font-normal--}}
{{--                      text-gray-700--}}
{{--                      bg-clip-padding bg-no-repeat--}}
{{--                      border border-solid border-gray-300--}}
{{--                      rounded--}}
{{--                      transition--}}
{{--                      ease-in-out--}}
{{--                      m-0--}}
{{--                      focus:text-gray-700  focus:border-blue-600 focus:outline-none"--}}
{{--                            aria-label="Default select example">--}}
{{--                        <option selected>Комиссия</option>--}}
{{--                        --}}{{--                            @foreach($commissions as $commission)--}}
{{--                        --}}{{--                                <option value="{{$commission->id}}">{{$commission->title}}</option>--}}
{{--                        --}}{{--                            @endforeach--}}
{{--                    </select>--}}
{{--                    <select class="grow appearance-none--}}
{{--                      text-base--}}
{{--                      font-normal--}}
{{--                      text-gray-700--}}
{{--                      bg-clip-padding bg-no-repeat--}}
{{--                      border border-solid border-gray-300--}}
{{--                      rounded--}}
{{--                      transition--}}
{{--                      ease-in-out--}}
{{--                      m-0--}}
{{--                      focus:text-gray-700  focus:border-blue-600 focus:outline-none"--}}
{{--                            aria-label="Default select example">--}}
{{--                        <option selected>Статус</option>--}}
{{--                        <option value="1">One</option>--}}
{{--                        <option value="2">Two</option>--}}
{{--                        <option value="3">Three</option>--}}
{{--                    </select>--}}
{{--                    <input type="date" name="" id="" class="text-base--}}
{{--                      font-normal--}}
{{--                      text-gray-700--}}
{{--                      bg-clip-padding bg-no-repeat--}}
{{--                      border border-solid border-gray-300--}}
{{--                      rounded--}}
{{--                      transition--}}
{{--                      ease-in-out--}}
{{--                      m-0--}}
{{--                      focus:text-gray-700  focus:border-blue-600 focus:outline-none">--}}
{{--                </div>--}}

{{--                <button class="search--}}
{{--                      rounded--}}
{{--                      w-auto--}}
{{--                      py-2--}}
{{--                      px-2--}}
{{--                      bg-white--}}
{{--                        ">Найти--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        <div class="modules__block">--}}
{{--            <p>Список отчетов</p>--}}
{{--            <div class="module__list flex flex-col gap-4">--}}
{{--                @foreach($reportDefences as $reportDefence)--}}
{{--                    <div class="module">--}}
{{--                        <span class="module__number">Отче № {{$reportDefence->id}}</span>--}}
{{--                        <div>--}}
{{--                            <p>ФИО: <span>Иванов Иван Иванович</span></p>--}}
{{--                            <p>Курс: <span>3</span></p>--}}
{{--                            <p>Дисциплина: <span>МДК 09.03</span></p>--}}
{{--                            <p>Преподаватель: <span>Усманов М.А.</span></p>--}}
{{--                            <p>Группа: <span>ИС-192</span></p>--}}
{{--                            <p>Оценка: <span>ИС-192</span></p>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <p>Статус: <span class="text-red-700">не подписан</span></p>--}}
{{--                            <p>Дата загрузки: <span>25.09.2023</span></p>--}}
{{--                        </div>--}}
{{--                        <form method="" action="" class="flex gap-6--}}
{{--                       items-end">--}}
{{--                            <div>--}}
{{--                                <a href="">Скачать</a>--}}
{{--                            </div>--}}
{{--                            <button type="submit">Подписать</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}



<table class="info__table border">
    <thead>
    <tr>
        <td>Название дисциплины</td>
        <td>Специальность</td>
        <td>Управление</td>
    </tr>
    </thead>
    <tbody>
    @foreach($disciplines as $discipline)
        <tr data-aos="zoom-in">
            <form action="{{route('discipline.edit', $discipline->id)}}" method="post"
                  class="disciplineForm">
                @csrf
                @method('PATCH')

                <td class="grow">
                    <div>
                        <input class="discipline__title p-0 px-2 !w-full" type="text"
                               value="{{$discipline->title}}"
                               name="title">
                    </div>
                </td>
                <td>
                    <div class="select_div">
                        <select name="specialty_id" id="" class="rounded p-0 px-2  w-full">
                            <option value="{{$discipline->specialty->id}}" name="specialty_id"
                                    selected>{{$discipline->specialty->title}}</option>
                            @foreach($specialties as $specialty)
                                <option value="{{$specialty->id}}"
                                        name="specialty_id">{{$specialty->title}}</option>
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
                <td class="w-[200px]">
                    <div class="flex !flex-row max-w-[300px]">
                        <div class="flex items-center !flex-row justify-between">
                            <button type="submit"
                                    class="text-white rounded px-4 bg-red-500 hover:bg-blue-700"
                                    value="delete" name="value">Удалить
                            </button>
                            <div>
                            </div>

                            <a href=""
                               data-discipline-id="{{$discipline->id}}"

                               class="disciplineEditBtn text-white rounded px-4 bg-green-500 hover:bg-blue-700"
                               value="edit" name="value">Изменить
                            </a>
                        </div>
                    </div>
                </td>
            </form>
        </tr>
    @endforeach
    </tbody>
</table>
