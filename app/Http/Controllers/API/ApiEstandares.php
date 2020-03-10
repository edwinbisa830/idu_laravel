<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

/**
 * Models
 */
use App\IDU_MSP_LISTA;
use App\IDU_MSP_MENSAJES;
use App\IDU_MSP_PAG_DETA;
use App\IDU_MSP_PAG_HEADER;

class ApiEstandares extends Controller
{
    /**
     * info Page
     */
    public function getEstandarPage(Request $request){
        /**
         * Tipos
         * 1 text
         * 2 combo
         * 3 number
         * 4 date
         * 5 email
         * 6 password
         */

        if($request->IdPage != null){
            $estandar = IDU_MSP_PAG_HEADER::from('IDU_MSP_PAG_HEADER as header')
                        ->select('header.PAGINA', 'header.SECUENCIA', 'header.TITULO_PRINCIPAL')
                        ->distinct()
                        ->where('PAGINA', 'like', trim($request->IdPage))
                        ->get();

            $mensajes = IDU_MSP_PAG_HEADER::from('IDU_MSP_PAG_HEADER as header')
                        ->select(DB::raw('
                                mensajeADD.TIPO_MENSAJE AS TIPO_ADD, mensajeADD.TEXTO AS MENSAJE_ADD,
                                mensajeEDIT.TIPO_MENSAJE AS TIPO_EDIT, mensajeEDIT.TEXTO AS MENSAJE_EDIT,
                                mensajeDELETE.TIPO_MENSAJE AS TIPO_DELETE, mensajeDELETE.TEXTO AS MENSAJE_DELETE'
                            )
                        )
                        ->distinct()
                        ->leftjoin('idu_msp_mensajes AS mensajeADD', 'header.ID_MENSAJE_CREACION', 'LIKE', 'mensajeADD.ID_MENSAJE')
                        ->leftjoin('idu_msp_mensajes AS mensajeEDIT', 'header.ID_MENSAJE_MODIFICACION', 'LIKE', 'mensajeEDIT.ID_MENSAJE')
                        ->leftjoin('idu_msp_mensajes AS mensajeDELETE', 'header.ID_MENSAJE_ELIMINACION', 'LIKE', 'mensajeDELETE.ID_MENSAJE')
                        ->where('header.PAGINA', 'like', trim($request->IdPage))
                        ->get();
            

                        
            $detalle = IDU_MSP_PAG_DETA::from('IDU_MSP_PAG_DETA AS detalle')
                        ->select('ID_CAMPO', 'LABEL', 'ISOBLIGATORIO', 
                            DB::raw('CASE TIPO WHEN \'1\' THEN \'text\' WHEN \'2\' THEN \'combo\' WHEN \'3\' THEN \'number\' WHEN \'4\' THEN \'date\' WHEN \'5\' THEN \'email\' WHEN \'6\' THEN \'password\' WHEN \'7\' THEN \'textarea\'  END AS TIPO'), 
                            'ISVISIBLE', 'ISPROTEGIDO', 'ID_LISTA')
                        ->distinct()
                        ->where('detalle.PAGINA', 'like', trim($request->IdPage))
                        ->get();

            $lista = IDU_MSP_LISTA::from('idu_msp_pag_deta AS detalle')
                        ->select('lista.ID','lista.ID_LISTA', 'lista.VALOR_ALFA', 'lista.VALOR_NUMERIC', 'lista.DESCRIPTION')
                        ->distinct()
                        ->join('idu_msp_lista AS lista', 'lista.ID_lISTA', '=' ,'detalle.ID_LISTA')
                        ->where('detalle.PAGINA', 'like', trim($request->IdPage))
                        ->get();
            
            return response()->json(['menssage' => 'OK',
                                    'data' => [
                                        'INFO' => $estandar, 
                                        'MENSAJES' =>$mensajes,
                                        'DETALLE' =>$detalle, 
                                        'LISTA' => $lista
                                    ],
                                    ], 201);

        }else{
            return response()->json(['menssage' => 'Id Desconocido'], 201);
        }
    }
}
