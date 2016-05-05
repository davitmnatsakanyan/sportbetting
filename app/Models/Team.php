<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function point(){
        return $this->belongsTo(Point::class);
    }

    public function match(){
        return $this->belongsTo(Match::class);
    }
}
