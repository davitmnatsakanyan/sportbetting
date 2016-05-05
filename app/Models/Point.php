<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    function team()
    {
        return $this->belongsTo(Team::class);
    }
}
