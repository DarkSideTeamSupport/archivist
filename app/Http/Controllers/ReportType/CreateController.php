<?php

namespace App\Http\Controllers\ReportType;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportType\CreateRequest;
use App\Models\ReportType;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();

        try {
            ReportType::create($data);
        } catch (\Exception $e) {
            dd('Ошибка');
        }
        return redirect()->route('reportTypes.index');
    }
}
