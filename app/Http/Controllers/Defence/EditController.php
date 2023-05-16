<?php

namespace App\Http\Controllers\Defence;

use App\Http\Controllers\Controller;
use App\Http\Requests\Defence\EditRequest;
use App\Models\Commission;
use App\Models\Defence;
use Illuminate\Http\Request;


class EditController extends Controller
{
    public function __invoke(EditRequest $request, Defence $defence)
    {
        if ($request->value == "delete") {

            try {
                $defence->delete();
            } catch (\Throwable $e) {
                return 'Данные используются в другом месте';

            }

        } else {
            $data = $request->validated();

            $defence->update([
                'commission_id' => $data['commission_id'],
                'report_discipline_id' => $data['report_discipline_id'],
                'defence_date' => $data['defence_date'],
            ]);
        }
        return back();
    }
}
