<?php

namespace App\Http\Controllers\DefenceReport;

use App\Http\Controllers\Controller;
use App\Http\Requests\DefenceReport\CreateRequest;
use App\Models\Defence;
use App\Models\DefenceReport;
use App\Models\User;


class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();

        $defence = Defence::with('reportDiscipline')->where('id', $data['defence_id'])->first();

        $students = User::where('group_id', $defence->reportDiscipline->group->id)->get();

        try {
            foreach ($students as $student) {
                DefenceReport::create([
                    'student_id' => $student->id,
                    'defence_id' => $data['defence_id'],
                    'commission_id' => $data['commission_id'],
                    'employee_id' => $data['employee_id'],
                    'actual_delivery_date' => $data['actual_delivery_date'],
                ]);
            }
        } catch (\Exception $e) {
            dd('Ошибка');
        }


        return response()->json([
            'status' => 200
        ]);
    }
}
