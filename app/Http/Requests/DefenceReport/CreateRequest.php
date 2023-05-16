<?php

namespace App\Http\Requests\DefenceReport;

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
            'employee_id' => 'integer',
            'defence_id' => 'integer',
            'commission_id' => 'integer',
            'actual_delivery_date' => 'date',

        ];
    }
}
