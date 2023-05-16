<?php

namespace App\Http\Controllers\Discipline;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\CreateRequest;
use App\Models\Discipline;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();
        Discipline::create($data);
        return response()->json([
           'data'=>$data,
           'status'=>200
        ]);
    }
}
