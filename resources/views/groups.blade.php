@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="filter__block">
            <p class="filter__title">Выберите фильтры поиска</p>

            <form class="flex justify-between flex-col lg:flex-row gap-2 flex-wrap">

                <div class="form__items flex gap-2 flex-col lg:flex-row flex-wrap">
                    <select class="form-select appearance-none
                      text-base
                      font-normal
                      text-gray-700
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      focus:text-gray-700  focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option selected>Курс</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class=" appearance-none
                      text-gray-700
                      bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-gray-700  focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option selected>Дисциплина</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="appearance-none
                      text-base
                      font-normal
                      text-gray-700
                      bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-gray-700  focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option selected>Группа</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="grow appearance-none
                      text-base
                      font-normal
                      text-gray-700
                      bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-gray-700  focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option selected>Вид модуля</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="grow appearance-none
                      text-base
                      font-normal
                      text-gray-700
                      bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-gray-700  focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option selected>Комиссия</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="grow appearance-none
                      text-base
                      font-normal
                      text-gray-700
                      bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-gray-700  focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option selected>Статус</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <input type="date" name="" id="" class="text-base
                      font-normal
                      text-gray-700
                      bg-clip-padding bg-no-repeat
                      border border-solid border-gray-300
                      rounded
                      transition
                      ease-in-out
                      m-0
                      focus:text-gray-700  focus:border-blue-600 focus:outline-none">
                </div>

                <button class="search
                      rounded
                      w-auto
                      py-2
                      px-2
                      bg-white
                        ">Найти</button>
            </form>
        </div>
        <div class="modules__block">
            <p>Список модулей</p>
            <div class="module__list flex flex-col gap-4">
                <div class="module">
                    <span class="module__number">Модуль 1</span>
                    <div>
                        <p>ФИО: <span>Иванов Иван Иванович</span></p>
                        <p>Курс: <span>3</span></p>
                        <p>Дисциплина: <span>МДК 09.03</span></p>
                        <p>Преподаватель: <span>Усманов М.А.</span></p>
                        <p>Группа: <span>ИС-192</span></p>
                    </div>
                    <div>
                        <p>Статус: <span class="text-red-700">не подписан</span></p>
                        <p>Дата загрузки: <span>25.09.2023</span></p>
                    </div>
                    <form method="" action="" class="flex gap-6
                       items-end">
                        <div>
                            <a href="">Скачать</a>
                        </div>
                        <button type="submit">Подписать</button>
                    </form>
                </div>
                <div class="module">
                    <span class="module__number">Модуль 1</span>
                    <div>
                        <p>ФИО: <span>Иванов Иван Иванович</span></p>
                        <p>Курс: <span>3</span></p>
                        <p>Дисциплина: <span>МДК 09.03</span></p>
                        <p>Преподаватель: <span>Усманов М.А.</span></p>
                        <p>Группа: <span>ИС-192</span></p>
                    </div>
                    <div>
                        <p>Статус: <span class="text-green-700"> подписан</span></p>
                        <p>Дата загрузки: <span>25.09.2023</span></p>
                    </div>
                    <form method="" action="" class="flex gap-6
                       items-end">
                        <div>
                            <a href="">Скачать</a>
                        </div>
                        <button type="submit">Подписать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
