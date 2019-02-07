<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carpeta;
use App\Document;
use App\Logs;
use Notification;

class CU_20Controller extends Controller {

    public function eliminarCarpeta(Request $request, $id) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $permiso=app('App\Http\Controllers\ComprovarPermisos')->comprovarPermis($id);
        $carpeta = Carpeta::find($id);
        $idCarpeta = $carpeta->idCarpetaPare;
        if (($permiso=='w')||($permiso=='s')){
            $carpeta->delete();
            $log = new Logs;
            $log->idUsuari = $_SESSION['idUsuari'];
            $log->descripcio = "Usuari ".$_SESSION['nom']." elimina la carpeta id ".$id.".";
            $log->dataLog = date('Y-m-d');
            $log->hora = date('H:i:s');
            $log->path = "";
            $log->save();
            return redirect('abrirCarpeta/'.$idCarpeta);
        }else{
            Notification::error("No tens permisos per realitzar aquesta acció.");
            return redirect('abrirCarpeta/'.$idCarpeta);
        }
    }
    
    public function eliminarDocumento(Request $request, $id) {
        $document = Document::find($id);
        $idDocument = $document->idCarpeta;
        $permiso=app('App\Http\Controllers\ComprovarPermisos')->comprovarPermis($idDocument);//miramos permisos carpeta padre???nose
        if (($permiso=='w')||($permiso=='s')){
            $document->delete();
            $log = new Logs;
            $log->idUsuari = $_SESSION['idUsuari'];
            $log->descripcio = "Usuari ".$_SESSION['nom']." elimina el document id ".$id.".";
            $log->dataLog = date('Y-m-d');
            $log->hora = date('H:i:s');
            $log->path = "";
            $log->save();
            return redirect('abrirCarpeta/'.$idDocument);
        }else{
            Notification::error("No tens permisos per realitzar aquesta acció.");
            return redirect('abrirCarpeta/'.$idDocument);
        }
    }
}
