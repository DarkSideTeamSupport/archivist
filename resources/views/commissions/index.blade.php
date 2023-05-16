@extends('layouts.main')
@section('content')
    <div class="container">

        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
            <div class="control__block mt-5">
                <a href="#" class="createBtn">Создать комиссию</a>
                <a href="{{route('commissionMembers.index')}}" class="addMember">Добавить пользователей в коммиссию</a>
            </div>
        @endif
        <div style="background: #6162FD" ; class="discipline_filter__block  my-4 py-2 px-2 rounded">
            <form action="{{route('commissions.index')}}" method="get"
                  class="flex gap-2 flex-col sm:flex-row items-center w-full">
                @csrf
                <div class="flex items-center gap-2 w-full max-w-auto flex-col sm:flex-row">
                    <label for="title" class="text-white">Название</label>
                    <input type="text" class="p-0 px-2 py-1 rounded w-full" name="title" placeholder="ООО ПЦ">
                </div>
                <div class="flex items-center gap-2  w-full max-w-auto flex-col sm:flex-row">
                    <label for="date_of_beginning" class="text-white lg:whitespace-nowrap">Начало работы</label>
                    <input type="date" class="p-0 px-2 py-1 rounded w-full" name="date_of_beginning"
                           id="date_of_beginning">
                </div>
                <div class="flex items-center gap-2  w-full max-w-auto flex-col sm:flex-row">
                    <label for="expiration_date" class="text-white lg:whitespace-nowrap">Окончание работы</label>
                    <input type="date" class="p-0 px-2 py-1 rounded w-full" name="expiration_date" id="expiration_date">
                </div>
                <div class="flex w-full items-center justify-end gap-2">
                    <a href="{{route('commissions.index')}}"
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
                    <td>Название комиссии</td>
                    <td>Начало работы</td>
                    <td>Срок работы</td>
                    <td>Управление</td>
                </tr>
                </thead>
                <tbody>
                @foreach($commissions as $commission)
                    <tr data-aos="zoom-in">
                        <form action="{{route('commission.edit', $commission->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <td>
                                <div>
                                    <input type="text" class="w-full" value="{{$commission->title}}" name="title">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="date" class="w-full" value="{{$commission->date_of_beginning}}"
                                           name="date_of_beginning">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="date" class="w-full" value="{{$commission->expiration_date}}"
                                           name="expiration_date">
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
            {{$commissions->withQueryString()->links()}}
        </div>
        @if($commissions->isEmpty())
            <p class="my-8 text-xl">По вашему запросу ничего не найдено!</p>
        @endif
        <div class="form__overlay min-h-screen  fixed  top-0">

        </div>
        <form action="{{route('commission.create')}}" method="post"
                  class="createForm mx-auto flex flex-col gap-2 absolute">
                @csrf
                <div>
                    <label for="title">Название</label>
                    <input type="text" class="title" id="title" name="title" required>
                </div>
                <div>
                    <label for="date_of_beginning">Начало работы</label>
                    <input type="date" class="date_of_beginning" id="date_of_beginning" name="date_of_beginning"
                           required>
                </div>
                <div>
                    <label for="expiration_date">Срок работы</label>
                    <input type="date" class="expiration_date" id="expiration_date" name="expiration_date" required>
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
