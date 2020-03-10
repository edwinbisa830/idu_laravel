<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    
    public $timestamps = false;
    protected $table = "IDU_REG_HISTORICO";
    protected $primaryKey = "ID_HISTORICO";

    public function historico ()
    {
       return $this->hasMany(historico::class);
    }

}
