<?php

namespace App\Http\Requests\Defence;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'commission_id' => 'integer',
            'report_discipline_id' => 'integer',
            'defence_date' => 'date'
        ];
    }
}
