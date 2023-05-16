@extends('layouts.main')
@section('content')
    <div class="container">

        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
            <div class="control__block mt-5">
                <a href="#" class="createBtn">Создать группу</a>
            </div>
        @endif
        <div style="background: #6162FD" ; class="groups_filter__block  my-4 py-2 px-2 rounded">
            <form action="{{route('groups.index')}}" method="get"
                  class="flex gap-2 flex-col sm:flex-row  w-full">
                @csrf
                <div class="flex items-center gap-2 w-full  sm:max-w-[300px] flex-col sm:flex-row">
                    <input type="text" class="p-0 px-2 py-1 rounded w-full" name="title" id="title"
                           placeholder="Название">
                </div>
                <div class="flex items-center gap-2 w-full max-w-auto flex-col sm:flex-row sm:max-w-[500px]">
                    <select name="specialty_id" id="specialty_id" class="p-0 px-2 py-1 rounded w-full">
                        <option selected value="specialty_id" name="specialty_id">Выберите специальность</option>
                        @foreach($specialties as $specialization)
                            <option value="{{$specialization->id}}"
                                    name="specialty_id">{{$specialization->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex  items-center justify-end gap-2 sm:ml-auto">
                    <a href="{{route('groups.index')}}"
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
                    <td>Название группы</td>
                    <td>Специальность</td>
                    <td class="w-[50px]">Студентов</td>
                    <td class="w-[50px]">Управление</td>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr data-aos="zoom-in">
                        <form action="{{route('groups.edit', $group->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <td>
                                <div>
                                    <input type="text" value="{{$group->title}}" name="title">
                                </div>
                            </td>
                            <td>
                                <div class="select_div">
                                    <select name="specialty_id" id="" class="rounded p-0 px-2 !bg-black w-full">
                                        <option value="{{$group->specialty->id}}"
                                                name="specialty_id" selected>{{$group->specialty->title}}</option>
                                        @foreach($specialties as $specialty)
                                            <option name="specialty_id" value="{{$specialty->id}}">{{$specialty->title}}</option>
                                        @endforeach
                                    </select>
                                    <svg class="" fill="#000000" width="64px" height="64px" viewBox="-3.2 -3.2 38.40 38.40" version="1.1" xmlns="http://www.w3.org/2000/svg" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.064"></g><g id="SVGRepo_iconCarrier"> <path d="M0.256 8.606c0-0.269 0.106-0.544 0.313-0.75 0.412-0.412 1.087-0.412 1.5 0l14.119 14.119 13.913-13.912c0.413-0.412 1.087-0.412 1.5 0s0.413 1.088 0 1.5l-14.663 14.669c-0.413 0.413-1.088 0.413-1.5 0l-14.869-14.869c-0.213-0.213-0.313-0.481-0.313-0.756z"></path> </g></svg>
                                </div>
                            </td>
                            <td>{{$group->students_count}}</td>
                            <td>
                                <div class="flex items-center !flex-row justify-between">
                                    <button type="submit" class="text-white rounded px-4 bg-red-500  hover:bg-blue-700" value="delete" name="value">Удалить</button>
                                    <button type="submit" class="text-white rounded px-4 bg-green-500 hover:bg-blue-700" value="edit" name="value">Изменить</button>
                                </div>
                            </td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-8 paginate__block">
            {{$groups->withQueryString()->links()}}
        </div>
        @if($groups->isEmpty())
            <p class="my-8 text-xl">По вашему запросу ничего не найдено!</p>
        @endif
            <div class="form__overlay min-h-screen  fixed  top-0">

            </div>

            <form action="" method="post"
                  class="createForm mx-auto flex flex-col gap-2 absolute createGroupForm">
                @csrf
                <div>
                    <label for="title">Название</label>
                    <input type="text" class="title" id="title" name="title" required>
                </div>
                <div>
                    <label for="title">Специальность</label>
                    <select id="" name="specialty_id">
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
    </div>
@endsection
