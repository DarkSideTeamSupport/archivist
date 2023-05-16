<?php

namespace App\Http\Controllers\Student;

use App\Http\Requests\Student\EditRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EditController extends BaseController
{
    public function __invoke(EditRequest $request, User $student)
    {
        if ($request->value == "edit") {
            $data = $request->validated();
            if (!empty($data['password'])) {
                $student->update([
                    'surname' => $data['surname'],
                    'name' => $data['name'],
                    'patronymic' => $data['patronymic'],
                    'login' => $data['login'],
                    'email' => $data['email'],
                    'course' => $data['course'],
                    'group_id' => $data['group_id'],
                    'birthday' => $data['birthday'],
                    'password' => Hash::make($data['password']),
                ]);
            } else {
                $student->update([
                    'surname' => $data['surname'],
                    'name' => $data['name'],
                    'patronymic' => $data['patronymic'],
                    'login' => $data['login'],
                    'email' => $data['email'],
                    'course' => $data['course'],
                    'group_id' => $data['group_id'],
                    'birthday' => $data['birthday'],
                ]);
            }

        } else {
            try {
                $student->delete();
            } catch (\Throwable $e) {
                return 'Данные используются в другом месте';

            }
        }
        return back();
    }
}
