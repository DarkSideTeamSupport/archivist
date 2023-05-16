<?php

namespace App\Http\Controllers\Student;

use App\Http\Requests\Student\CreateRequest;

class CreateController extends BaseController
{
    public function __invoke(CreateRequest $request)
    {

        $data = $request->validated();

        try {
            $this->service->create($data, $request);
        } catch (\Throwable $e) {
            return 'Введите уникальные данные';
        }


        return redirect()->route('students.index');
    }
}
