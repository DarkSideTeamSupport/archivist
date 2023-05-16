@extends('layouts.main')
@section('content')
    <div class="container">


        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
            <div class="control__block mt-5">
                <a href="#" class="createBtn">Создать специальность</a>
            </div>
        @endif
        <div style="background: #6162FD" ; class="specialties_filter__block  my-4 py-2 px-2 rounded">
            <form action="{{route('specialties.index')}}" method="get"
                  class="flex gap-2 flex-col sm:flex-row items-center w-full">
                @csrf
                <div class="flex items-center gap-2 w-full  max-w-auto flex-col sm:flex-row">
                    <label for="title" class="text-white">Название</label>
                    <input type="text" class="p-0 px-2 py-1 rounded w-full" name="title">
                </div>
                <div class="flex w-full items-center justify-end gap-2">
                    <a href="{{route('specialties.index')}}"
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
                    <td>Название специальности</td>
                    <td>Расшифровка</td>
                    <td class="w-[50px]">Управление</td>
                </tr>
                </thead>
                <tbody>
                @foreach($specialties as $specialization)
                    <tr data-aos="zoom-in">
                        <form action="{{route('specialties.edit', $specialization->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <td>
                                <div>
                                    <input type="text" value="{{$specialization->title}}" name="title">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" value="{{$specialization->decoding}}" name="decoding"
                                           class="w-full">
                                </div>
                            </td>
                            <td class="w-[200px]">
                                <div>
                                    <button type="submit"
                                            class="text-white bg-green-500 rounded px-2 w-full hover:bg-blue-700"
                                            name="value" value="edit">Изменить
                                    </button>
                                    <button type="submit"
                                            class="text-white bg-red-500 rounded px-2 w-full hover:bg-blue-700"
                                            name="value" value="delete">Удалить
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
            {{$specialties->withQueryString()->links()}}
        </div>
        @if($specialties->isEmpty())
            <p class="my-8 text-xl">По вашему запросу ничего не найдено!</p>
        @endif
        <div class="form__overlay min-h-screen  fixed  top-0">

        </div>
        <form action="" method="post"
              class="createForm mx-auto flex flex-col gap-2 absolute createSpecialtiesForm">
            @csrf
            <div>
                <label for="title">Название</label>
                <input type="text" class="title" id="title" name="title" required>
            </div>
            <div>
                <label for="decoding">Расшифровка</label>
                <input type="text" class="decoding" id="decoding" name="decoding">
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
