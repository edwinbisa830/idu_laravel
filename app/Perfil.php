<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    
    public $timestamps = false;
    protected $table = "IDU_REG_PERFIL";
    protected $primaryKey = "PERFIL_ID";

    public function roles ()
    {
       return $this->hasMany(Roles::class);
    }
}
/**
 * PERFIL
 * ROLES
 * LINKS
 */