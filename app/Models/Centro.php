<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Centro extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "CENTRO";


    /**
     * Relationship with App\Models\Usuario. One Center has many Users.
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany('App\Models\Usuario', 'IDCENTRO', 'ID');
    }
}
