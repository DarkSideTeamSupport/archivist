<?php

namespace App\Http\Controllers\DefenceReport;

use App\Http\Controllers\Controller;
use App\Models\DefenceReport;
use Illuminate\Http\Request;


class EditController extends Controller
{
    public function __invoke(Request $request, DefenceReport $defenceReport)
    {

        if ($request->theme != '' || $request->grade != '') {

            $defenceReport->update([
                'theme' => $request['theme'],
                'grade' => $request['grade'],

            ]);
            return response()->json([
                'status' => 200,
                'value' => 'edited'
            ]);

        }

        if ($request->value == "signed") {
            $defenceReport->update([
                'status' => 1,

            ]);
            return response()->json([
                'status' => 200,
                'value' => 'signed'
            ]);
        }

//        if ($request->value == "download") {
//
//            return Storage::download($defenceReport['file']);
//        }
//        if ($request->value == "signed") {
//            $defenceReport->update([
//                'status'=>1
//            ]);
//        }
//        if ($request->value == "saveGrade") {
//            $data = $request->validate([
//                'grade'=>'integer'
//            ]);
//
//            $defenceReport->update([
//                'grade'=>$data['grade']
//            ]);
//        }
//        if ($request->value == "save") {
//
//            $data = $request->validate([
//                'theme'=>'string'
//            ]);
//
//            $defenceReport->update([
//                'theme'=>$data['theme']
//            ]);
//        }
//        return back();

    }
}
