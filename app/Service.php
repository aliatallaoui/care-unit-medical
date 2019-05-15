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



}
