<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    public $timestamps = false;
    protected $primaryKey = "ID_EDIFICIO";
    protected $table = "IDU_REG_EDIFICIOS";
    

    public  function pisos()
    {
        return $this->hasMany(Piso::class);
    }
}
