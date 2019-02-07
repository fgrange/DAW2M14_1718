<?php

namespace App\Http\Controllers;

use App\Usuari;

class CU_42_Controller extends Controller {

    public function mostrarUsuaris() {

        $users = Usuari::all();
        return view('CU_42_GestionarUsuaris')->with('users', $users);
    }

}
