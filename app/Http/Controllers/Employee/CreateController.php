<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\CreateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        try {
            User::create($data);
        } catch (\Throwable $e) {

            return 'Введите уникальные данные';

        }
        return redirect()->route('employees.index');
    }
}
