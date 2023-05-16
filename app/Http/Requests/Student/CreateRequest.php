<?php

namespace App\Http\Requests\Student;

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
            'surname' => ['string', 'min:3'],
            'name' => ['string', 'min:2'],
            'patronymic' => ['string', 'min:3'],
            'login' => ['required', 'string', 'max:255', 'unique:users'],
            'course' => ['integer'],
            'group_id' => 'integer',
            'password' => ['required', 'min:4', 'string'],
        ];
    }
}
