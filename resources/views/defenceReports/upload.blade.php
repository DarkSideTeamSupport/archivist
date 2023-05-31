@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="project__type flex">
            <form action="{{route('defenceReports.uploadIndex')}}" method="get" class="">
                <button type="submit" name="value" value="0" class="filterBtn">Все</button>
                <button type="submit" name="value" value="1" class="filterBtn coursework">Курсовая</button>
                <button type="submit" name="value" value="2" class="filterBtn">Диплом</button>

            </form>
        </div>
        <script>
            // $('.coursework').on('click').addClass('active');
            $(".coursework").on("click", function (e) {

                $(".coursework").addClass('active')
            });
        </script>
        <div class="project__list mt-12">
            @foreach($reportDefences as $reportDefence)
                <div class="project__card" data-aos="fade-up">
                    <div class="left">
                        <div>
                            <p>Дисциплина: <span>{{$reportDefence->defence->reportDiscipline->discipline->title}}</span>
                            </p>
                            <p>Группа: <span>{{$reportDefence->defence->reportDiscipline->group->title}}</span></p>
                            <p>Вид отчета: <span>{{$reportDefence->defence->reportDiscipline->reportType->title}}</span>
                            </p>
                            <p>Тема:
                                <span><?php echo ($reportDefence->theme != '') ? $reportDefence->theme : '<span class="text-red-500">не заполнено</span>' ?></span>

                            </p>
                            <p>Оценка:
                                <span><?php echo ($reportDefence->grade != '') ? $reportDefence->grade : '<span class="text-red-500">не оценено</span>' ?></span>
                            </p>
                            <p>Преподаватель:
                                <span>{{$reportDefence->director->surname}} {{$reportDefence->director->name}} {{$reportDefence->director->patronymic}}</span>
                            </p>
                            <p>Дата начала: <span>{{$reportDefence->defence->defence_date}}</span></p>
                            <p>Дата защиты: <span>{{$reportDefence->actual_delivery_date}}</span></p>
                        </div>
                        <div class="flex status__block justify-between flex-col lg:flex-row gap-4">
                            <div class="flex items-center gap-2">
                                <p>Подпись</p>
                                <div class="status

                                @if($reportDefence->status == 1)
                                    signed
@else
                                    not_signed
@endif
                                    "></div>
                            </div>
                            <div class="flex gap-4 h-auto justify-between">
                                <p class="h-min">Дата загрузки:

                                    <span><?php echo ($reportDefence->upload_date != '') ? $reportDefence->upload_date : '<span class="text-red-500">не загружалось</span>' ?>
</span>

                                </p>
                                <form action="{{route('defenceReport.download', $reportDefence->id)}}" method="get"
                                      class="h-min downloadForm">
                                    @csrf

                                    @if($reportDefence->file != "")
                                        <a class="downloadBtn hover:border-solid max-w-[200px] bg-blue-500 hover:bg-blue-600 text-white rounded py-1 px-2 w-full no-underline"
                                           href="{{ env('APP.URL') }}/storage/{{$reportDefence->file}}"
                                           target="_blank">Скачать</a>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('defenceReports.fileUpload', $reportDefence->id )}}" method="post"
                          enctype="multipart/form-data"
                          class="upload min-h-full relative max-w-[100%] md:max-w-[300px]">
                        @csrf
                        @method('PATCH')
                        <div class="flex flex-col gap-2 justify-center items-center h-full">
                            <label class="input-file">
                                <input type="file" name="file" id="file" required>
                                <span>Выберите файл</span>
                            </label>
                            <button type="submit" class="upBtn text-white rounded z-[2]" onclick="IsInputFileEmpty()">
                                Загрузить
                            </button>
                        </div>

                        <style>
                            .input-file {
                                position: relative;
                                display: inline-block;
                            }

                            .input-file span {
                                position: relative;
                                display: inline-block;
                                cursor: pointer;
                                outline: none;
                                text-decoration: none;
                                font-size: 14px;
                                vertical-align: middle;
                                color: rgb(255 255 255);
                                text-align: center;
                                border-radius: 4px;
                                background-color: #6162FDFF;
                                line-height: 22px;
                                height: 40px;
                                padding: 10px 20px;
                                box-sizing: border-box;
                                border: none;
                                margin: 0;
                                transition: background-color 0.2s;
                            }

                            .input-file input[type=file] {
                                position: absolute;
                                z-index: -1;
                                opacity: 0;
                                display: block;
                                width: 0;
                                height: 0;
                            }

                            /* Focus */
                            .input-file input[type=file]:focus + span {
                                box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
                            }

                            /* Hover/active */
                            .input-file:hover span {
                                background-color: #4f50ee;
                            }

                            .input-file:active span {
                                background-color: #2E703A;
                            }

                            /* Disabled */
                            .input-file input[type=file]:disabled + span {
                                background-color: #eee;
                            }
                        </style>
                        <script>
                            $('.input-file input[type=file]').on('change', function () {
                                let file = this.files[0];
                                $(this).next().html(file.name);
                            });
                        </script>
                    </form>
                </div>
            @endforeach
            @if($reportDefences->isEmpty())
                <p class="mt-8 text-xl">Список защит пуст</p>
            @endif
        </div>
    </div>
@endsection
