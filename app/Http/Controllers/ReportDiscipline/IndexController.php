<?php

namespace App\Http\Controllers\ReportDiscipline;

use App\Http\Controllers\Controller;
use App\Http\Filters\ReportDisciplineFilter;
use App\Http\Requests\ReportDiscipline\FilterRequest;
use App\Models\Discipline;
use App\Models\Group;
use App\Models\ReportDiscipline;
use App\Models\ReportType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        if (Auth::user()->role_id == 2) {
            return redirect()->route('defenceReports.uploadIndex');
        }
        $data = $request->validated();

        $filter = app()->make(ReportDisciplineFilter::class, ['queryParams' => array_filter($data)]);

        $reportDisciplines = ReportDiscipline::with('group', 'teacher', 'discipline', 'reportType')->filter($filter)->paginate(10);

        $disciplines = Discipline::orderBy('title')->get();
        $reportTypes = ReportType::orderBy('title')->get();
        $groups = Group::orderBy('title')->get();
        $managers = User::where('role_id', '=', 4)->orderBy('surname')->get();


        return view('reportDisciplines.index', compact('reportDisciplines', 'disciplines', 'reportTypes', 'groups', 'managers'));
    }
}
