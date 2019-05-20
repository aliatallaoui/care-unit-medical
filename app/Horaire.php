<?php

namespace App;
use App\Service;
use App\Doctor;

use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    protected $fillable = ['title','patient_id','rendez_vouse_id','service_id','doctor_id','start_date','end_date'];



    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function service()
    {
        return $this->belongsTo('App\Service');
    }


    public function rendezvous()
    {
        return $this->hasOne('App\RendezVous');
    }











}
