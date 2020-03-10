<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $timestamps = false;
    protected $table = "IDU_REG_AREAS";
    protected $primaryKey = "ID_AREA";

    public function piso()
    {
        return $this->belongsTo(Piso::class, 'ID_PISO');
    }

    public function estantes ()
    {
        return $this->hasMany(Estante::class);
    }

}
