<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IDU_MSP_PaginaDetalle extends Model
{
    protected $primaryKey = "ID_PAGINA_DETALLE";

    protected $table = "IDU_MSP_PAGINA_DETALLE";

    public $timestamp = false;

    public function cabecera()
    {
        $this->belongsTo(IDU_MSP_PaginaCabecera::class, 'ID_PAG_CABE');
    }
}
