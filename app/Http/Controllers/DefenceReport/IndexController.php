<?php

namespace App\Http\Controllers\DefenceReport;

use App\Http\Controllers\Controller;
use App\Http\Filters\DefenceReportFilter;
use App\Models\Commission;
use App\Models\Defence;
use App\Models\DefenceReport;
use App\Models\Discipline;
use App\Models\ReportDiscipline;
use App\Models\ReportType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Auth::user()->role_id == 2) {
            return redirect()->route('defenceReports.uploadIndex');
        }

        $data = $request->validate([
            'status' => 'nullable|boolean',
            'student_id' => 'nullable|integer',
            'commission_id' => 'nullable|integer',
            'employee_id' => 'nullable|integer',
            'defence_id' => 'nullable|integer',
        ]);

        $filter = app()->make(DefenceReportFilter::class, ['queryParams' => array_filter($data)]);

        $students = User::where('role_id', 2)->where('position_id', 2)->orderBy('surname')->get();
        $disciplines = Discipline::orderBy('title')->get();
        $commissions = Commission::orderBy('title')->get();
        $groups = ReportDiscipline::with('group', 'discipline', 'reportType')->get();
        $defences = Defence::with('reportDiscipline')->get();
        $managers = User::where('role_id', '=', 4)->orderBy('surname')->get();
        $reportTypes = ReportType::orderBy('title')->get();


        $reportDefences = DefenceReport::with('commission', 'director', 'defence', 'student')->filter($filter)->paginate(5);


        return view('defenceReports.index', compact('reportDefences', 'disciplines', 'groups', 'reportTypes', 'commissions', 'defences', 'managers', 'students'));
    }
}
