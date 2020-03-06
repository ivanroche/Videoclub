<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //

    protected $table = 'comments';

    // Relació de  Molts a un

    public function user()
    {
      return $this->belongsTo ('App\User', 'user_id');
    }
}
