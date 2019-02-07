<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuari;
use App\Logs;
use Krucas\Notification\Facades\Notification;
use Illuminate\Support\Facades\DB;

class CU_45Controller extends Controller {

    public function mostraUsuari() {

        $id = $_GET['id'];
        //$usuari = Usuari::findOrFail($id); // no funciona este metodo aqui
        //$usuari = Usuari::where('idUsuari', $id)->first(); // tampoco funciona este metodo aqui
        $usuari = DB::select("SELECT * FROM usuaris WHERE idUsuari = " . $id);

        $grups = DB::table('usuarigrup')
                        ->where('idUsuari', $id)
                        ->leftJoin('grups', 'usuarigrup.idGrup', '=', 'grups.idGrup')->get();

        return [$usuari, $grups];
    }

    public function modificarUsuari(Request $request) {

        $id = $request->cu45_idUsuari;
        $usuari = DB::select("SELECT * FROM usuaris WHERE idUsuari <> " . $id . " AND (nomUsuari = '" . $request->nomUsuari . "' OR email = '" . $request->email . "')");
        $user1 = Usuari::findOrFail($id);
        $nlog = Logs::where('idLog', $request->cu45_idLog)->first();

        if ($usuari == null && $nlog == null) {
            $user1->nomUsuari = $request->cu45_nomUsuari;
            //$user1->contrasenya = bcrypt($request->cu45_contrasenya);
            $user1->contrasenya = $request->cu45_contrasenya;
            $user1->nom = $request->cu45_nom;
            $user1->cognoms = $request->cu45_cognoms;
            $user1->email = $request->cu45_email;
            $user1->dadesPostals = $request->cu45_dadesPostals;
            //$user->dataModificacio = date('Y-m-d'); // sol es fará servir si modifiquem la dataModificació
            $user1->estat = $request->cu45_estat;
            $user1->tipus = $request->cu45_tipus;
            $user1->save();

            //Registrar Log
            $nlog = new Logs;
            $nlog->idUsuari = $id;
            $nlog->descripcio = "Modificar Usuari";
            $nlog->dataLog = date('Y-m-d');
            $nlog->hora = date('H:i:s');
            $nlog->path = "";
            $nlog->save();

            Notification::success("L'usuari s'ha modificat correctament.");
            return redirect('CU_42_GestionarUsuaris');
        } else {
            Notification::error("Error!!! Aquest usuari ja existeix.");
            return redirect('CU_42_GestionarUsuaris');
        }
    }

}
