<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class patient_rendez_vous extends Pivot
{
    protected $fillable = ['rendez_vouse_id','patient_id'];
}
