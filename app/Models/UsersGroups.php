<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersGroups extends Model
{
    public  function AddToGroup($user_id, $group_id){
        $this->user_id=$user_id;
        $this->group_id=$group_id;
        $this->save();
        return true;
    }
}
