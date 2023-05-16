@extends('layouts.main')
@section('content')
    <div class="container">

        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
            <div class="control__block mt-5">
                <a href="#" class="createBtn">Создать вид отчета</a>
            </div>
        @endif
        <div class="table__block mt-4">
            <table class="info__table border">
                <thead>
                <tr>
                    <td class="w-full">Название</td>
                    <td>Управление</td>
                </tr>
                </thead>
                <tbody>
                @foreach($reportTypes as $reportType)
                    <tr data-aos="zoom-in">
                        <form action="{{route('reportTypes.edit', $reportType->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <td>
                                <div>
                                    <input type="text" class="w-full" value="{{$reportType->title}}" name="title" required>
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
        @if($reportTypes->isEmpty())
            <p class="my-8 text-xl">По вашему запросу ничего не найдено!</p>
        @endif
            <div class="form__overlay min-h-screen  fixed  top-0">

            </div>

            <form action="{{route('reportTypes.create')}}" method="post" class="createForm mx-auto flex flex-col gap-2 absolute">
                @csrf
                <div>
                    <label for="title">Название</label>
                    <input type="text" class="title" id="title" name="title">
                </div>
                <div class="flex flex-col gap-2">
                    <a href="" class="createForm__close absolute">
                        <svg fill="#000000" width="40px" height="40px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16.707,8.707,13.414,12l3.293,3.293a1,1,0,1,1-1.414,1.414L12,13.414,8.707,16.707a1,1,0,1,1-1.414-1.414L10.586,12,7.293,8.707A1,1,0,1,1,8.707,7.293L12,10.586l3.293-3.293a1,1,0,1,1,1.414,1.414Z"/></svg>
                    </a>
                    <button type="submit">Создать</button>
                </div>
            </form>

    </div>
@endsection
