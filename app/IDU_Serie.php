<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IDU_Serie extends Model
{
    protected $primaryKey = "Id_Serie";

    protected $table = "idu_reg_serie";

    public $timestamp = false;
}
