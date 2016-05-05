<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function t1(){
        $this->hasMany(Team::class, 'id', 'team1');
    }

    public function t2(){
        $this->hasMany(Team::class, 'id', 'team2');
    }
}
