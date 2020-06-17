<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    //Relación Many to One (Muchos seguidores tienen un comentario)
    public function user(){
      return $this->belongsTo('App\User','follower_id','id');
    }

    //Relación Many to One
    public function image(){
        return $this->belongsTo('App\Image','image_id');
    }
}
