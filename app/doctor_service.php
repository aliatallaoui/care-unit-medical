<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class doctor_service extends Pivot
{
    protected $fillable = ['doctor_id','service_id'];
}
