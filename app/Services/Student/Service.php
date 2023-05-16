<?php


namespace App\Services\Student;


use App\Http\Requests\Student\CreateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Service
{
    public function create($data, CreateRequest $request)
    {
        $data['password'] = Hash::make($request->password);
        User::create($data);
    }

    public function delete()
    {

    }
}
