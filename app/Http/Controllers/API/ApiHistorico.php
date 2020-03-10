<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiHistorico extends Controller
{

    /** 
     * GET HISTORICO 
     * */
    
    public function getHistorico(Request $request)
    {

        //  Get data send
        $transaccion = $request->transaccion;

        //  Get historico by transacción
        $sql = DB::select("SELECT COD_DEPENDENCIA_REALIZO,ID_USUARIO,ID_PERFIL,ESTADO,NIVEL_CONFIDENCIALIDAD,NRO_RADICADO,COD_DEPENDENCIA_DESTINO,ID_LINK FROM IDU_REG_HISTORICO WHERE TRANSACCION = '$transaccion'");

        //  Response
        return response()->json($sql);

    }

    /** 
     * SAVE HISTORICO 
     * */

    public function saveHistorico(Request $request)
    {

        //  Get data send
        $codDependenciaRealizo = $request->codDependenciaRealizo;
        $idUsuario = $request->idUsuario;
        $idPerfil = $request->idPerfil;
        $fechaEvento = $request->fechaEvento;
        $transaccion = $request->transaccion;
        $texto = $request->texto;
        $estado = $request->estado;
        $nivelConfidencialidad = $request->nivelConfidencialidad;
        $nroRadicado = $request->nroRadicado;
        $codDependenciaDestino = $request->codDependenciaDestino;
        $idLink = $request->idLink;

        //  Get max(id) save
        $sql = DB::select("SELECT CASE WHEN MAX(ID_HISTORICO) IS NULL THEN 1 ELSE MAX(ID_HISTORICO)+1 END ID_HISTORICO FROM IDU_REG_HISTORICO");
        foreach($sql as $result){
            $idHistorico = $result->id_historico;
        }

        //  Insert historico
        DB::insert("INSERT INTO IDU_REG_HISTORICO VALUES ('$idHistorico','$codDependenciaRealizo','$idUsuario','$idPerfil','$fechaEvento','$transaccion','$texto','$estado','$nivelConfidencialidad','$nroRadicado','$codDependenciaDestino','$idLink','$idUsuario','$idUsuario','','')");

        //  Response
        return response()->json(true);

    }

}