<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piso extends Model
{
    public $timestamps = false;
    protected $table = "IDU_REG_PISOS";
    protected $primaryKey = "ID_PISO";


    public function edificios()
    {
        return $this->belongsTo(Edificio::class, 'ID_EDIFICIO');
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }
}
