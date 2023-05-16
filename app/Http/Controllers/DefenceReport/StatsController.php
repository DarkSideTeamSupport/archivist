<?php

namespace App\Http\Controllers\DefenceReport;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\Defence;
use App\Models\DefenceReport;
use App\Models\Discipline;
use App\Models\Group;
use App\Models\ReportDiscipline;
use App\Models\ReportType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{
    public function __invoke()
    {
        $surrendered = DB::table('defence_reports')
            ->where('status', '=', 1)
            ->where('file', '!=', NULL)
            ->count();

        $unreturned = DB::table('defence_reports')
            ->where('status', '=', 0)
            ->where('file', '=', NULL)
            ->count();

        $teachers = User::all()->where('role_id','=', 4);


        $DefenceReportsSurrendered = DefenceReport::with('director','defence','student')
            ->selectRaw('count(id) as reports_count, employee_id')
            ->groupBy('employee_id')
            ->where('status','=',1)
            ->where('file','!=',NULL)
            ->get();

//        $DefenceReportsStats = DB::table('defence_reports')
//            ->selectRaw('count(id) as reports_count, employee_id')
//            ->groupBy('employee_id')
//            ->where('status','=',1)
//            ->get();
//dd($DefenceReportsStats);

        return view('defenceReports.stats', compact('surrendered','unreturned','DefenceReportsSurrendered'));
    }
}
