<?php

namespace App\Http\Requests\Defence;

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
            'commission_id' => 'nullable|integer',
            'report_discipline_id' => 'nullable|integer',
            'defence_date' => 'nullable|date',
        ];
    }
}
