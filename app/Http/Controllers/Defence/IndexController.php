<?php

namespace App\Http\Controllers\Defence;

use App\Http\Controllers\Controller;
use App\Http\Filters\DefenceFilter;
use App\Http\Requests\Defence\FilterRequest;
use App\Models\Commission;
use App\Models\Defence;
use App\Models\ReportDiscipline;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        if (Auth::user()->role_id == 2) {
            return redirect()->route('defenceReports.uploadIndex');
        }
        $data = $request->validated();

        $filter = app()->make(DefenceFilter::class, ['queryParams' => array_filter($data)]);


        $commissions = Commission::orderBy('title')->get();
        $reportDisciplines = ReportDiscipline::with('discipline')->get();

        $defences = Defence::with('commission', 'reportDiscipline')->filter($filter)->paginate(10);

        return view('defences.index', compact('defences', 'commissions', 'reportDisciplines'));
    }
}
