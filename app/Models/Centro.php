<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    protected $table = "CENTRO";

    public function users()
    {
        return $this->hasMany('App\Models\Usuario', 'IDCENTRO', 'ID');
    }
}
