<?php

namespace App;
use App\Specialite;
use App\Horaire;



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
        return $this->belongsToMany('App\Service','doctor_service','doctor_id','service_id')->withTimestamps();
    }


    public function horaires()
    {
        return $this->hasMany('App\Horaire');
    }







}
