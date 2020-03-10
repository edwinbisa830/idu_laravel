<?php

namespace App\Http\Controllers\Api;

use App\Area;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiAreas extends Controller
{
    public function consultarAreas()
    {
        $sql = DB::select('SELECT * FROM IDU_REG_AREAS WHERE estado = 1');
        return response()->json($sql);
    }

    public function addAreas(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $area = new Area();
        $area->NOMBRE = $request->nombre;
        $area->DESCRIPCION = $request->descripcion;
        $area->ID_PISO = $request->id_piso;
        $area->ID_USUARIO_REGISTRADO = $request->id_usuario_registrado;
        $area->ID_USUARIO_ACTUALIZADO = $request->id_usuario_actualizado;
        $area->ESTADO = "1";
        $area->CREATED_AT = $hoy;
        $area->UPDATED_AT = $hoy;
        $area->save();
        if ($area) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 201);
        }
    }

    public function deleteAreas(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $area = Area::find($request->id_area);
        $area->ESTADO = 0;
        $area->ID_USUARIO_ACTUALIZADO = $request->id_usuario_actualizado;
        $area->UPDATED_AT = $hoy;
        //$area->Id_Usuario_Actualizado//SESSION
        $area->save();
        if ($area) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }
    }

    public function actualizarArea(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $area = Area::WHERE('ID_AREA', $request->id_area)
        ->UPDATE([
            'NOMBRE' => $request->nombre,
            'DESCRIPCION' => $request->descripcion,
            'ID_PISO' => $request->id_piso,
            'ID_USUARIO_ACTUALIZADO' => $request->id_usuario_actualizado,
            'UPDATED_AT' => $hoy,
        ]);
        if ($area) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }
    }

    public function consultarId(Request $request){
        return $area = Area::find($request->id);
    }
}
