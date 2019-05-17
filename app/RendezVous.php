<?php

namespace App;
use App\Service;
use App\Patient;
use App\RendezVous;

use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    protected $fillable =
    [
    'date_rdv',
    ];


    public function services()
    {
        return $this->belongsToMany('App\Service', 'service_rendez_vouse', 'rendez_vouse_id', 'service_id')->withTimestamps();
    }

    public function patients()
    {
        return $this->belongsToMany('App\Patient', 'patient_rendez_vouse', 'rendez_vouse_id', 'patient_id')->withTimestamps();
    }




}
