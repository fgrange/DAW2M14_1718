<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuari;
use App\Logs;

class CU06Controller extends Controller
{
    
    public function getEditarPerfil()
    {
        session_start();
        return view('CU06_EditarPerfil',array('usuari'=> Usuari::find($_SESSION['idUsuari'])));
    }
    
    public function editarPerfilEdit(Request $request)
    {   
        session_start();
        $user = Usuari::find($_SESSION['idUsuari']);
        $user->nomUsuari = $request->nomUsuari;
        if (strlen($request->contrasenya)>0):
            $user->contrasenya = $request->contrasenya;
        endif;
        if (strlen($request->nom)>0):
            $user->nom = $request->nom;
        endif;
        if (strlen($request->cognoms)>0):
            $user->cognoms = $request->cognoms;
        endif;
        if (strlen($request->emal)>0):
            $user->email = $request->email;
        endif;
        $user->dadesPostals = $request->dadesPostals;
        $user->save();
        
        $log = new Logs;
        $log->idUsuari = $_SESSION['idUsuari'];
        $log->descripcio = "Usuari ".$request->nomUsuari." modificat.";
        $log->dataLog = date('Y-m-d');
        $log->hora = date('H:i:s');
        $log->path = "";
        $log->save();
        
        return redirect(url('/abrirCarpeta/root'));
    }
}
