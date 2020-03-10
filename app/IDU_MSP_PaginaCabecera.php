<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IDU_MSP_PaginaCabecera extends Model
{
    protected $primaryKey = "ID_PAG_CABE";

    protected $table = "IDU_MSP_PAGINA_CABECERA";

    public $timestamp = false;

    public function paginaDetalles()
    {
        return $this->hassMany(IDU_MSP_PaginaDetalle::class);
    }
}
