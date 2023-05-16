<?php

namespace App\Http\Requests\Employee;

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
            'surname' => 'string',
            'name' => 'string',
            'patronymic' => 'string',
            'login' => 'string',
            'password' => 'string|min:4',
            'email' => 'string',
            'role_id' => 'integer',
            'position_id' => 'integer',
        ];
    }
}
