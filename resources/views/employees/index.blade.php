@extends('layouts.main')
@section('content')
    <div class="container">

        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
            <div class="control__block mt-5">
                <a href="#" class="createBtn">Создать сотрудника</a>
            </div>
        @endif
        <div style="background: #6162FD" ; class="employee_filter__block  my-4 py-2 px-2 rounded">
            <form action="{{route('employees.index')}}" method="get"
                  class="flex gap-2 flex-col sm:flex-row  w-full">
                @csrf
                <div class="flex flex-col gap-2 grow w-full">
                    <div class="flex items-center gap-2 w-full  max-w-auto flex-col sm:flex-row">
                        <input type="text" class="p-0 px-2 py-1 rounded w-full" name="surname" placeholder="Фамилия">
                    </div>
                    <div class="flex items-center gap-2 w-full  max-w-auto flex-col sm:flex-row">
                        <input type="text" class="p-0 px-2 py-1 rounded w-full" name="name" placeholder="Имя">
                    </div>
                </div>
                <div class="flex flex-col gap-2 grow w-full">
                    <div class="flex items-center gap-2 w-full  max-w-auto flex-col sm:flex-row">
                        <input type="text" class="p-0 px-2 py-1 rounded w-full" name="patronymic"
                               placeholder="Отчество">
                    </div>
                    <div class="flex items-center gap-2 w-full  max-w-auto flex-col sm:flex-row">
                        <input type="text" class="p-0 px-2 py-1 rounded w-full" name="login" placeholder="Логин">
                    </div>
                </div>
                <div class="flex flex-col gap-2 grow w-full">
                    <div class="flex items-center gap-2 w-full  max-w-auto flex-col sm:flex-row">
                        <input type="text" class="p-0 px-2 py-1 rounded w-full" name="email" placeholder="Email">
                    </div>
                    <div class="flex items-center gap-2 w-full max-w-auto flex-col sm:flex-row ">
                        <select name="role_id" id="role_id" class="p-0 px-2 py-1 rounded w-full grow">
                            <option selected value="" name="role_id">Выберите роль</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" name="role_id">{{$role->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-col gap-2 grow w-full">
                    <div class="flex items-center gap-2 w-full max-w-auto flex-col sm:flex-row">
                        <select name="position_id" id="position_id" class="p-0 px-2 py-1 rounded w-full grow">
                            <option selected value="" name="position_id">Выберите должность</option>
                            @foreach($positions as $position)
                                <option value="{{$position->id}}" name="position_id">{{$position->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center gap-2 w-full max-w-auto flex-col sm:flex-row">
                        <select name="status_id" id="status_id" class="p-0 px-2 py-1 rounded w-full grow">
                            <option selected value="" name="status_id">Выберите статус</option>
                            @foreach($statuses as $status)
                                <option value="{{$status->id}}" name="status_id">{{$status->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex w-auto items-center justify-end gap-2 sm:ml-auto">
                    <a href="{{route('employees.index')}}"
                       class="text-center bg-gray-50 px-3 py-1.5 h-max rounded  w-full sm:w-auto hover:no-underline">Сбросить
                    </a>
                    <button type="submit" class="bg-gray-50 px-3 py-1.5 h-max rounded  w-full sm:w-auto" value="type"
                            name="type">Найти
                    </button>
                </div>
            </form>
        </div>
        <div class="table__block">
            <table class="info__table border overflow-x-scroll">
                <thead>
                <tr>
                    <td>Фамилия</td>
                    <td>Имя</td>
                    <td>Отчество</td>
                    <td>Логин</td>
                    <td>Пароль</td>
                    <td>Email</td>
                    <td>Роль</td>
                    <td>Должность</td>
                    <td>Статус</td>
                    <td>Управление</td>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr data-aos="zoom-in">
                        <form action="{{route('employeeEdit.index', $employee->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <td>
                                <div><input type="text" value="{{$employee->surname}}" name="surname"></div>
                            </td>
                            <td>
                                <div><input type="text" value="{{$employee->name}}" name="name"></div>
                            </td>
                            <td>
                                <div><input type="text" value="{{$employee->patronymic}}" name="patronymic"></div>
                            </td>
                            <td>
                                <div><input type="text" value="{{$employee->login}}" name="login"></div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" value="" class="!w-full" placeholder="Пароль" name="password">
                                </div>
                            </td>
                            <td class="">
                                <div><input type="text" value="{{$employee->email}}" name="email" class="!w-full"></div>
                            </td>
                            <td class="w-[150px]">
                                <div class="select_div">
                                    <select name="role_id" id="role_id" class="border-none p-0 pl-2">
                                        <option name="role_id"
                                                value="{{$employee->role_id}}">
                                            @if($employee->role->title == 'admin')
                                                {{'Админ'}}
                                            @elseif($employee->role->title == 'educational_part')
                                                {{'Учебная часть'}}
                                            @elseif($employee->role->title == 'teacher')
                                                {{'Преподаватель'}}
                                            @elseif($employee->role->title == 'practice_department')
                                                {{'Отдел практики'}}
                                            @elseif($employee->role->title == 'commission_member')
                                                {{'Сот. комиссии'}}
                                            @else
                                                {{$employee->role->title}}
                                            @endif

                                        </option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" name="role_id">{{$role->title}}</option>
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
                                    <select name="position_id" id="position_id" class="border-none p-0 pl-2 w-[100px]">
                                        <option name="position_id"
                                                value="{{$employee->position_id}}">
                                            @if($employee->position->title == 'admin')
                                                {{"Админ"}}
                                            @elseif($employee->position->title == 'employee')
                                                {{"Сотрудник"}}
                                            @elseif($employee->position->title == 'commission_member')
                                                {{"Сот. комиссии"}}
                                            @else
                                                {{'Студент'}}
                                            @endif
                                        </option>
                                        @foreach($positions as $position)
                                            <option value="{{$position->id}}"
                                                    name="position_id">
                                                {{$position->title}}

                                            </option>
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
                                    <select name="status_id" id="status_id" class="border-none p-0 pl-2 w-[100px]">
                                        <option value="{{$employee->status_id}}">{{$employee->status->title}}</option>
                                        @foreach($statuses as $status)
                                            <option value="{{$status->id}}" name="status_id">{{$status->title}}</option>
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
                                    <button type="submit"
                                            class="bg-green-500 text-white rounded px-2 hover:bg-green-600"
                                            value="edit" name="value">
                                        Изменить
                                    </button>
                                    <button type="submit" class="bg-red-500 text-white rounded px-2 hover:bg-red-600"
                                            value="delete" name="value">
                                        Удалить
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
            {{$employees->withQueryString()->links()}}
        </div>
        @if($employees->isEmpty())
            <p class="my-8 text-xl">По вашему запросу ничего не найдено!</p>
        @endif
        <div class="form__overlay min-h-screen  fixed  top-0">

        </div>

        <form action="{{route('employeesCreate.index')}}" method="post"
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
                <input type="text" class="password" id="password" name="password" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" class="email" id="email" name="email">
            </div>
            <div>
                <label for="role">Роль</label>
                <select id="role" name="role_id">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}" name="role_id">{{$role->title}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="position">Должность</label>
                <select id="position" name="position_id">
                    @foreach($positions as $position)
                        <option value="{{$position->id}}" name="position_id">{{$position->title}}</option>
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
