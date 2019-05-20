<?php

namespace App;
use App\Photo;
use App\RendezVous;
use App\Resource;
use App\Doctor;
use App\Horaire;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name','content','photo_id'];




    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function resources()
    {
        return $this->belongsToMany('App\Resource','resource_service');
    }

    public function doctors()
    {
        return $this->belongsToMany('App\Doctor','doctor_service');
    }

    public function rendez_vouses()
    {
        return $this->hasMany('App\RendezVous','rendez_vouse_id','service_id');
    }


    public function Etat_Doctor()
    {
        foreach ($this->doctors as $doctor) {
            if ($doctor->etat == 0) {
                return true;
            }
        }
        return false;
    }

    public function Doctor_id()
    {
        foreach ($this->doctors as $doctor) {
            if ($doctor->etat == 0) {
                return $doctor->id;
            }
        }
        return 0;
    }


    public function Etat_Resource()
    {
        foreach ($this->resources as $resource) {
            if ($resource->etat != 0) {
                return false;

            }
        }
        return true;

    }


    public function ServiceDisponible()
    {
        if($this->Etat_Doctor() && $this->Etat_Resource()){
            return true;
        }else {
            return false;
        }

    }

/*     public function Reserve()
    {
        foreach ($this->resources as $resource) {

            $resouce = Resource::findOrfail($resource->id);
            $resouce->stock = $resouce->stock -1;
            if ($resouce->stock < 1) {
                $resouce->etat = 1;
            }
            $resouce->save();

        }
        // DOctor
        $doctor_id = $this->Doctor_id();
        $doctor = Doctor::findOrfail($doctor_id);
        $doctor->etat = 1;
        $doctor->save();
        return true;

    }

    public function Retire()
    {
        foreach ($this->resources as $resource) {
            $resouce = Resource::findOrfail($resource->id);
            $resouce->stock = $resouce->stock +1;
            if ($resouce->stock > 0) {
                $resouce->etat = 0;
            }
            $resouce->save();
        }

        $doctor = Doctor::findOrfail($this->Doctor_id());
        $doctor->etat = 0;
        $doctor->save();

        return true;

    }

    public function horaires()
    {
        return $this->hasMany('App\Horaire');
    }
 */

}
