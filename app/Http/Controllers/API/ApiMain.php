<?php

namespace App\Http\Controllers\Api;

use App\Perfil;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiMain extends Controller
{
    public function getMain(Request $request)
    {

        $idPerfil = $request->idPerfil;

        $objectMain = [];

        $foldersSql = DB::select("SELECT * FROM IDU_REG_ROLES WHERE ID_PARENT = 0 AND ID_PERFIL='".$idPerfil."'");
        
        foreach($foldersSql as $folderResult){

            $idRol = $folderResult->id_roles;
            $name = $folderResult->id_subrol;

            //  1 Level

            $folders1Sql = DB::select("SELECT * FROM IDU_REG_ROLES WHERE ID_PARENT = '$idRol' AND TIPO = '1' AND ID_PERFIL='".$idPerfil."'");
            $links1Sql = DB::select("SELECT A.ID_ROLES,B.ID_LINKS,B.DESCRIPCION,B.PARAM1,B.PARAM2,B.PAGINA FROM IDU_REG_ROLES A,IDU_REG_LINKS B WHERE A.ID_LINKS = B.ID_LINKS AND A.ID_PARENT = '".$idRol."' AND A.TIPO = '2' AND ID_PERFIL='".$idPerfil."'");

            $folders1 = [];
            $links1 = [];

                //  Folders 1

                foreach($folders1Sql as $folders1Result){
                    
                    $object1Folder = [];
                    
                    $idRol1 = $folders1Result->id_roles;
                    $name1 = $folders1Result->id_subrol;

                    //  2 Level

                    $folders2Sql = DB::select("SELECT * FROM IDU_REG_ROLES WHERE ID_PARENT = '$idRol1' AND TIPO = '1' AND ID_PERFIL='".$idPerfil."'");
                    $links2Sql = DB::select("SELECT A.ID_ROLES,B.ID_LINKS,B.DESCRIPCION,B.PARAM1,B.PARAM2,B.PAGINA FROM IDU_REG_ROLES A,IDU_REG_LINKS B WHERE A.ID_LINKS = B.ID_LINKS AND A.ID_PARENT = '".$idRol1."' AND A.TIPO = '2' AND ID_PERFIL='".$idPerfil."'");

                    $folders2 = [];
                    $links2 = [];

                    //  Folders 2

                    foreach($folders2Sql as $folders2Result){
                        
                        $object2Folder = [];
                        
                        $idRol2 = $folders2Result->id_roles;
                        $name2 = $folders2Result->id_subrol;

                        //  3 Level

                        $folders2Sql = DB::select("SELECT * FROM IDU_REG_ROLES WHERE ID_PARENT = '$idRol2' AND TIPO = '1' AND ID_PERFIL='".$idPerfil."'");
                        $links2Sql = DB::select("SELECT A.ID_ROLES,B.ID_LINKS,B.DESCRIPCION,B.PARAM1,B.PARAM2,B.PAGINA FROM IDU_REG_ROLES A,IDU_REG_LINKS B WHERE A.ID_LINKS = B.ID_LINKS AND A.ID_PARENT = '".$idRol2."' AND A.TIPO = '2' AND ID_PERFIL='".$idPerfil."'");

                        $folders2 = [];
                        $links2 = [];

                        $object2Folder['name'] = $name2;
                    
                        array_push($folders2,$object2Folder);

                    }

                    //  Links 2

                    foreach($links2Sql as $links2Result){
                        
                        $object2Link = [];
                        
                        $idLinks = $links2Result->id_links;
                        $descripcion = $links2Result->descripcion;
                        $param1 = $links2Result->param1;
                        $param2 = $links2Result->param2;
                        $pagina = $links2Result->pagina;

                        $object2Link['name'] = $descripcion;
                        $object2Link['idPagina'] = $idLinks;
                        $object2Link['link'] = $pagina;

                        if($param1 == null)
                            $param1 = "";

                        if($param2 == null)
                            $param2 = "";

                        $object2Link['parameter1'] = $param1;
                        $object2Link['parameter2'] = $param2;
                    
                        array_push($links2,$object2Link);

                    }

                    $object1Folder['name'] = $name1;
                    $object1Folder['folders'] = $folders2;
                    $object1Folder['links'] = $links2;
                
                    array_push($folders1,$object1Folder);

                }

                //  Links 1

                foreach($links1Sql as $links1Result){
                    
                    $object1Link = [];
                    
                    $idLinks = $links1Result->id_links;
                    $descripcion = $links1Result->descripcion;
                    $param1 = $links1Result->param1;
                    $param2 = $links1Result->param2;
                    $pagina = $links1Result->pagina;

                    $object1Link['name'] = $descripcion;
                    $object1Link['idPagina'] = $idLinks;
                    $object1Link['link'] = $pagina;

                    if($param1 == null)
                        $param1 = "";

                    if($param2 == null)
                        $param2 = "";

                    $object1Link['parameter1'] = $param1;
                    $object1Link['parameter2'] = $param2;
                
                    array_push($links1,$object1Link);

                }

            $object = [];
            $object['name'] = $name;
            $object['folders'] = $folders1;
            $object['links'] = $links1;
            
            array_push($objectMain,$object);

        }

        return response()->json($objectMain);        

    }

}
