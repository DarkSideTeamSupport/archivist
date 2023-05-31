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


        try {
            foreach ($data['user_id'] as $key => $value) {

                $data['user_id'] = $data['user_id'] = $value;

                $checkPerson = PersonInCommission::with('person')->where('commission_id', $data['commission_id'])->where('user_id', $data['user_id'])->first();

                if (!$checkPerson) {
                    PersonInCommission::create($data);

                } else {
                    dd('Сотрудник ' . $checkPerson->person->surname . ' ' . $checkPerson->person->name . ' ' . $checkPerson->person->patronymic . ' ' . 'уже записан в данную комиссию');
                }

            }
        } catch (\Exception $e) {
            dd('Укажите сотрудника');
        }

        return redirect()->route('commissionMembers.index');
    }
}
