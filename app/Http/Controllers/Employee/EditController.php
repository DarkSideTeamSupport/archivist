<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\EditRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EditController extends Controller
{
    public function __invoke(EditRequest $request, User $employee)
    {


        if ($request->value == 'delete') {

            try {
                $employee->delete();
            } catch (\Throwable $e) {
                return 'Данные используются в другом месте';

            }
        } else {
            $data = $request->validated();
            if (!empty($data['password'])) {
                $employee->update([
                    'surname' => $data['surname'],
                    'name' => $data['name'],
                    'patronymic' => $data['patronymic'],
                    'login' => $data['login'],
                    'password' => Hash::make($data['password']),
                    'email' => $data['email'],
                    'role_id' => $data['role_id'],
                    'position_id' => $data['position_id'],
                    'status_id' => $data['status_id'],
                ]);
            } else {
                $employee->update([
                    'surname' => $data['surname'],
                    'name' => $data['name'],
                    'patronymic' => $data['patronymic'],
                    'login' => $data['login'],
                    'email' => $data['email'],
                    'role_id' => $data['role_id'],
                    'position_id' => $data['position_id'],
                    'status_id' => $data['status_id'],
                ]);
            }

        }

        return back();

    }
}
