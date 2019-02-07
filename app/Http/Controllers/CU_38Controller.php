<?php

namespace App\Http\Controllers;

use Krucas\Notification\Facades\Notification;
use Illuminate\Http\Request;
use App\Grup;
use App\UsuariGrup;
use App\Logs;

class CU_38Controller extends Controller {

    public function modificarGrup(Request $request) {

        //Recogemos grupo a eliminar y el primer usuario de grupo (si existe)
        $grup = Grup::where('idGrup', $request->idGrupEliminar)->first();
        $usuariGrup = UsuariGrup::where('idGrup', $request->idGrupEliminar)->first();

        //Guarda dades per tornar a crear el grup
        $dataCreacioGrup = $grup->dataCreacio;
        $nomGrup = $grup->nom;

        //Si existe grupo con ese id entra
        if ($grup !== null) {

            //Si existe algun usuario de grupo entra
            if ($usuariGrup !== null) {

                //Elimina tots els usuaris del grup per la seva id.
                usuariGrup::where('idGrup', $request->input("idGrupEliminar"))->delete();
            }
            $grup->delete();

            //Crea nuevo grupo
            $grupMod = $grup;
            $grupMod->nom = $request->input("nom_Grup_Modificar");
            $grupMod->dataCreacio = $dataCreacioGrup;
            $grupMod->dataModificacio = date('Y-m-d');
            $grupMod->save();

            //Crea usuaris del grup
            $stringIdUsuarisGrup = $request->stringUsuarisGrup;
            $arrayidUsuarigrup = explode(",", $stringIdUsuarisGrup);
            foreach ($arrayidUsuarigrup as $idUsuariGrup) {
                if ($idUsuariGrup !== '') {
                    $usuariGrup = new UsuariGrup;
                    $usuariGrup->idUsuari = $idUsuariGrup;
                    $usuariGrup->idGrup = $grup->idGrup;
                    $usuariGrup->save();
                }
            }

            //Crea log
            $nlog = new Logs;
            $nlog->idUsuari = 1; // 1 = usuari admin. CORREGIR POR USUARIO QUE HA INICIADO SESION
            $nlog->descripcio = "Grup modificat: '" . $nomGrup . "'";
            $nlog->dataLog = date('Y-m-d');
            $nlog->hora = date('H:i:s');
            $nlog->path = "";
            $nlog->save();

            Notification::success("Grup modificat correctament");
            return redirect('CU_36_GestionarGrups');
        } else {
            Notification::success("No s'ha pogut modificar el grup");
            return redirect('CU_36_GestionarGrups');
        }
    }

}
