<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuari;
use Krucas\Notification\Facades\Notification;
use Illuminate\Support\Facades\DB;

class CU_47_pruebaController extends Controller {

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

    public function altaUsuari(Request $request) {

        $id = $request->cu47_idUsuari;
        $user1 = Usuari::findOrFail($id);

        //$user1->estat = 1;
        //$user1->save();

        Notification::success("L'usuari s'ha donat d'alta correctament.");
        return redirect('CU_42_GestionarUsuaris');
    }

}
