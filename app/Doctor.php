<?php

namespace App;

use App\Specialite;
use App\Horaire;
use Carbon\Carbon;
use App\RendezVous;



use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['name','phone_number','specialite_id','photo_id','etat'];

    public function specialite()
    {
        return $this->belongsTo('App\Specialite');
    }


    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }


    public function services()
    {
        return $this->belongsToMany('App\Service', 'doctor_service', 'doctor_id', 'service_id')->withTimestamps();
    }


    public function horaires()
    {
        return $this->hasMany('App\Horaire');
    }

    public function rendezvouses()
    {
        return $this->hasMany('App\RendezVous');
    }



    public function HeureDisponible($date_rdv)
    {
        $Heure = [       '0'=>'08:00 At 08:30',
                         '1'=>'08:30 At 09:00',
                         '2'=>'09:00 At 09:30',
                         '3'=>'09:30 At 10:00',
                         '4'=>'10:00 At 10:30',
                         '5'=>'10:30 At 11:00',
                         '6'=>'11:00 At 11:30',
                         '7'=>'11:30 At 12:00',
                         '8'=>'12:00 At 12:30',
                         '9'=>'12:30 At 13:00',
                         '10'=>'13:00 At 13:30',
                         '11'=>'13:30 At 14:00',
                         '12'=>'14:00 At 14:30',
                         '13'=>'14:30 At 15:00'

         ];
        $indice = array();
        $date_rdv_patient = Carbon::parse($date_rdv);
        //$rendezvous = RendezVous::where('doctor_id', $this->id);
        $rendezvous = $this->rendezvouses;

        foreach ($rendezvous as $rendez) {
            $date_rdv_doctor = Carbon::parse($rendez->date_rdv);
            if ($date_rdv_doctor == $date_rdv_patient) {
                foreach ($Heure as $key => $heure) {
                    if ($key == $rendez->Heure) {
                        array_push($indice, $key);
                        // unset($Heure[$key]);
                    }
                }
            }
        }
        return $indice;
    }
}
