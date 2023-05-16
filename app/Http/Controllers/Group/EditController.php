<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\EditRequest;
use App\Models\Group;

class EditController extends Controller
{
    public function __invoke(EditRequest $request, Group $group)
    {
        if ($request->value == "delete") {

            try {
                $group->delete();
            } catch (\Throwable $e) {
                return 'Данные используются в другом месте';

            }

        } else {
            $data = $request->validated();
            $group->update([
                'title' => $data['title'],
                'specialty_id' => $data['specialty_id'],
            ]);
        }
        return back();
    }
}
