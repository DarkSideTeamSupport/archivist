<?php

namespace App\Http\Controllers\Commission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comission\EditRequest;
use App\Models\Commission;


class EditController extends Controller
{
    public function __invoke(EditRequest $request, Commission $commission)
    {
        if ($request->value == "delete") {

            try {
                $commission->delete();
            } catch (\Throwable $e) {
                return 'Данные используются в другом месте';

            }

        } else {
            $data = $request->validated();
            $commission->update([
                'title' => $data['title'],
                'date_of_beginning' => $data['date_of_beginning'],
                'expiration_date' => $data['expiration_date'],
            ]);
        }

        return back();
    }
}
