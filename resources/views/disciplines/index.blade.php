@extends('layouts.main')
@section('content')
    <div class="container">

        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3 || Auth::user()->role_id == 5)
            <div class="control__block mt-5">
                <a href="#" class="createBtn createDisciplineBtn">Создать дисциплину</a>
            </div>
        @endif
        <div style="background: #6162FD" ; class="discipline_filter__block  my-4 py-2 px-2 rounded">
            <form action="{{route('disciplines.index')}}" method="get"
                  class="flex gap-2 flex-col sm:flex-row items-center w-full">
                @csrf
                <div class="flex items-center gap-2 w-full  max-w-auto flex-col sm:flex-row">
                    <input type="text" class="p-0 px-2 py-1 rounded w-full" name="title" placeholder="Название">
                </div>
                <div class="flex items-center gap-2 w-full max-w-auto flex-col sm:flex-row">
                    <label for="specialty_id" class="text-white">Специальность</label>
                    <select name="specialty_id" id="specialty_id" class="p-0 px-2 py-1 rounded w-full  grow">
                        <option selected value="">Выберите специальность</option>
                        @foreach($specialties as $specialization)
                            <option value="{{$specialization->id}}"
                                    name="specialty_id">{{$specialization->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex w-full items-center justify-end gap-2">
                    <a href="{{route('disciplines.index')}}"
                       class="text-center bg-gray-50 px-3 py-1.5 h-max rounded  w-full sm:w-auto hover:no-underline">Сбросить
                    </a>
                    <button type="submit" class="bg-gray-50 px-3 py-1.5 h-max rounded  w-full sm:w-auto" value="type"
                            name="type">Найти
                    </button>
                </div>
            </form>
        </div>
        <div class="table__block">
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
                        <form action="" method="post"
                              class="disciplineForm" data-discipline-id="{{$discipline->id}}">
                            @csrf


                            <td class="grow">
                                <div>
                                    <input
                                        class="discipline__title p-0 px-2 !w-full" type="text"
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
                                        <button
                                            data-discipline-id="{{$discipline->id}}"
                                            type="submit"
                                            class="text-white rounded px-4 bg-red-500 hover:bg-blue-700"
                                            value="delete" name="value">Удалить
                                        </button>

                                        <div>
                                        </div>

                                        <button
                                            data-discipline-id="{{$discipline->id}}"
                                            type="submit"
                                            class="disciplineEditBtn text-white rounded px-4 bg-green-500 hover:bg-blue-700"
                                            value="edit" name="value">Изменить
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-8 paginate__block">
            {{$disciplines->withQueryString()->links()}}
        </div>
        @if($disciplines->isEmpty())
            <p class="my-8 text-xl">По вашему запросу ничего не найдено!</p>
        @endif

    </div>
    <div class="form__overlay min-h-screen  fixed  top-0">

    </div>


    <form action="" method="post"
          class="createForm mx-auto flex flex-col gap-2 absolute createDisciplineForm">
        @csrf
        <div>
            <label for="title">Название</label>
            <input type="text" class="d-title" id="title" name="title" required>
        </div>
        <div>
            <label for="title">Специальность</label>
            <select id="" name="specialty_id" class="spec-id">
                @foreach($specialties as $specialization)
                    <option value="{{$specialization->id}}"
                            name="specialty_id">{{$specialization->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col gap-2">
            <a href="#" class="createForm__close absolute">
                <svg fill="#000000" width="40px" height="40px" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.707,8.707,13.414,12l3.293,3.293a1,1,0,1,1-1.414,1.414L12,13.414,8.707,16.707a1,1,0,1,1-1.414-1.414L10.586,12,7.293,8.707A1,1,0,1,1,8.707,7.293L12,10.586l3.293-3.293a1,1,0,1,1,1.414,1.414Z"/>
                </svg>
            </a>
            <button type="submit">Создать</button>
        </div>
    </form>
@endsection

