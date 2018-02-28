<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MensajesPublico extends Model
{
    public function usuario(){
        return $this->belongsTo('App\User','id_usuario');
    }
}
