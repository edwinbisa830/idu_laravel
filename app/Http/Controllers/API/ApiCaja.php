<?php

namespace App\Http\Controllers\Api;

use App\Caja;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiCaja extends Controller
{
    public function consultarCajas()
    {
        $sql = DB::select("SELECT * FROM IDU_REG_CAJAS WHERE estado = 1");
        return response()->json($sql);
    }

    public function addCaja(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $caja = new Caja();
        $opcion = $caja->ID_EDIFICIO = $request->id_edificio;
        $registros = $request->registros;
        switch ($opcion) {
            case 28:
                for ($i = 1; $i < $registros + 1; $i++) {
                    $data = array(
                        'ID_EDIFICIO' => $request->id_edificio,
                        'ID_PISO' => $request->id_piso,
                        'ID_AREA' => $request->id_area,
                        'ID_ESTANTE' => $request->id_estante,
                        'NOMBRE' => $request->nombre,
                        'DESCRIPCION' => $request->descripcion,
                        'TIPO' => $request->tipo,
                        'SIGLA' => $request->sigla,
                        'ESTADO' => 1,
                        'CREATED_AT' => $hoy,
                        'UPDATED_AT' => $hoy,
                        'ID_USUARIO_REGISTRADO' => $request->id_usuario_registrado,
                        'ID_USUARIO_ACTUALIZADO' => $request->id_usuario_actualizado,
                    );
                    var_dump(Caja::insert($data));
                }
                break;
            default:
                echo 'opcion 2';
                for ($i = 1; $i < $registros + 1; $i++) {
                    //echo "Registro mumero" . $i;
                    $caja->ID_EDIFICIO = $request->id_edificio;
                    $caja->ID_PISO = $request->id_piso;
                    $caja->ID_AREA = $request->id_area;
                    $caja->ID_ESTANTE = $request->id_estante;
                    $caja->NOMBRE = $request->nombre;
                    $caja->DESCRIPCION = $request->descripcion;
                    $caja->SIGLA = $request->sigla;
                    $caja->ESTADO = 1;
                    $caja->CREATED_AT = $hoy;
                    $caja->UPDATED_AT = $hoy;
                    $caja->ID_USUARIO_REGISTRADO = $request->id_usuario_regristrado;
                    $caja->ID_USUARIO_ACTUALIZADO = $request->id_usuario_actualizado;
                    print_r($caja);
                    /*$caja->save();
                    if ($caja) {
                        return response()->json(['menssage' => 'OK'], 201);
                    } else {
                        return response()->json(['menssage' => 'Faild'], 401);
                    }*/
                }
                break;
        }
    }

    public function updateCaja(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $caja = Caja::find($request->id_caja);
        $caja->NOMBRE = $request->nombre;
        $caja->DESCRIPCION = $request->descripcion;
        $caja->SIGLA = $request->sigla;
        $caja->ID_USUARIO_ACTUALIZADO = $request->id_usuario_actualizado;
        $caja->UPDATED_AT = $hoy;
        $caja->save();
        if ($caja) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }
    }

    public function deleteCaja(Request $request)
    {
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');
        $caja = Caja::find($request->id_caja);
        $caja->ESTADO = 0;
        /**SESIO */
        $caja->ID_USUARIO_ACTUALIZADO = $request->id_usuario_actualizado;
        $caja->UPDATED_AT = $hoy;
        $caja->save();
        if ($caja) {
            return response()->json(['menssage' => 'OK'], 201);
        } else {
            return response()->json(['menssage' => 'Faild'], 401);
        }
    }
}


/*echo 'cantidad de regristros' . ' ' . $registros;
                for ($i = 1; $i < $registros + 1; $i++) {
                    //echo "Registro mumero" . $i;
                    $caja->ID_EDIFICIO = $request->id_edificio;
                    $caja->ID_PISO = $request->id_piso;
                    $caja->ID_AREA = $request->id_area;
                    $caja->ID_ESTANTE = $request->id_estante;
                    $caja->NOMBRE = $request->nombre;
                    $caja->DESCRIPCION = $request->descripcion;
                    $caja->TIPO = $request->tipo;
                    $caja->SIGLA = $request->sigla;
                    $caja->ESTADO = 1;
                    $caja->CREATED_AT = $hoy;
                    $caja->UPDATED_AT = $hoy;
                    $caja->ID_USUARIO_REGISTRADO = $request->id_usuario_registrado;
                    $caja->ID_USUARIO_ACTUALIZADO = $request->id_usuario_actualizado;
                    $caja->save();
                }
                //print_r($caja);
                if ($caja) {
                    return response()->json(['menssage' => 'OK'], 201);
                } else {
                    return response()->json(['menssage' => 'Faild'], 401);
                }*/
