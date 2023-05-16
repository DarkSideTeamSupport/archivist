<?php

namespace App\Http\Controllers\Discipline;

use App\Http\Controllers\Controller;
use App\Http\Requests\Discipline\EditRequest;
use App\Models\Discipline;


class DeleteController extends Controller
{
    public function __invoke(EditRequest $request, Discipline $discipline)
    {

        $discipline->delete();

        return response()->json([
            'status' => 200,

        ]);
//        try {
//            $discipline->delete();
//        } catch (\Throwable $e) {
//            return 'Данные используются в другом месте';
//
//        }

//        if ($request->value == 'delete') {
//
//            try {
//                $discipline->delete();
//            } catch (\Throwable $e) {
//                return 'Данные используются в другом месте';
//
//            }
//        } else {
//
//            $data = $request->validated();
//
//            $discipline->update([
//                'title' => $data['title'],
//                'specialty_id' => $data['specialty_id'],
//            ]);
//        }

        return back();
    }
}
