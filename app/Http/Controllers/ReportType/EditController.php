<?php

namespace App\Http\Controllers\ReportType;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportType\EditRequest;
use App\Models\ReportType;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(EditRequest $request, ReportType $reportType)
    {
        if ($request->value == "delete") {

            try {
                $reportType->delete();
            } catch (\Throwable $e) {
                return 'Данные используются в другом месте';

            }
        } else {
            $data = $request->validated();
            $reportType->update([
                'title' => $data['title'],
            ]);
        }

        return back();
    }
}
