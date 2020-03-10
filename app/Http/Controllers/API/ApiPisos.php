<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Piso;
use DateTime;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class ApiPisos extends Controller
{

    public function consultarPisos()
    {
        return DB::select('SELECT * FROM IDU_REG_PISOS WHERE estado = 1');
    }


    public function addPisos(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $piso = new Piso();
        $piso->NOMBRE = $request->nombre;
        $piso->DESCRIPCION = $request->descripcion;
        $piso->ID_EDIFICIO = $request->id_edificio;
        $piso->DESCRIPCION_DOC = $request->descripcion_doc;
        $piso->ID_USUARIO_REGISTRADO = $request->id_usuario_registrado; // SESION
        $piso->ID_USUARIO_ACTUALIZADO = $request->id_usuario_actualizado; //SESION 
        $piso->ESTADO = 1;
        $piso->CREATED_AT = $hoy;
        $piso->UPDATED_AT = $hoy;
        $piso->save();
        if ($piso) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }
    }


    public function desactivarPiso(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $piso = Piso::find($request->id_piso);
        $piso->ESTADO = 0;
        $piso->UPDATED_AT = $hoy;
        $piso->save();
        if ($piso) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }
    }

    public function actualizarPisos(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $estante = Piso::WHERE('ID_PISO', $request->id_piso)
            ->update([
                'NOMBRE' => $request->nombre,
                'DESCRIPCION' => $request->descripcion,
                'DESCRIPCION_DOC' => $request->descripcion_doc,
                'ID_EDIFICIO' => $request->id_area,
                'ID_USUARIO_ACTUALIZADO' => $request->id_usuario_actualizado,
                'UPDATED_AT' => $hoy,
            ]);
        if ($estante) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 201);
        }
    }

    public function consultarPiso(Request $request)
    {
        return $area = Piso::find($request->id);
    }
}
