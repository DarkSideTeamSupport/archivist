@extends('layouts.main')
@section('content')
    <div class="max-w-[1500px] px-[10px] mx-auto">
        <div class="mt-6">
           <p>Выберите параметры выгрузки акта</p>
            <form action="{{route('convertToPDF')}}" method="post" class="flex flex-col gap-3 mt-2" target="_blank">
                @csrf

                <select name="defence_id" id="defence_id" class="p-0 px-2 py-1 rounded w-full">
                    <option value="" name="defence_id">Выберите защиту</option>
                    @foreach($defences as $defence)
                        <option value="{{$defence->id}}"
                                name="defence_id">{{$defence->reportDiscipline->discipline->title}} {{$defence->reportDiscipline->reportType->title}} {{$defence->reportDiscipline->group->title}}</option>
                    @endforeach
                </select>

                <button type="submit" class="bg-indigo-500 p-2 rounded my-3 text-white">Конвертировать в PDF</button>
            </form>
        </div>
    </div>
@endsection
