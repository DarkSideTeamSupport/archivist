<?php

namespace App\Http\Controllers\ReportDiscipline;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportDiscipline\EditRequest;
use App\Models\ReportDiscipline;
use Illuminate\Http\Request;


class EditController extends Controller
{
    public function __invoke(EditRequest $request, ReportDiscipline $reportDiscipline)
    {

        if ($request->value == "delete") {

            try {
                $reportDiscipline->delete();
            } catch (\Throwable $e) {
                return 'Данные используются в другом месте';

            }

        } else {
            $data = $request->validated();
            $reportDiscipline->update([
                'discipline_id' => $data['discipline_id'],
                'report_id' => $data['report_id'],
                'group_id' => $data['group_id'],
                'user_id' => $data['user_id'],
                'planned_delivery_date' => $data['planned_delivery_date'],
            ]);
        }
        return back();
    }
}
