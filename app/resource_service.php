<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class resource_service extends Pivot
{
    protected $fillable = ['resource_id','service_id'];




}
