<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $table = 'followers';

    //Relación Many to One (Muchos seguidores ha un usuairo)
    public function follower(){
        return $this->belongsTo('App\Follower','follower_id');
    }

}
