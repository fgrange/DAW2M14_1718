<?php

namespace App\Http\Controllers;

use Krucas\Notification\Facades\Notification;
use Illuminate\Http\Request;
use App\Grup;
use App\UsuariGrup;
use App\Logs;

class CU_40Controller extends Controller {

    public function afegirGrup(Request $request) {
        
        //Buscamos grupo con ese nombre
        $grup = Grup::where('nom', $request->input("nom_Grup"))->first();
        $nomGrup = $request->input("nom_Grup");

        //Si no existe grupo con ese nombre entra y crea grupo
        if ($grup == null) {
            $grup = new Grup;
            $grup->nom = $request->input("nom_Grup");
            $grup->dataCreacio = date('Y-m-d');
            $grup->dataModificacio = date('Y-m-d');
            $grup->save();
            
            //Recoger string de id de usuaris y hacer array para hacer varios insert en la tabla usuarisGrup
            $stringIdUsuarisGrup = $request->stringUsuarisGrup;
            
            //Si existe string de usuaris entra (si has añadido algun usuario al grupo estara creado, si no no)
            if ($stringIdUsuarisGrup !== null) {
                $arrayidUsuarigrup = explode(",", $stringIdUsuarisGrup);
                foreach ($arrayidUsuarigrup as $idUsuariGrup) {
                    $usuariGrup = new UsuariGrup;
                    $usuariGrup->idUsuari = $idUsuariGrup;
                    $usuariGrup->idGrup = $grup->idGrup;
                    $usuariGrup->save();
                }
            }
            
            //Crea log
            $nlog = new Logs;
            $nlog->idUsuari = 1; 
            $nlog->descripcio = "Grup creat: '" . $nomGrup . "'";
            $nlog->dataLog = date('Y-m-d');
            $nlog->hora = date('H:i:s');
            $nlog->path = "";
            $nlog->save();

            Notification::success("Grup creat correctament.");
            return redirect('CU_36_GestionarGrups');
        } else {
            Notification::error("Ja existeix un grup amb aquest nom");
            return redirect('CU_36_GestionarGrups');
        }
    }

}
