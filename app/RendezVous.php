<?php

namespace App;
use App\Service;
use App\Patient;

use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    protected $fillable =
    ['service_id',
    'date_rdv',
    'patient_id'];

    public function service()
    {
        return $this->belongsTo('App\Service');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
