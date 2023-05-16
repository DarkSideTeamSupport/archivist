<?php

namespace App\Http\Requests\DefenceReport;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status' => 'nullable|boolean',
            'student_id' => 'nullable|integer',
            'commission_id' => 'nullable|integer',
            'employee_id' => 'nullable|integer',
        ];
    }
}
