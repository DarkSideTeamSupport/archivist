<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Filters\DisciplineFilter;
use App\Http\Filters\GroupFilter;
use App\Http\Requests\Group\FilterRequest;
use App\Models\DefenceReport;
use App\Models\Discipline;
use App\Models\Group;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(GroupFilter::class, ['queryParams' => array_filter($data)]);
        $groups = Group::withCount('specialty','students')->orderBy('title')->filter($filter)->paginate(10);


        $specialties = Specialization::orderBy('title')->get();

        return view('groups.index', compact('groups', 'specialties'));
    }
}
