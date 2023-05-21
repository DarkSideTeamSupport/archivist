<?php

namespace App\Http\Controllers\DefenceReport;

use App\Http\Controllers\Controller;
use App\Models\DefenceReport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class FileUploadController extends Controller
{
    public function __invoke(DefenceReport $defenceReport)
    {
        $data = request()->validate([
            'file' => 'file'
        ]);


        $data += ['upload_date' => date('Y-m-d H:i:s')];
        $data += ['archivist_mark' => 1];


        try {

            $data['file'] = Storage::putFileAs(
                'public', $data['file'], Str::random(40) . "." . $data['file']->extension()
            );

        } catch (\Throwable $e) {
            abort(404);
        }


        $data['file'] = mb_substr($data['file'], 7, 99);


        $defenceReport->update($data);

        return back();

    }
}
