<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPerfil extends Model
{
    
    public $timestamps = false;
    protected $table = "IDU_REG_USER_PERFIL";
    protected $primaryKey = "ID_USER_PERFIL";

}
