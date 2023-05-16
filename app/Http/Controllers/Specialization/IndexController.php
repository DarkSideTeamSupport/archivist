<?php

namespace App\Http\Controllers\Specialization;

use App\Http\Controllers\Controller;
use App\Http\Filters\DisciplineFilter;
use App\Http\Filters\SpecializationFilter;
use App\Http\Requests\Specialization\FilterRequest;
use App\Models\Discipline;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(SpecializationFilter::class, ['queryParams' => array_filter($data)]);

        $specialties = Specialization::orderBy('title')->filter($filter)->paginate(10);

        return view('specialties.index', compact('specialties'));
    }
}
