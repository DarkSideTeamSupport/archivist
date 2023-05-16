<?php

namespace App\Http\Controllers\ReportType;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportType\CreateRequest;
use App\Models\ReportType;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();
        ReportType::create($data);
        return redirect()->route('reportTypes.index');
    }
}
