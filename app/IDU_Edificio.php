<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IDU_Edificio extends Model
{
    public $timestamps = false;
    protected $primaryKey = "ID_EDIFICIO";

    protected $table = "IDU_REG_EDIFICIO";

    public $timestamp = false;

    public  function pisos()
    {
       return $this->hasMany(Piso::class);  
    }
}
