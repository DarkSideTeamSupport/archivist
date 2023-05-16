<?php

namespace App\Http\Requests\Employee;

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
            'surname' => 'nullable|string',
            'name' => 'nullable|string',
            'patronymic' => 'nullable|string',
            'login' => 'nullable|string',
            'email' => 'nullable|string',
            'role_id' => 'nullable|integer',
            'position_id' => 'nullable|integer',
            'status_id' => 'nullable|integer',
        ];
    }
}
