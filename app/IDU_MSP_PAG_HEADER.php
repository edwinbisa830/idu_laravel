<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IDU_MSP_PAG_HEADER extends Model
{
    protected $table = "IDU_MSP_PAG_HEADER";
    
    protected $primaryKey = "ID_PAGINA_CABECERA";
    
    public $timestamp = false;
}
