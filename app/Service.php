<?php

namespace App;
use App\Photo;

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


}
