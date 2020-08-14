<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public function cliente()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'id', 'producto_id')->withTimestamps();
    }
}
