<?php

namespace App\Http\Requests\API\V1\Feedback;

use App\Http\Requests\API\V1\BaseRequest;

class FeedbackRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:150',
            'category' => 'required',
            'description' => 'required|max:1000'
        ];
    }

    public function messages()
    {
        return [
            // 
        ];
    }
}
