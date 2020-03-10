<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estante extends Model
{
    public $timestamps = false;
    protected $table = "IDU_REG_ESTANTES";
    protected $primaryKey = "ID_ESTANTE";

    public function area()
    {
        return $this->belongsTo(Area::class, 'ID_AREA');
    }

    public function cajas()
    {
        return $this->hasMany(Caja::class);
    }
}
