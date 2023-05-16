<?php

namespace App\Http\Controllers\Defence;

use App\Http\Controllers\Controller;
use App\Http\Requests\Defence\CreateRequest;
use App\Models\Defence;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();
        Defence::create($data);
        return redirect()->route('defences.index');
    }
}
