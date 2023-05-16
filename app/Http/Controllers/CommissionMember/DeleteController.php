<?php

namespace App\Http\Controllers\CommissionMember;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\PersonInCommission;
use Illuminate\Http\Request;


class DeleteController extends Controller
{
    public function __invoke(Request $request , Commission $commission)
    {
        PersonInCommission::where('commission_id', $commission->id)->delete();

//        $commission->delete();
        return redirect()->route('commissionMembers.index');
    }
}
