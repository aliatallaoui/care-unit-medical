<?php

namespace App;
use App\Service;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
        'name',
        'stock',
        'etat',
    ];

    public function services()
    {
        return $this->belongsToMany('App\Service','resource_service','resource_id','service_id')->withTimestamps();;
    }

}
