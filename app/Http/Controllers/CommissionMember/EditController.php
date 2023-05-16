<?php

namespace App\Http\Controllers\CommissionMember;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommissionMember\EditRequest;
use App\Models\Commission;
use App\Models\PersonInCommission;
use App\Models\User;
use Illuminate\Http\Request;


class EditController extends Controller
{
    public function __invoke(EditRequest $request , Commission $commission, User $user)
    {

        PersonInCommission::where('commission_id',$request->commission_id)->where('user_id',$request->user_id)->delete();

        return back();
    }
}
