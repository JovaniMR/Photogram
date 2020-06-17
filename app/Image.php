<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    Protected $table='images';

    //Relación One to Many (Una imagen tiene varios comentarios)
    public function comments(){
        return $this->hasMany('App\Comment')->OrderBy('id','desc')->limit(2);
    } 

    public function commentsAll(){
        return $this->hasMany('App\Comment')->OrderBy('id','desc');
    } 

    //Relacion One to Many (una imagen tiene muchos likes)
    public function likes(){
        return $this->hasMany('App\Like');
    }

    //Relacion Many to One (muchas imagenes son de un usuario)
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
