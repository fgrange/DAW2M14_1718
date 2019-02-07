<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carpeta;
use App\Logs;
use Notification;

class CU_22Controller extends Controller {

    public function modificarCarpeta(Request $request, $id) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $carpeta = Carpeta::find($id);
        $permiso=app('App\Http\Controllers\ComprovarPermisos')->comprovarPermis($id);
        if (($permiso=='w')||($permiso=='s')){
            $carpeta->nom = $request->nombreInput;
            $carpeta->descripcio = $request->descripcioInput;
            $carpeta->dataModificacio = date('Y-m-d');
            $carpeta->save();
            $log = new Logs;
            $log->idUsuari = $_SESSION['idUsuari'];
            $log->descripcio = "Usuari ".$_SESSION['nom']." modifica la id ".$id.".";
            $log->dataLog = date('Y-m-d');
            $log->hora = date('H:i:s');
            $log->path = "";
            $log->save();
        }else{
            Notification::error("No tens permisos per realitzar aquesta acció.");
        }
        return redirect('abrirCarpeta/'.$carpeta->idCarpetaPare);
    }

}
