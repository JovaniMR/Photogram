<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    //Relación Many to One (Muchos seguidores tienen un comentario)
    public function follower(){
      return $this->belongsTo('App\User','user_id');
    }

    //Relación Many to One
    public function image(){
        return $this->belongsTo('App\Image','image_id');
    }
}
