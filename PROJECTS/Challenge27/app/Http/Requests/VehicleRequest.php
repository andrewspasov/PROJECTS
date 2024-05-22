<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'brand' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'plate_number' => 'required|string|max:255|unique:vehicles',
                'insurance_date' => 'required|date',
            ];
        } else {
            return [
                'brand' => 'sometimes|string|max:255',
                'model' => 'sometimes|string|max:255',
                'plate_number' => 'sometimes|string|max:255|unique:vehicles,plate_number,' . $this->vehicle->id,
                'insurance_date' => 'sometimes|date',
            ];
        }
    }
}
