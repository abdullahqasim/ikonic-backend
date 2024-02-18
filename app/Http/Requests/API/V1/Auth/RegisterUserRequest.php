<?php

namespace App\Http\Requests\API\V1\Auth;

use App\Http\Requests\API\V1\BaseRequest;

class RegisterUserRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|unique:users|max:150',
            'password' =>'required|string|min:8|max:32',
        ];
    }

    /**
     *
     * @param string
     * @return string
     */

    public function messages()
    {
        return [];
    }
}
