<?php

namespace App\Http\Controllers\Api;

use App\Estante;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiEstante extends Controller
{
    public function consultarEstantes()
    {
        $sql = DB::select('SELECT * FROM IDU_REG_ESTANTES WHERE ESTADO = 1');
        return response()->json($sql);
    }

    public function addEstantes(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $estado = 1;
        $estante = new Estante();
        $estante->NOMBRE = $request->nombre;
        $estante->DESCRIPCION = $request->descripcion;
        $estante->ID_AREA = $request->id_area;
        $estante->ESTADO = $estado;
        $estante->ID_USUARIO_REGISTRADO = $request->id_usuario_registrado; //SESSION
        $estante->ID_USUARIO_ACTUALIZADO = $request->id_usuario_actualizado; //SESSION
        $estante->CREATED_AT = $hoy;
        $estante->UPDATED_AT = $hoy;
        $estante->save();
        if ($estante) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }
    }
    public function desctivarEstantes(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $estante = Estante::find($request->id_estante);
        $estante->ESTADO = 0;
        $estante->ID_USUARIO_ACTUALIZADO = $request->id_usuario_actualizado; //SESSION
        $estante->UPDATED_AT = $hoy;
        $estante->save();
        if ($estante) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }
    }

    public function actualizarEstantes(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $estante = Estante::WHERE('ID_ESTANTE', $request->id_estante)
            ->update([
                'NOMBRE' => $request->nombre,
                'DESCRIPCION' => $request->descripcion,
                'ID_AREA' => $request->id_area,
                'ID_USUARIO_ACTUALIZADO' => $request->id_usuario_actualizado,
                'UPDATED_AT' => $hoy,
            ]);
        if ($estante) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 201);
        }
    }

    public function consultarEstante(Request $request)
    {
        return $estante = Estante::find($request->id);
    }
}
