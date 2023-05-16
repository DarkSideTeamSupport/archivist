<?php

namespace App\Http\Controllers\ReportType;

use App\Http\Controllers\Controller;
use App\Models\ReportType;

class IndexController extends Controller
{
    public function __invoke()
    {
        $reportTypes = ReportType::orderBy('title')->get();
        return view('reportTypes.index', compact('reportTypes'));
    }
}
