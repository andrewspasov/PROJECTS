<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Adjust as necessary
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        $userId = $this->route('user')->id;
    
        return [
            'username' => [
                'sometimes',
                'string',
                'max:255',
            ],
            'email' => [
                'sometimes',
                'string',
                'email',
                'max:255',
            ],
            'password' => [
                'nullable',
                'string',
                'min:8',
            ],
        ];
    }
}
