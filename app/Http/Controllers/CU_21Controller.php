<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carpeta;
use App\Logs;
use Notification;

class CU_21Controller extends Controller {

    public function moverCarpeta(Request $request, $id) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $carpeta = Carpeta::find($id);
        $carpetaPadre = Carpeta::where('nom', $request->nombreMovCarpeta)->first();

        $permiso=app('App\Http\Controllers\ComprovarPermisos')->comprovarPermis($id);
        $permisoMover=app('App\Http\Controllers\ComprovarPermisos')->comprovarPermis($carpetaPadre->idCarpeta);
        
        if(($permiso=='w')||($permiso=='s') && ($permisoMover=='w')||($permisoMover=='s')){
            $carpeta->idCarpetaPare = $carpetaPadre->idCarpeta;
            $carpeta->save();
            $log = new Logs;
            $log->idUsuari = $_SESSION['idUsuari'];
            $log->descripcio = "Usuari ".$_SESSION['nom']." mou carpeta id ".$id." a id ".$carpetaPadre->idCarpeta.".";
            $log->dataLog = date('Y-m-d');
            $log->hora = date('H:i:s');
            $log->path = "";
            $log->save();
            
        }else{
            Notification::error("No tens permisos per realitzar aquesta acció.");
        }
        return back();
    }

}
