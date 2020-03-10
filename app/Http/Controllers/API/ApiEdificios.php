<?php

namespace App\Http\Controllers\Api;

use App\Edificio;
use App\Http\Controllers\Controller;
use App\Piso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApiEdificios extends Controller
{
    public function getEdificiosUser()
    {
        return Edificio::select(
            'Id_Edificio',
            'Nombre',
            'Descripcion',
            DB::raw("CASE Tipo WHEN '1' THEN 'Bodega' WHEN '2' THEN 'Archivo' END AS Tipo")
        )
            ->get();
    }

    public function deleteEdificio(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $edificio = Edificio::find($request->id_edificio);
        $edificio->ESTADO = 0;
        $edificio->ID_USUARIO_ACTUALIZADO = $request->id_usuario_desactivado;
        $edificio->UPDATED_AT = $hoy;
        $edificio->save();
        if ($edificio) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }
    }

    public function addEdificio(Request $request)
    {

        if ($request->nombre != null && $request->tipo) {
            $insertEdificio = new Edificio();
            date_default_timezone_set('America/Bogota');
            $hoy = date('Y-m-d H:i:s');
            $insertEdificio->NOMBRE = $request->nombre;
            $insertEdificio->DESCRIPCION = $request->descripcion;
            $insertEdificio->TIPO = $request->tipo;
            $insertEdificio->ESTADO = 1;
            $insertEdificio->ID_USUARIO_REGISTRADO = $request->id_usuario_registrado;
            $insertEdificio->ID_USUARIO_ACTUALIZADO = $request->id_usuario_actualizado;
            $insertEdificio->CREATED_AT = $hoy;
            $insertEdificio->UPDATED_AT = $hoy;
            $insertEdificio->save();

            if ($insertEdificio) {
                return response()->json(['menssage' => 'OK'], 201);
            } else {
                return response()->json(['menssage' => 'Faild'], 401);
            }
        } else {
            return response()->json(['message' => 'Datos incompletos'], 401);
        }
    }

    public function updateEdificio(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $edificio = Edificio::WHERE('ID_EDIFICIO', $request->id_edificio)
            ->update([
                'NOMBRE' => $request->nombre,
                'DESCRIPCION' => $request->descripcion,
                'TIPO' => $request->tipo,
                'ID_USUARIO_ACTUALIZADO' => $request->id_usuario_actualizado,
                'UPDATED_AT' => $hoy,
            ]);
        if ($edificio) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 201);
        }
    }

    public function consultarEdificio(Request $request)
    {
        return $estante = Edificio::find($request->id);
    }
}
