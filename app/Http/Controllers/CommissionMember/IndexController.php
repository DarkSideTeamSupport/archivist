<?php

namespace App\Http\Controllers\CommissionMember;

use App\Http\Controllers\Controller;
use App\Http\Filters\CommissionMemberFilter;
use App\Http\Requests\CommissionMember\FilterRequest;
use App\Models\Commission;
use App\Models\User;

class IndexController extends Controller
{

    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(CommissionMemberFilter::class, ['queryParams' => array_filter($data)]);

        $commissions = Commission::with('persons', 'user')->orderBy('title')->filter($filter)->paginate(4);

        $commission_members = User::where('user_id', '=', 4)
            ->orWhere('user_id', 6)
            ->orWhere('position_id', 3)
            ->orWhere('position_id', 4)
            ->orderBy('surname')
            ->get();


        return view('commissionMember.index', compact('commissions', 'commission_members'));
    }

}
