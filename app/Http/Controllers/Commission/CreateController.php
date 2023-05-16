<?php

namespace App\Http\Controllers\Commission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comission\CreateRequest;
use App\Models\Commission;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();
        Commission::create($data);
        return redirect()->route('commissions.index');
    }
}
