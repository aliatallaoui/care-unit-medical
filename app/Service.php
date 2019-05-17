<?php

namespace App;
use App\Photo;
use App\RendezVous;
use App\Resource;
use App\Doctor;

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
        return $this->belongsToMany('App\RendezVous', 'service_rendez_vouse', 'service_id', 'rendez_vouse_id')->withTimestamps();
    }



}
