<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class service_rendez_vous extends Pivot
{
    protected $fillable = ['rendez_vouse_id','service_id'];
}
