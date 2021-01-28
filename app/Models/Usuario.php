<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = "USUARIO";

    protected $guarded = [];

    public $timestamps = false;


    public function centers()
    {
        return $this->hasOne('App\Models\Centro', 'ID', 'IDCENTRO' );
    }

}
