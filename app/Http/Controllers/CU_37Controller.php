<?php

namespace App\Http\Controllers;

use Krucas\Notification\Facades\Notification;
use Illuminate\Http\Request;
use App\Grup;
use App\UsuariGrup;
use App\Logs;

class CU_37Controller extends Controller {

    public function eliminarGrup(Request $request) {
        
        //recogemos grupo a eliminar y el primer usuario de grupo (si existe)
        $grup = Grup::where('idGrup', $request->idGrupEliminar)->first();
        $usuariGrup = UsuariGrup::where('idGrup', $request->idGrupEliminar)->first();
        $nomGrup = $grup->nom;
        
        //si existe grupo entra
        if ($grup !== null) {
            
            //si existe algun usuario de grupo entra
            if ($usuariGrup !== null) {

                //crea array con usuarios del grupo con ese idGrup
                $arrayUsuarisGrup = UsuariGrup::where('idGrup', $request->idGrupEliminar)->get();
                
                //recorre y elimina usuarios del grupo
                foreach ($arrayUsuarisGrup as $idUsuariGrup) {
                    $usuariGrup2 = UsuariGrup::where('idGrup', $request->idGrupEliminar)->first();
                    $usuariGrup2->delete();
                }
            }
            //elimina grup
            $grup->delete();
            
            //crea log
            $nlog = new Logs;
            $nlog->idUsuari = 1; //usuari admin. CORREGIR POR USUARIO QUE HA INICIADO SESION
            $nlog->descripcio = "Grup eliminat: '" . $nomGrup . "'";
            $nlog->dataLog = date('Y-m-d');
            $nlog->hora = date('H:i:s');
            $nlog->path = "";
            $nlog->save();
            
            Notification::success("Grup eliminat correctament");
            return redirect('CU_36_GestionarGrups');
        } else {
            Notification::success("No s'ha pogut eliminar el grup");
            return redirect('CU_36_GestionarGrups');
        }
    }

}
