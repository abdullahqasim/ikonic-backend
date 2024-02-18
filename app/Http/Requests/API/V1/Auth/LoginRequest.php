<?php

namespace App\Http\Requests\API\V1\Auth;

use Illuminate\Support\Facades\Request;
use App\Http\Requests\API\V1\BaseRequest;

class LoginRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [];

        if (Request::has('email')) {
            $rules['email'] = 'required|string|email|max:150';
        }

        return $rules;
    }


    public function messages()
    {
        return [
            'email.max' => 'The email field must not exceed 150 characters in length.',
        ];
    }

}
