<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RendezVousRequest extends FormRequest
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
        return [

            /* 'date_rdv'=>'required',
            'Duree'=>'required',
            'Heure'=>'required',
            'service_id'=>'required',
            'doctor_id'=>'required',
            'patient_id'=>'required', */
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'etat'=>'required',
            'sexe'=>'required'
            ,'message'=>'required',

        ];
    }
}
