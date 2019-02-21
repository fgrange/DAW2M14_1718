<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuari;
use App\Logs;
use Krucas\Notification\Facades\Notification;
use Illuminate\Support\Facades\DB;

class CU_43Controller extends Controller {

    public function mostraUsuari() {

        $id = filter_input(INPUT_GET, 'id');
        //$usuari = Usuari::findOrFail($id);// no funciona este metodo aqui
        //$usuari = Usuari::where('idUsuari', $id)->first();// tampoco funciona este metodo aqui
        $usuari = DB::select("SELECT * FROM usuaris WHERE idUsuari = " . $id);

        $grups = DB::table('usuarigrup')
                        ->where('idUsuari', $id)
                        ->leftJoin('grups', 'usuarigrup.idGrup', '=', 'grups.idGrup')->get();

        return [$usuari, $grups];
    }

    public function eliminarUsuari(Request $request) {

        $id = $request->cu43_idUsuari;
        $nom = $request->cu43_nomUsuari;
        $user = Usuari::findOrFail($id);
        $nlog = Logs::where('idLog', $request->cu43_idLog)->first();

        //$nlog = DB::select("SELECT * FROM logs WHERE idUsuari = " . $id);


        if ($user != null && $nlog == null) {
            if ($user != null) {
              $nlog = new Logs;
              $nlog->idUsuari = $id;
              $nlog->descripcio = "S'ha eliminat l'usuari " . $nom;
              $nlog->dataLog = date('Y-m-d');
              $nlog->hora = date('H:i:s');
              $nlog->path = "";
              $nlog->save();

              //Intent de que el log pertanyi al usuari que ha eliminat l'usuari i no a l'usuari eliminat
              //$nlog->idUsuari = DB::table('logs')->where('descripcio', 'like' '%login')->orderBy('dataLog', 'desc')->limit(1)->select('idUsuari');

              //Eliminar primer tots els logs del user i despres el user
              $nlog = Logs::where('idUsuari', '=', $id)->delete();
              $user->delete();

              Notification::success("L'usuari s'ha eliminat correctament.");
              return redirect('CU_42_GestionarUsuaris');
            } else {
                Notification::error("Error!!! Aquest usuari no existeix.");
                return redirect('CU_42_GestionarUsuaris');
            }

            /* Falta eliminar carpeta o pertinença agrups??   */
        }
    }

}
