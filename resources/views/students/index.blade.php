@extends('layouts.main')
@section('content')
    <div class="container">

        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
            <div class="control__block mt-5">
                <a href="#" class="createBtn">Создать студента</a>
            </div>
        @endif
        <div style="background: #6162FD" ; class="students_filter__block  my-4 py-2 px-2 rounded">
            <form action="{{route('students.index')}}" method="get"
                  class="flex gap-2 flex-col sm:flex-row items-center w-full">
                @csrf
                <div class="flex items-center gap-2 w-full  max-w-auto flex-col sm:flex-row">
                    <input type="text" class="p-0 px-2 py-1 rounded w-full" name="surname" placeholder="Фамилия">
                </div>
                <div class="flex items-center gap-2 w-full max-w-auto flex-col sm:flex-row">
                    <select name="course" id="course" class="p-0 px-2 py-1 rounded w-full grow">
                        <option selected value="">Курс</option>
                        <option name="course" value="1">1</option>
                        <option name="course" value="2">2</option>
                        <option name="course" value="3">3</option>
                        <option name="course" value="4">4</option>
                    </select>
                </div>
                <div class="flex items-center gap-2 w-full max-w-auto flex-col sm:flex-row">
                    <select name="group_id" id="group_id" class="p-0 px-2 py-1 rounded w-full  grow">
                        <option selected value="">Группа</option>
                        @foreach($groups as $group)
                            <option value="{{$group->id}}"
                                    name="group_id">{{$group->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex w-full items-center justify-end gap-2">
                    <a href="{{route('students.index')}}"
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
                    <td>Фамилия</td>
                    <td>Имя</td>
                    <td>Отчество</td>
                    <td>Логин</td>
                    <td>Пароль</td>
                    <td class="!w-[10px]">Курс</td>
                    <td>Группа</td>
                    <td>Email</td>
                    <td>День рождения</td>
                    <td>Управление</td>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr data-aos="zoom-in">
                        <form action="{{route('student.edit', $student->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <td>
                                <div>
                                    <input type="text" value="{{$student->surname}}" name="surname">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" value="{{$student->name}}" name="name">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" value="{{$student->patronymic}}" name="patronymic">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" value="{{$student->login}}" name="login">
                                </div>
                            </td>
                            <td class="w-[100px]">
                                <div class="w-[100px]">
                                    <input type="text" value="" name="password" class="w-[100px]" placeholder="Пароль">
                                </div>
                            </td>
                            <td>
                                <div class="select_div">
                                    <select id="" class="!w-[30px] text-center !p-0" name="course">
                                        <option class="text-red-500" selected name="course"
                                                value="{{$student->course}}">
                                            @if(!empty($student->course))
                                                {{$student->course}}
                                            @else
                                                {{'-'}}
                                            @endif

                                        </option>
                                        <option name="course" value="1">1</option>
                                        <option name="course" value="2">2</option>
                                        <option name="course" value="3">3</option>
                                        <option name="course" value="4">4</option>

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
                                    <select name="group_id" id="group_id" class="rounded p-0 px-2  w-full">
                                        <option name="group_id" value="{{$student->group->id}}"
                                                selected>{{$student->group->title}}</option>
                                        @foreach($groups as $group)
                                            <option value="{{$group->id}}" name="group_id">{{$group->title}}</option>
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
                                <div>
                                    <input type="text" value="{{$student->email}}" name="email">
                                </div>
                            </td>
                            <td class="w-[50px]">
                                <div class="w-[50px]">
                                    <input type="date" value="{{$student->birthday}}" name="birthday" placeholder=""
                                           class="w-[140px]">
                                </div>
                            </td>

                            <td>
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
            {{$students->withQueryString()->links()}}
        </div>
        @if($students->isEmpty())
            <p class="my-8 text-xl">По вашему запросу ничего не найдено!</p>
        @endif
            <div class="form__overlay min-h-screen  fixed  top-0">

            </div>

            <form action="{{route('students.create')}}" method="post"
                  class="createForm mx-auto flex flex-col gap-2 absolute">
                @csrf
                <div>
                    <label for="surname">Фамилия</label>
                    <input type="text" class="surname" id="surname" name="surname" required>
                </div>
                <div>
                    <label for="name">Имя</label>
                    <input type="text" class="name" id="name" name="name" required>
                </div>
                <div>
                    <label for="patronymic">Отчество</label>
                    <input type="text" class="patronymic" id="patronymic" name="patronymic" required>
                </div>
                <div>
                    <label for="login">Логин</label>
                    <input type="text" class="login" id="login" name="login" required>
                </div>
                <div>
                    <label for="password">Пароль</label>
                    <input type="text" class="password" id="password" name="password" placeholder="мин 4 символа" required>
                </div>
                <div>
                    <label for="course">Курс</label>
                    <select name="course" id="course">
                        <option value="1" name="course">1</option>
                        <option value="2" name="course">2</option>
                        <option value="3" name="course">3</option>
                        <option value="4" name="course">4</option>
                    </select>
                </div>
                <div>
                    <label for="group_id">Группа</label>
                    <select id="group_id" name="group_id">
                        @foreach($groups as $group)
                            <option value="{{$group->id}}" name="group_id">{{$group->title}}</option>
                        @endforeach
                    </select>

                </div>

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
            </form>
    </div>
@endsection
