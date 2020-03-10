<?php 

namespace App\Http\Controllers\Api;

use App\Perfil;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiUserPerfil extends Controller
{
    public function getUserPerfil(Request $request)
    {

        $idUser = $request->idUser;

        $sql = DB::select("
            SELECT 
                A.ID_PERFIL,
                B.DESCRIPCION 
            FROM 
                IDU_REG_USER_PERFIL A,
                IDU_REG_PERFIL B 
            WHERE 
                A.ID_PERFIL=B.ID_PERFIL AND 
                ID_USER = '".$idUser."'");

        return response()->json($sql);

    }

}