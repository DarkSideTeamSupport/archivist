<?php

namespace App\Http\Controllers\Commission;

use App\Http\Controllers\Controller;
use App\Http\Filters\CommissionFilter;
use App\Http\Requests\Comission\FilterRequest;
use App\Models\Commission;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {


        $data = $request->validated();

        $filter = app()->make(CommissionFilter::class, ['queryParams' => array_filter($data)]);
        $commissions = Commission::orderBy('title')->filter($filter)->paginate(10);

        return view('commissions.index', compact('commissions'));
    }
}
