<?php

namespace App\Http\Requests\Employee;

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
            'surname' => 'string',
            'name' => 'string',
            'patronymic' => 'string',
            'login' => 'string|min:4',
            'password' => 'string|min:4|nullable',
            'email' => 'string|nullable',
            'role_id' => 'integer',
            'position_id' => 'integer',
            'status_id' => 'integer',
            'value' => 'string',

        ];
    }
}
