<?php

namespace App\Http\Controllers\Specialization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Specialization\CreateRequest;
use App\Models\Specialization;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();

        Specialization::create($data);
        return redirect()->route('specialties.index');
    }
}
