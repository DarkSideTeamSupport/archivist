<?php

namespace App\Http\Controllers\Discipline;

use App\Http\Controllers\Controller;
use App\Http\Filters\DisciplineFilter;
use App\Http\Requests\Discipline\FilterRequest;
use App\Models\Discipline;
use App\Models\Specialization;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {

        $data = $request->validated();

        $filter = app()->make(DisciplineFilter::class, ['queryParams' => array_filter($data)]);

        $disciplines = Discipline::orderBy('title')->filter($filter)->paginate(10);


        $specialties = Specialization::orderBy('title')->get();

        return view('disciplines.index', compact('disciplines', 'specialties'));
    }
}
