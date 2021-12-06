<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Appointment extends Pivot
{
    protected $table = 'user_patient';
}
