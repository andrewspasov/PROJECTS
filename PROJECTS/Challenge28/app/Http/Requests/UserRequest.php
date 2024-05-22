<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Implement your authorization logic here, if needed
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        $userId = $this->user ? $this->user->id : null;
        
        return [
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ],
            'password' => $this->isMethod('put') ? 'sometimes|required|string|min:8' : 'required|string|min:8',
        ];
    }
}
