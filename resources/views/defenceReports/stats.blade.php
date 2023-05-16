@extends('layouts.main')
@section('content')
    <div class="max-w-[1500px] px-[10px] mx-auto">
        <div class="mt-6">
            <p class="text-lg">Общее количество сданных работ:</p>
            <div class="my-2">
                <p>Кол-во сданных работ: {{$surrendered}}</p>
                <p>Кол-во не сданных работ: {{$unreturned}}</p>
            </div>
            <p class="text-lg">Количество сданных работ по преподавателям:</p>
            @foreach($DefenceReportsSurrendered as $DefenceReportSurrendered)
                <div class="my-2">
                    <p>{{$DefenceReportSurrendered->director->surname}} {{$DefenceReportSurrendered->director->name}} {{$DefenceReportSurrendered->director->patronymic}}:
                    <span>
                        {{$DefenceReportSurrendered->reports_count}}
                    </span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
