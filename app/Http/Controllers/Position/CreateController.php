<?php

namespace App\Http\Controllers\Position;

use App\Http\Controllers\Controller;
use App\Http\Requests\Position\CreateRequest;
use App\Models\UserPosition;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();
        UserPosition::create($data);
        return redirect()->route('positions.index');
    }
}
