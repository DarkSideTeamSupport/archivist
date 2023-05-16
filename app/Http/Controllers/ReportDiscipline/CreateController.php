<?php

namespace App\Http\Controllers\ReportDiscipline;

use App\Http\Controllers\Controller;
use App\Http\Requests\Position\CreateRequest;
use App\Http\Requests\ReportDiscipline\EditRequest;
use App\Models\UserPosition;
use App\Models\ReportDiscipline;

class CreateController extends Controller
{
    public function __invoke(EditRequest $request)
    {
        $data = $request->validated();
        ReportDiscipline::create($data);
        return back();
    }
}
