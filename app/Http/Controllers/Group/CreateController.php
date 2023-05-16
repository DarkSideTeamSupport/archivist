<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\CreateRequest;
use App\Models\Group;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();


        try {
            Group::create($data);
        } catch (\Exception $e) {
            dd('Ошибка');
        }
        return redirect()->route('groups.index');
    }
}
