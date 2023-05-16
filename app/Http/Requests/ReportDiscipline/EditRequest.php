<?php

namespace App\Http\Requests\ReportDiscipline;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'discipline_id' => 'integer|nullable',
            'report_id' => 'integer|nullable',
            'group_id' => 'integer|nullable',
            'user_id' => 'integer|nullable',
            'planned_delivery_date' => 'date|nullable',
        ];
    }
}
