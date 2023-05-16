<?php

namespace App\Http\Controllers\DefenceReport;

use App\Http\Controllers\Controller;
use App\Models\Defence;
use App\Models\DefenceReport;
use App\Models\Group;
use App\Models\ReportType;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class ConvertController extends Controller
{
    public function index(Request $request)
    {
        $reportDefences = DefenceReport::with('commission', 'director', 'defence', 'student')->get();
        $groups = Group::orderBy('title')->get();
        $defences = Defence::with('commission', 'reportDiscipline')->get();
        $reportTypes = ReportType::orderBy('title')->get();
        return view('defenceReports.uploadReports', compact('groups', 'reportTypes', 'defences', 'reportDefences'));

    }

    public function convertDocToPDF(Request $request)
    {

        $reportDefences = DefenceReport::with('commission', 'director', 'defence', 'student')
            ->whereHas('defence', function ($q) use ($request) {
                $q->where('defence_id', '=', $request->defence_id);
            })->get();


        if (!$reportDefences->isEmpty()) {
            $pdf = PDF::loadView('pdf', array('reportDefences' => $reportDefences))->setPaper('a4', 'portrait');
            return $pdf->stream();
        } else {
            return back();
        }


    }
}
