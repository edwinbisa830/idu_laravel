<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiTransaccion extends Controller
{

    //  Save historico
    public function saveTransaccion(Request $request)
    {

        //  Get values send
        $descripcion = $request->descripcion;
        $texto = $request->texto;
        $tipoHistorico = $request->tipoHistorico;
        $idUser = $request->idUser;

        //  Get max(id) save
        $sql = DB::select("SELECT CASE WHEN MAX(ID_TRANSACCION) IS NULL THEN 1 ELSE MAX(ID_TRANSACCION)+1 END ID_TRANSACCION FROM IDU_REG_TRANSACCIONES");
        foreach($sql as $result){
            $idTransaccion = $result->id_transaccion;
        }

        //  Insert historico
        DB::insert("INSERT INTO IDU_REG_TRANSACCIONES VALUES ('$idTransaccion','$descripcion','$texto','$tipoHistorico','$idUser','$idUser','','')");

        //  Response
        return response()->json(true);

    }

}