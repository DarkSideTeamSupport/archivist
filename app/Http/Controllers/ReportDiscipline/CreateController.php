<?php

namespace App\Http\Controllers\ReportDiscipline;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportDiscipline\EditRequest;
use App\Models\ReportDiscipline;

class CreateController extends Controller
{
    public function __invoke(EditRequest $request)
    {

        $data = $request->validated();

        try {
            ReportDiscipline::create($data);
        } catch (\Exception $e) {
            dd('Ошибка');
        }
        return back();
    }
}
