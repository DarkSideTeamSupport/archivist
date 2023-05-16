<?php

namespace App\Http\Controllers\DefenceReport;

use App\Http\Controllers\Controller;
use App\Models\DefenceReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function __invoke(Request $request)
    {


        if ($request->value == 1) {
            $reportDefences = DefenceReport::with('commission', 'director', 'defence', 'student')
                ->where('student_id', '=', Auth::user()->id)
                ->whereHas('defence.reportDiscipline.reportType', function ($q) use ($request) {
                    $q->where('id', '=', 1);
                })->get();
            return view('defenceReports.upload', compact('reportDefences'));
        } elseif ($request->value == 2) {
            $reportDefences = DefenceReport::with('commission', 'director', 'defence', 'student')
                ->where('student_id', '=', Auth::user()->id)
                ->whereHas('defence.reportDiscipline.reportType', function ($q) use ($request) {
                    $q->where('id', '=', 2);
                })->get();
            return view('defenceReports.upload', compact('reportDefences'));
        } else {
            $reportDefences = DefenceReport::with('commission', 'director', 'defence', 'student')->where('student_id', '=', Auth::user()->id)->get();
            return view('defenceReports.upload', compact('reportDefences'));
        }

//        if ($request->value == 2) {
//
//            foreach ($reportDefences as $key => $item) {
//                if ($item->defence->reportDiscipline->reportType->id != 2) {
//                    $reportDefences->forget($key);
//                }
//            }
//            return view('defenceReports.upload', compact('reportDefences'));
//        }
//        if ($request->value == 1) {
//            foreach ($reportDefences as $key => $item) {
//                if ($item->defence->reportDiscipline->reportType->id != 1) {
//                    $reportDefences->forget($key);
//                }
//            }
//            return view('defenceReports.upload', compact('reportDefences'));
//        }
//
//        if ($request->value != 1 && $request->value != 2 && $request->value == 0) {
//
//            return view('defenceReports.upload', compact('reportDefences'));
//        }

    }
}
