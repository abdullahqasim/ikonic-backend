<?php

namespace App\Http\Requests\API\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {

        $formattedErrors = null;

        foreach ($validator->errors()->messages() as $field => $messages) {
            foreach ($messages as $message) {
                $formattedErrors[] = [
                    'type' => $field,
                    'message' => $message,
                ];
            }
        }

        throw new HttpResponseException(response()->json([
            'success' => false,
            'data' => null,
            'errors' => $formattedErrors,
        ]));
    }
}
