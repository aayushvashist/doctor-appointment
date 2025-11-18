<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $this->route('doctor'),
            'phone' => 'sometimes|string|max:15',
            'specialization_id' => 'sometimes|exists:specialties,id',
        ];
    }
}
