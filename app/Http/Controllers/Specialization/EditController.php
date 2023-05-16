<?php

namespace App\Http\Controllers\Specialization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Specialization\EditRequest;
use App\Models\Specialization;

class EditController extends Controller
{
    public function __invoke(EditRequest $request, Specialization $specialization)
    {
        if ($request->value == "delete") {

            try {
                $specialization->delete();
            } catch (\Throwable $e) {
                return 'Данные используются в другом месте';

            }

        } else {
            $data = $request->validated();
            $specialization->update([
                'title' => $data['title'],
                'decoding' => $data['decoding'],
            ]);
        }
        return back();
    }
}
