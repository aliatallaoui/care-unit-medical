<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      //  `name`, `phone_number`, `specialite_id`, `photo_id`, `etat
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'max:20'],
            'specialite_id' => 'required',
            'etat' => 'required',
        ];


    }
}
