<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Usuario extends Authenticatable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "USUARIO";

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'ID';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'PASSWORD'
    ];

    /**
     * Encrypt the user password
     * @return bool
     */
    public function encryptPassword()
    {
        $this->PASSWORD = Hash::make($this->PASSWORD);
        return $this->save();
    }

    /**
     * Indicate the password field to check on authentication
     * @return string
     */
    public function getAuthPassword(): string
    {
        return $this->PASSWORD;
    }

    /**
     * Accessor to get the user's full name.
     *
     * @return string
     */
    public function getApellidosAttribute(): string
    {
        return "{$this->APELLIDO1} {$this->APELLIDO2}";
    }

    /**
     * Relationship with App\Models\Centro. One User belongs to one Center.
     * @return BelongsTo
     */
    public function centers(): BelongsTo
    {
        return $this->belongsTo('App\Models\Centro', 'ID', 'IDCENTRO');
    }

}
