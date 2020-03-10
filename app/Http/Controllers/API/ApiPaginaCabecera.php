<?php

namespace App\Http\Controllers\API;

use App\IDU_MSP_PaginaCabecera;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiPaginaCabecera extends Controller
{
    public function pagina(Request $request)
    {
         $consulta = DB::TABLE('IDU_PAG_CAB paginaCabcera')
         ->SELECT(DB::RAW('paginaDetalle.*, paginaCabcera.*'))
         ->join('IDU_MSP_PAGINA_DETALLE paginaDetalle', 'paginaDetalle.ID_PAGINA_DETALLE', '=', 'paginaCabcera.ID_PAGINA_DETALLE')
         ->where('paginaCabcera.ID_PAG_CABE', '=', $request->id_pag_cabe )
         ->get();
         return response()->json($consulta);
    }
}

