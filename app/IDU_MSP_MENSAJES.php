<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IDU_MSP_MENSAJES extends Model
{
    protected $table = "IDU_MSP_MENSAJES";
    
    protected $primaryKey = "ID_MENSAJE";

    public $timestamp = false;
}
