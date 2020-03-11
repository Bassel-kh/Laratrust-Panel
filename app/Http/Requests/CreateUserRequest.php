<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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

    public function rules()
    {
        return [
            'username' => 'required|min:2|max:34|unique:users|alpha_dash',
            'password' => 'nullable|min:8|max:32|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username required.',
            'username.unique' => 'Username already in use.',
            'username.min' => 'Username needs to be above 1',
            'username.max' => 'Username needs to be below 35',
            'password.min' => 'Password needs to be above 7',
            'password.max' => 'Username needs to be below 35',
        ];
    }
}
