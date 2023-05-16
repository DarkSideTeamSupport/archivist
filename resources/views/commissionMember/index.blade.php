@extends('layouts.main')
@section('content')
    <div class="container">

        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
            <div class="control__block mt-5">
                <a href="#" class="createBtn">Добавить пользователей в коммиссию</a>
                <a href="{{route('commissions.index')}}" class="addMember">Создать коммиссию</a>
            </div>
        @endif
        <div style="background: #6162FD" ; class="commissionMember_filter__block  my-4 py-2 px-2 rounded">
            <form action="{{route('commissionMembers.index')}}" method="get"
                  class="flex gap-2 flex-col sm:flex-row items-center w-full">
                @csrf
                <div class="flex items-center gap-2 w-full max-w-auto flex-col sm:flex-row">
                    <label for="title" class="text-white">Название</label>
                    <input type="text" class="p-0 px-2 py-1 rounded w-full" name="title" id="title" placeholder="ООО ПЦ">
                </div>
                <div class="flex items-center gap-2  w-full max-w-auto flex-col sm:flex-row">
                    <label for="expiration_date" class="text-white lg:whitespace-nowrap">Окончание работы</label>
                    <input type="date" class="p-0 px-2 py-1 rounded w-full" name="expiration_date" id="expiration_date">
                </div>
                <div class="flex w-full items-center justify-end gap-2">
                    <a href="{{route('commissionMembers.index')}}"
                       class="text-center bg-gray-50 px-3 py-1.5 h-max rounded  w-full sm:w-auto hover:no-underline">Сбросить
                    </a>
                    <button type="submit" class="bg-gray-50 px-3 py-1.5 h-max rounded  w-full sm:w-auto" value="type"
                            name="type">Поиск
                    </button>
                </div>
            </form>
        </div>
        <div>
        </div>
        <div class="table__block">
            <table class="info__table border">
                <thead>
                <tr>
                    <td>Название комиссии</td>
                    <td>Члены коммиссий</td>
                    <td>Окончание работы</td>
                    <td>Управление</td>
                </tr>
                </thead>
                <tbody>
                @foreach($commissions as $commission)
                    <tr data-aos="zoom-in">
                        <td>{{$commission->title}}</td>
                        <td class="">
                            @foreach($commission->user as $user)
                                <form
                                    action="{{route('commissionMembers.edit', ['user_id' => $user->id, 'commission_id' => $commission->id])}}"
                                    method="post" class="flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <p>{{$user->surname}} {{$user->name}} {{$user->patronymic}}</p>
                                    <button type="submit">
                                        <x-close-svg-icon></x-close-svg-icon>
                                    </button>
                                </form><br/>
                            @endforeach
                        </td>
                        <td>{{$commission->expiration_date}}</td>
                        <td>
                            <form action="{{route('commissionMembers.delete', $commission->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-white rounded px-4 bg-red-500  hover:bg-blue-700">
                                    Убрать всех
                                </button>
                            </form>
                        </td>
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
        <form action="{{route('commissionMembers.create')}}" method="post"
              class="createForm mx-auto flex flex-col gap-2 absolute">
            @csrf
            <div>
                <label for="commission_id">Выберите комиссию</label>
                <select name="commission_id" id="commission_id" required>
                    @foreach($commissions as $commission)
                        <option name="commission_id" value="{{$commission->id}}">{{$commission->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col">
                <label for="user_id">Выберите пользователя</label>
                <select name="user_id[]" id="user_id" multiple="multiple"
                        class="p-0 flex flex-col  justify-center items-center w-full m-0 relative addMemberSelect"
                        required>
                    @foreach($commission_members as $commission_member)
                        <option class="px-2 py-2 w-full"
                                value="{{$commission_member->id}}">{{$commission_member->surname}} {{$commission_member->name}} {{$commission_member->patronymic}}</option>
                    @endforeach
                    @if($commission_members->isEmpty())
                        <p class="my-8 text-xl">Создайте сотрудника!</p>
                    @endif
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
                <button type="submit">Добавить</button>
            </div>
        </form>
    </div>

@endsection
