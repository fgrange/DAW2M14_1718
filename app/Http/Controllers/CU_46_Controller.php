<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuari;
use Krucas\Notification\Facades\Notification;
use Illuminate\Support\Facades\DB;

class CU_46_Controller extends Controller {

    public function mostrarGrups() {

        $id = $_GET['id'];
        //$usuari = Usuari::findOrFail($id); // no funciona este metodo aqui
        //$usuari = Usuari::where('idUsuari', $id)->first(); // tampoco funciona este metodo aqui
        $usuari = DB::select("SELECT * FROM usuaris WHERE idUsuari = " . $id);

        $grups = DB::table('usuarigrup')
                        ->where('idUsuari', $id)
                        ->leftJoin('grups', 'usuarigrup.idGrup', '=', 'grups.idGrup')->get();

        $grupsTotals = DB::select("SELECT * FROM grups");

        return [$usuari, $grups, $grupsTotals];
    }

    public function modificarPertinencaGrups(Request $request) {

        $id = $request->cu46_idUsuari;
        $usuarigrup = DB::select("SELECT * FROM usuarigrup WHERE idUsuari = " . $id);

        if ($usuarigrup != null) {
            DB::delete("DELETE FROM usuarigrup WHERE idUsuari = " . $id);
        }

        if (isset($_POST['checkGrups'])) {
            $checkGrups = $_POST['checkGrups'];
            foreach ($checkGrups as $g) {
                DB::insert("INSERT INTO usuarigrup VALUES(" . $id . "," . $g . ")");
            }
        }

        return redirect('CU_42_GestionarUsuaris');
    }

}
