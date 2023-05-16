<?php

namespace App\Http\Controllers\Discipline;

use App\Http\Controllers\Controller;
use App\Http\Requests\Discipline\EditRequest;
use App\Models\Discipline;
use Illuminate\Http\Response;


class EditController extends Controller
{
    public function __invoke(EditRequest $request, Discipline $discipline)
    {

        if ($request->value == "delete") {

            try {
                $discipline->delete();
                return response()->json([
                    'status'=>200,
                ]);
            } catch (\Throwable $e) {

                return response()->json([
                    'deleted'=>false,
                ],404);
            }

        } else {
            $discipline->update([
                'title' => $request['title'],
                'specialty_id' => $request['specialty_id'],

            ]);
            return response()->json([
                'status'=>'edit'
            ]);
        }

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
