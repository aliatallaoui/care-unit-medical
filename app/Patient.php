<?php

namespace App;

use App\RendezVous;

use Illuminate\Database\Eloquent\Model;

    class Patient extends Model
    {
        protected $fillable =

        ['name','email','etat'
        ,'message','date_naissance'

        ];

    public function rendez_vouses()
    {
        return $this->belongsToMany('App\RendezVous', 'patient_rendez_vouse', 'patient_id', 'rendez_vouse_id')->withTimestamps();
    }



}
