<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carpeta;
use App\Document;
use App\Logs;
use Notification;

class CU_09Controller extends Controller {

    public function moverDocumento(Request $request, $id) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $documento = Document::find($id);
        $carpeta = Carpeta::find($documento->idCarpeta);
        $carpetaPadre = Carpeta::where('nom', $request->nombreMovDocumento)->first();

        $permiso=app('App\Http\Controllers\ComprovarPermisos')->comprovarPermis($carpeta->idCarpeta);
        $permisoMover=app('App\Http\Controllers\ComprovarPermisos')->comprovarPermis($carpetaPadre->idCarpeta);
        
        if(($permiso=='w')||($permiso=='s') && ($permisoMover=='w')||($permisoMover=='s')){
            $documento->idCarpeta = $carpetaPadre->idCarpeta;
            $documento->save();
            $log = new Logs;
            $log->idUsuari = $_SESSION['idUsuari'];
            $log->descripcio = "Usuari ".$_SESSION['nom']." mou el document id ".$id." a la carpeta id ".$carpetaPadre->idCarpeta.".";
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
