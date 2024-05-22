<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
class StoreTeamRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'year_of_foundation' => 'required|integer|digits:4|before_or_equal:' . date('Y'),
        ];
    }
}
