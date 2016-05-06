<?php

namespace App\Models;

use App\Bet;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function t1(){
        $this->hasMany(Team::class, 'id', 'team1');
    }

    public function t2(){
        $this->hasMany(Team::class, 'id', 'team2');
    }

    public function bets(){
      return  $this->hasMany(Bet::class);
    }

    public function result($id){
        $match = $this->find($id);
        if(is_null($match->score1) || is_null($match->score2)) {
            return null;
        }
        else{
            if ($match->score1 == $match->score2) {
                return 0;
            } elseif ($match->score1 > $match->score2) {
                return $match->team1;
            } elseif ($match->score1 < $match->score2) {
                return $match->team2;
            }
        }
    }
}
