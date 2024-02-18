<?php

namespace App\Http\Requests\API\V1\Comments;

use App\Http\Requests\API\V1\BaseRequest;

class CommentsRequest extends BaseRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'feedback_id' => 'required',
            'comment' => 'required|max:200'
        ];
    }

    public function messages()
    {
        return [
            // 
        ];
    }
}
