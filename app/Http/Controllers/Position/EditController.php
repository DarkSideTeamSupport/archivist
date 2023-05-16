<?php

namespace App\Http\Controllers\Position;

use App\Http\Controllers\Controller;
use App\Http\Requests\Position\EditRequest;
use App\Models\UserPosition;

class EditController extends Controller
{
    public function __invoke(EditRequest $request, UserPosition $position)
    {
        if ($request->value == "delete") {

            try {
                $position->delete();
            } catch (\Throwable $e) {
                return 'Данные используются в другом месте';

            }

        } else {
            $data = $request->validated();
            $position->update([
                'title' => $data['title'],
            ]);
        }

        return back();
    }
}
