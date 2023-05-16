@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="student__profile flex justify-center gap-8 flex-col pt-4 lg:pt-0 lg:flex-row items-center lg:border-none">
            <div class="avatar">
                <img src="https://svgx.ru/svg/1299805.svg" alt="avatar">
            </div>
            <div class="questionnaire">
                <div class="flex flex-col gap-5">
                    <div class="flex items-center gap-2 justify-between flex-wrap-reverse">
                        <div class="flex items-center gap-3 flex-wrap">
                            <p class="questionnaire__info">Обучающийся</p>
                            <span>Иванов Иван Иванович</span>
                        </div>
                        <p>id4363424</p>
                    </div>
                    <div class="flex items-center gap-3 flex-wrap">
                        <p class="questionnaire__info">Дата рождения</p>
                        <span>04.04.2000</span>
                    </div>
                    <div class="flex items-center gap-3 flex-wrap">
                        <p class="questionnaire__info">Группа</p>
                        <span>ИС-192</span>
                    </div>
                    <div class="accordion flex flex-col gap-4" id="accordionExample">


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
