<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PermisUsuari;
use App\PermisGrup;
use App\UsuariGrup;

class ComprovarPermisos extends Controller {

    public function comprovarPermis($idCarpeta){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (($idCarpeta=="root")||($idCarpeta=="1")) return 'w';
        $grupos = UsuariGrup::where('idUsuari', $_SESSION['idUsuari'])->get();
        $permisoMAX='-';
        foreach ($grupos as $valor) {
            $permiso=PermisGrup::where(['idCarpeta' => $idCarpeta,'idGrup' => $valor->idGrup])->get();
            if ($permiso=='s') {
                $permisoMAX='s';
                return $permisoMAX;
            }elseif (($permiso=='w')&&(($permisoMAX=='-')||($permisoMAX=='r'))){
                $permisoMAX='w';
            }elseif (($permiso=='r')&&($permisoMAX=='-')){
                $permisoMAX='r';
            }
        };
        $permisoUsuario = PermisUsuari::where(['idUsuari' => $_SESSION['idUsuari'],'idCarpeta' => $idCarpeta])->get();
        if (isset($permisoUsuario[0])) {
            if ($permisoUsuario[0]->tipusPermis=='s') {
                $permisoMAX='s';
                return $permisoMAX;
            }elseif (($permisoUsuario[0]->tipusPermis=='w')&&(($permisoMAX=='-')||($permisoMAX=='r'))){
                $permisoMAX='w';
            }elseif (($permisoUsuario[0]->tipusPermis=='r')&&($permisoMAX=='-')){
                $permisoMAX='r';
            }
        }
        return  's';
        //return $permisoMAX;
    }
}
