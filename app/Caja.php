<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    public $timestamps = false;
    protected $table = "IDU_REG_CAJAS";
    protected $primaryKey = "ID_CAJA";

    public function estante()
    {
        return $this->belongsTo(Estante::class, 'ID_ESTANTE');
    }
}
