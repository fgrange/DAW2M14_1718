<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carpeta;
use App\Logs;
use Notification;

class CU_23Controller extends Controller {

    public function crearCarpeta(Request $request, $id) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        
        $permiso=app('App\Http\Controllers\ComprovarPermisos')->comprovarPermis($id);
        if (($permiso=='w')||($permiso=='s')){
            $carpeta = new Carpeta;
            $carpeta->nom = $request->nomCarpeta;
            $carpeta->descripcio = $request->descripcioCarpeta;
            $carpeta->dataCreacio = date('Y-m-d');
            $carpeta->dataModificacio = date('Y-m-d');
            $carpeta->path = "pirula";
            $carpeta->idCarpetaPare = $id;
            $carpeta->save();
            
            $log = new Logs;
            $log->idUsuari = $_SESSION['idUsuari'];
            $log->descripcio = "Carpeta ".$request->nomCarpeta." creada.";
            $log->dataLog = date('Y-m-d');
            $log->hora = date('H:i:s');
            $log->path = "En BBDD";
            $log->save();
            
            return redirect('abrirCarpeta/'.$id);
        }else{
            Notification::error("No tens permisos per realitzar aquesta acció.");
            return redirect('abrirCarpeta/'.$id);
        }
    }
}
