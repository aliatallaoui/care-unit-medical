<?php

namespace App;

use App\RendezVous;
use App\Horaire;

use Illuminate\Database\Eloquent\Model;

    class Patient extends Model
    {
        protected $fillable =

        [
            'name','email','etat'
            ,'message','date_naissance','sexe'

        ];

    public function rendez_vouse()
    {
        return $this->hasOne('App\RendezVous');
    }




    /* public function horaire()
    {
        return $this->hasOne('App\Horaire');
    } */









}
