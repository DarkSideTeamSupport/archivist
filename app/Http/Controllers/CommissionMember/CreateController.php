<?php

namespace App\Http\Controllers\CommissionMember;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommissionMember\CreateRequest;
use App\Models\PersonInCommission;


class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();

        foreach ($data['user_id'] as $key => $value) {
            $data['user_id'] = $data['user_id'] = $value;
            PersonInCommission::create($data);
        }
        return redirect()->route('commissionMembers.index');
    }
}
