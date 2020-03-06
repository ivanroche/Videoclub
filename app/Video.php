<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
  protected $table = 'videos';
    //Relació One to Many
    public function comments(){

      return $this->hasMany('App\Comment');
      //hasOne
    }

    //Relació de molts a un
    public function user(){
      return $this->belongsTo('App\User','user_id');
    }
}
