<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

/**
 * Model
 */
use App\IDU_REG_SERIES;
use App\IDU_REG_SUBSERIES;
use App\IDU_REG_TIPO_DOCUMENTO;
use App\IDU_REG_MATRIZ;

class ApiTRD extends Controller
{
    /**
     * Obtener Series 
     */
    public function getSeriesUser(Request $request){
        
        return response()->json(['menssage' => 'OK', 'data' =>
                                    IDU_REG_SERIES::where('ESTADO','=',1)->get()
                                ], 201);
    }

    /**
     * Crear Serie
     */
    public function addSerie(Request $request){

        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');

        if($request != null && $request->Id_Created_by != null){
            $insertSerie = new IDU_REG_SERIES();
            $insertSerie->timestamps = false;
            $insertSerie->CODIGO = $request->Codigo;
            $insertSerie->NOMBRE_SERIE = $request->Nombre_Serie;
            $insertSerie->ID_USUARIO_REGISTRADO = $request->Id_Created_by;
            $insertSerie->ID_USUARIO_ACTUALIZADO = $request->Id_Created_by;
            $insertSerie->CREATED_AT = $hoy;
            $insertSerie->UPDATED_AT = $hoy;
            $insertSerie->ESTADO = 1;
    
            $insertSerie->save();
    
            if($insertSerie){
                return response()->json(['menssage' => 'OK'], 201);
            }else{
                return response()->json(['menssage'=> 'Faild'], 201);
            }
        }else{
            return response()->json(['menssage'=> 'Datos incompletos'], 201);
        }
    }
    /**
     * Eliminar Serie
     */
    public function deleteSerie(Request  $request){
        if($request->Id != null){
            $deleteEstado =  IDU_REG_SERIES::where('ID_SERIE', '=', $request->Id)->delete();
            if($deleteEstado){
                return response()->json(['menssage' => 'OK'], 201);
            }else{
                return response()->json(['menssage' => 'Faild'], 201);
            }
        }else{
            return response()->json(['menssage' => 'Id Desconocido'], 201);
        }
    }
    /**
     * Obtener Serie por id
     */
    public function getSerieByFilter(Request $request){
        if($request->Id_Serie != null){
            return response()->json(IDU_REG_SERIES::where('ID_SERIE','=',$request->Id_Serie)
                                ->get());
        }else{
            return response()->json(['menssage' => 'Id Desconocido'], 401);  
        }
    }
    /**
     * Actualizar Serie
     */
    public function updateSerie(Request $request, $id){
        date_default_timezone_set('America/Bogota');

        

        
        if(IDU_REG_SERIES::where('ID_SERIE', $id)->exists() && $request->Id_Update_by != null){
            
            $hoy = date('d/m/Y H:i:s');

            $updateSerie = IDU_REG_SERIES::where('ID_SERIE',$id)
                    ->update([
                        'CODIGO'=> $request->Codigo,
                        'NOMBRE_SERIE'=> $request->Nombre_Serie,
                        'ID_USUARIO_ACTUALIZADO'=> $request->Id_Update_by,
                        'ESTADO'=> $request->Estado
                        ]);
            if($updateSerie){
                return response()->json(['menssage' => 'OK'], 201);
            }else{
                return response()->json(['menssage'=> 'Faild'], 201);
            }
        }else{
            return response()->json(['message' => 'Id Desconocido'], 201);
        }
    }

    /************************************************************************************************************************** */

    /**
     * Obtener SubSeries 
     */
    public function getSubSeriesUser(Request $request){
        
        return response()->json(['menssage' => 'OK', 'data' =>
                                    IDU_REG_SUBSERIES::where('ESTADO','=',1)->get()
                                ], 201);
    }

    /**
     * Crear SubSerie
     */
    public function addSubSerie(Request $request){

        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');

        if($request != null && $request->Id_Created_by != null){
            $insertSubSerie = new IDU_REG_SUBSERIES();
            $insertSubSerie->timestamps = false;
            $insertSubSerie->CODIGO = $request->Codigo;
            $insertSubSerie->NOMBRE_SUBSERIE = $request->Nombre_SubSerie;
            $insertSubSerie->TIEMPO_ARCH_GEST = $request->Tiempo_Arch_Gest;
            $insertSubSerie->TIEMPO_ARCH_CENT = $request->Tiempo_Arch_Cent;
            $insertSubSerie->DISPOSICION_FINAL = $request->Disposicion_Final;
            $insertSubSerie->PROCEDIMIENTOS = $request->Procedimientos;
            $insertSubSerie->ID_USUARIO_REGISTRADO = $request->Id_Created_by;
            $insertSubSerie->ID_USUARIO_ACTUALIZADO = $request->Id_Created_by;
            $insertSubSerie->CREATED_AT = $hoy;
            $insertSubSerie->UPDATED_AT = $hoy;
            $insertSubSerie->ESTADO = 1;
    
            $insertSubSerie->save();
    
            if($insertSubSerie){
                return response()->json(['menssage' => 'OK'], 201);
            }else{
                return response()->json(['menssage'=> 'Faild'], 201);
            }
        }else{
            return response()->json(['menssage'=> 'Datos incompletos'], 201);
        }
    }
    /**
     * Eliminar SubSerie
     */
    public function deleteSubSerie(Request  $request){
        if($request->Id != null){
            $deleteEstado =  IDU_REG_SUBSERIES::where('ID_SUBSERIE', '=', $request->Id)->delete();
            if($deleteEstado){
                return response()->json(['menssage' => 'OK'], 201);
            }else{
                return response()->json(['menssage' => 'Faild'], 201);
            }
        }else{
            return response()->json(['menssage' => 'Id Desconocido'], 201);
        }
    }
    /**
     * Obtener SubSerie por id
     */
    public function getSubSerieByFilter(Request $request){
        if($request->Id_SubSerie != null){
            return response()->json(IDU_REG_SUBSERIES::where('ID_SUBSERIE','=',$request->Id_SubSerie)
                                ->get());
        }else{
            return response()->json(['menssage' => 'Id Desconocido'], 401);  
        }
    }
    /**
     * Actualizar SubSerie
     */
    public function updateSubSerie(Request $request, $id){
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');

        if(IDU_REG_SUBSERIES::where('ID_SUBSERIE', $id)->exists() && $request->Id_Update_by != null){

            $updateSubSerie = IDU_REG_SUBSERIES::where('ID_SUBSERIE',$id)
                    ->update([
                        'CODIGO'=> $request->Codigo,
                        'NOMBRE_SUBSERIE'=> $request->Nombre_SubSerie,
                        'TIEMPO_ARCH_GEST'=> $request->Tiempo_Arch_Gest,
                        'TIEMPO_ARCH_CENT'=> $request->Tiempo_Arch_Cent,
                        'DISPOSICION_FINAL'=> $request->Disposicion_Final,
                        'PROCEDIMIENTOS'=> $request->Procedimientos,
                        'ID_USUARIO_ACTUALIZADO'=> $request->Id_Update_by,
                        'ESTADO'=> $request->Estado
                        ]);

            if($updateSubSerie){
                return response()->json(['menssage' => 'OK'], 201);
            }else{
                return response()->json(['menssage'=> 'Faild'], 201);
            }
        }else{
            return response()->json(['message' => 'Id Desconocido'], 201);
        }
    }

    /*********************************************************************************************************************************************************** */

    /**
     * Obtener Tipo Documental 
     */
    public function getTipoDocumentalUser(Request $request){
        
        return response()->json(['menssage' => 'OK', 'data' =>
                                    IDU_REG_TIPO_DOCUMENTO::from('IDU_REG_TIPO_DOCUMENTO AS TIPO_DOCUM')
                                    ->select(
                                        'TIPO_DOCUM.ID_TIPO_DOCUMENTO', 'TIPO_DOCUM.CODIGO', 'TIPO_DOCUM.TIPO_DOCUMENTO',
                                        'LISTARADICADO.DESCRIPTION AS TIPO_RADICADO','LISTA.DESCRIPTION AS SOPORTE')
                                    ->leftjoin('IDU_MSP_LISTA AS LISTARADICADO', 'LISTARADICADO.ID', '=', 'TIPO_DOCUM.TIPO_RADICADO')
                                    ->leftjoin('IDU_MSP_LISTA AS LISTA', 'LISTA.ID', '=', 'TIPO_DOCUM.SOPORTE')    
                                    ->where('TIPO_DOCUM.ESTADO','=','1')->get()
                                ], 201);
    }

    /**
     * Eliminar Tipo Documental 
     */
    public function deleteTipoDocumental(Request  $request){
        if($request->Id != null){
            $deleteEstado =  IDU_REG_TIPO_DOCUMENTO::where('ID_TIPO_DOCUMENTO', '=', $request->Id)->delete();
            if($deleteEstado){
                return response()->json(['menssage' => 'OK'], 201);
            }else{
                return response()->json(['menssage' => 'Faild'], 201);
            }
        }else{
            return response()->json(['menssage' => 'Id Desconocido'], 201);
        }
    }
    
    /**
     * Crear Tipo Documental 
     */
    public function addTipoDocumental(Request $request){

        date_default_timezone_set('America/Bogota');
        
        if($request != null && $request->Id_Created_by != null){
            $hoy = date('Y-m-d H:i:s');
            $insertTipoDocumento = new IDU_REG_TIPO_DOCUMENTO();
            $insertTipoDocumento->timestamps = false;
            $insertTipoDocumento->CODIGO = $request->Codigo;
            $insertTipoDocumento->TIPO_DOCUMENTO = $request->tipo_documental;
            $insertTipoDocumento->SOPORTE = $request->Soporte;
            $insertTipoDocumento->TIPO_RADICADO = $request->tipoRadicado;
            $insertTipoDocumento->NIVEL_CONFIDENCIALIDAD = $request->nivel_confidelidad;
            $insertTipoDocumento->ID_USUARIO_REGISTRADO = $request->Id_Created_by;
            $insertTipoDocumento->ID_USUARIO_ACTUALIZADO = $request->Id_Created_by;
            $insertTipoDocumento->CREATED_AT = $hoy;
            $insertTipoDocumento->UPDATED_AT = $hoy;
            $insertTipoDocumento->ESTADO = 1;
    
            $insertTipoDocumento->save();
    
            if($insertTipoDocumento){
                return response()->json(['menssage' => 'OK'], 201);
            }else{
                return response()->json(['menssage'=> 'Faild'], 201);
            }
        }else{
            return response()->json(['menssage'=> 'Datos incompletos'], 201);
        }
    }
    /**
     * Obtener Tipo Documental  por id
     */
    public function getTipoDocumentoByFilter(Request $request){
        if($request->Id_TipoDocumento != null){
            return response()->json(IDU_REG_TIPO_DOCUMENTO::where('ID_TIPO_DOCUMENTO','=',$request->Id_TipoDocumento)
                                ->get());
        }else{
            return response()->json(['menssage' => 'Id Desconocido'], 401);  
        }
    }

    /**
     * Actualizar Tipo Documental 
     */
    public function updateTipoDocumento(Request $request, $id){
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');

        if(IDU_REG_TIPO_DOCUMENTO::where('ID_TIPO_DOCUMENTO', $id)->exists() && $request->Id_Update_by != null){
            
            $updateTipoDocumento = IDU_REG_TIPO_DOCUMENTO::where('ID_TIPO_DOCUMENTO',$id)
            ->update([
                'CODIGO'=> $request->Codigo,
                'TIPO_DOCUMENTO'=> $request->Tipo_documental,
                'SOPORTE'=> $request->Soporte,
                'TIPO_RADICADO'=> $request->TipoRadicado,
                'NIVEL_CONFIDENCIALIDAD'=> $request->Nivel_confidelidad,
                'ID_USUARIO_ACTUALIZADO'=> $request->Id_Update_by,
                'ESTADO'=> $request->Estado
                ]);

            if($updateTipoDocumento){
                return response()->json(['menssage' => 'OK'], 201);
            }else{
                return response()->json(['menssage'=> 'Faild'], 201);
            }
        }else{
            return response()->json(['message' => 'Id Desconocido'], 201);
        }
    }

    /**************************************************************************************************************************************** */
    /**
     * Obtener Matriz 
     */
    public function getMatrizUser(Request $request){
        
        return response()->json(['menssage' => 'OK', 'data' =>
                                    IDU_REG_MATRIZ::where('ESTADO','=',1)->get()
                                ], 201);
    }
    /**
     * Eliminar Matriz 
     */
    public function deleteMatrizTRD(Request  $request){
        if($request->Id != null){
            $deleteEstado =  IDU_REG_MATRIZ::where('ID_MATRIZ', '=', $request->Id)->delete();
            if($deleteEstado){
                return response()->json(['menssage' => 'OK'], 201);
            }else{
                return response()->json(['menssage' => 'Faild'], 201);
            }
        }else{
            return response()->json(['menssage' => 'Id Desconocido'], 201);
        }
    }
    
    /**
     * Crear Matriz
     */
    public function addMatrizTRD(Request $request){

        date_default_timezone_set('America/Bogota');
        
        if($request != null && $request->Id_Created_by != null){
            $hoy = date('Y-m-d H:i:s');
            $insertMatriz = new IDU_REG_MATRIZ();
            $insertMatriz->timestamps = false;
            $insertMatriz->DEPENDENCIA = $request->Dependencia;
            $insertMatriz->ID_SERIE = $request->Id_Serie;
            $insertMatriz->ID_SUBSERIE = $request->Id_SubSerie;
            $insertMatriz->ID_TIPO_DOCUMENTAL = $request->Id_TipoDocumental;
            $insertMatriz->SOPORTE = $request->Soporte;
            $insertMatriz->NIVEL_CONFIDENCIALIDAD = $request->Nivel_Confidencialidad;
            $insertMatriz->ID_USUARIO_REGISTRADO = $request->Id_Created_by;
            $insertMatriz->ID_USUARIO_ACTUALIZADO = $request->Id_Created_by;
            $insertMatriz->CREATED_AT = $hoy;
            $insertMatriz->UPDATED_AT = $hoy;
            $insertMatriz->ESTADO = 1;
    
            $insertMatriz->save();
    
            if($insertMatriz){
                return response()->json(['menssage' => 'OK'], 201);
            }else{
                return response()->json(['menssage'=> 'Faild'], 201);
            }
        }else{
            return response()->json(['menssage'=> 'Datos incompletos'], 201);
        }
    }

    /**
     * Obtener Dependencias 
     */
    public function getFilterDependenciaMatrizTRD(Request $request){
        
        return response()->json(['menssage' => 'OK', 'data' =>
                                    IDU_REG_MATRIZ::select('ID_MATRIZ as id', 'DEPENDENCIA as text')
                                        ->where('ESTADO','=',1)
                                        ->get()
                                ], 201);
    }

    /**
     * Filter Dependencias 
     */
    public function postFilterDependenciaMatrizTRD(Request $request){
        if($request->Filter != null){
            $someArray = json_decode($request->Filter, true);

            if(is_array($someArray)){

                $dataResult = [];

                foreach($someArray as $item){
                    $search = IDU_REG_MATRIZ::where('ID_MATRIZ','=',$item)
                                        ->get();

                    
                    array_push($dataResult , $search[0]);
                }

                return response()->json(['menssage' => 'OK', 'data' => $dataResult], 201);

            }else{
                return response()->json(['menssage' => 'Faild'], 201);
            }

        }else{
            return response()->json(['menssage' => 'Faild'], 201);
        }
    }
     /**
     * Obtener Matriz  por id
     */
    public function getMatrizByFilter(Request $request){
        if($request->Id_Matriz != null){
            return response()->json(IDU_REG_MATRIZ::where('ID_MATRIZ','=',$request->Id_Matriz)
                                ->get());
        }else{
            return response()->json(['menssage' => 'Id Desconocido'], 401);  
        }
    }

    /**
     * Actualizar Matriz
     */
    public function updateMatrizTRD(Request $request, $id){
        date_default_timezone_set('America/Bogota');
        $hoy = date('Y-m-d H:i:s');

        if(IDU_REG_MATRIZ::where('ID_MATRIZ', $id)->exists() && $request->Id_Update_by != null && $request->Estado != null){
            $updateMatriz = IDU_REG_MATRIZ::where('ID_MATRIZ',$id)
            ->update([
                'DEPENDENCIA'=> $request->Dependencia,
                'ID_SERIE'=> $request->Id_Serie,
                'ID_SUBSERIE'=> $request->Id_SubSerie,
                'ID_TIPO_DOCUMENTAL'=> $request->Id_TipoDocumental,
                'SOPORTE'=> $request->Soporte,
                'NIVEL_CONFIDENCIALIDAD'=> $request->Nivel_Confidencialidad,
                'ID_USUARIO_ACTUALIZADO'=> $request->Id_Update_by,
                'ESTADO'=> $request->Estado
                ]);

            if($updateMatriz){
                return response()->json(['menssage' => 'OK'], 201);
            }else{
                return response()->json(['menssage'=> 'Faild'], 201);
            }
        }else{
            return response()->json(['message' => 'Id Desconocido'], 201);
        }
    }
}
