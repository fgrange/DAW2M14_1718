<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logs;
use App\Usuari;

class CU_49Controller extends Controller {

    public function filtraLogs() {
        error_reporting(E_ALL ^ E_NOTICE);
        if (isset($_GET['filtro'])) {
            $logs = array();
            $logs = Logs::join('usuaris', function($join) {
                        $join->on('usuaris.idUsuari', '=', 'logs.idUsuari')
                                ->where($_GET['filtro'], 'LIKE', '%' . $_GET['cadena'] . '%');
                    })->get();
        } else {
            
        }


        return view('CU_49_FiltraLogs')->with('logs', $logs);
    }

    public function filtraNom() {
        $todo = Usuari::all();
        $uno =[];
        foreach($todo as $post){
            array_push($uno,$post->nomUsuari);
        }
        return $uno;
    }
}
