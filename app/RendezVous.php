<?php

namespace App;

use App\Service;
use App\Patient;

use App\Doctor;

use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    protected $fillable =
    [
    'date_rdv','patient_id','service_id','Heure','Duree','doctor_id'
    ];


    public function service()
    {
        return $this->belongsTo('App\Service');
    }
   

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }




    /*  public function horaires()
     {
         return $this->hasMany('App\Horaires');
     } */
}
