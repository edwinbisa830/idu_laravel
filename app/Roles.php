<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    
    public $timestamps = false;
    protected $table = "IDU_REG_ROLES";
    protected $primaryKey = "ROLES_ID";

    public function perfil ()
    {
        return $this->belongsTo(Perfil::class, 'PERFIL_ID');
    }

    public function links ()
    {
        return $this->hasMany(Links::class);
    }
}
