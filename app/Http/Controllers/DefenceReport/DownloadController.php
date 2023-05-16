<?php

namespace App\Http\Controllers\DefenceReport;

use App\Http\Controllers\Controller;
use App\Models\DefenceReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function __invoke(Request $request, DefenceReport $defenceReport)
    {


//        return Storage::download($defenceReport['file']);
        return response()->json([
            'status' => 200,
            'value' => $defenceReport['file'],
        ]);
    }
}
