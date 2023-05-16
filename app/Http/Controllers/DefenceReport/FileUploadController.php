<?php

namespace App\Http\Controllers\DefenceReport;

use App\Http\Controllers\Controller;
use App\Models\DefenceReport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class FileUploadController extends Controller
{
    public function __invoke(DefenceReport $defenceReport)
    {
        $data = request()->validate([
            'file' => 'file'
        ]);

        $data += ['upload_date' => date('d.m.Y H:i')];
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
