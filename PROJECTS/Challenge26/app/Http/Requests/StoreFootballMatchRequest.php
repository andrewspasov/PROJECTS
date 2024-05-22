<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFootballMatchRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check() && auth()->user()->isAdmin();
    }


    public function rules()
    {
        return [
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id|different:team1_id',
            'match_date' => 'required|date|after_or_equal:today',
            'players' => 'nullable|array',
            'players.*' => 'exists:players,id'
        ];
    }

    public function messages()
    {
        return [
            'team2_id.different' => 'The guest team must be different from the home team.',
            'team1_id.required' => 'Selecting a home team is required.',
            'team2_id.required' => 'Selecting a guest team is required.',
        ];
    }
}
