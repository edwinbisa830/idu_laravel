<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacciones extends Model
{

    public $timestamps = false;
    protected $table = "IDU_REG_TRANSACCIONES";
    protected $primaryKey = "ID_TRANSACCION";

    public function transaccion ()
    {
       return $this->hasMany(transaccion::class);
    }

}
