<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Logs;

class CU_51Controller extends Controller
{
    public function tancarSessio()
    {
        //Iniciem sessió
        session_start();
        
        //Creem una nova variable de tipus logs i guardem l'idUsuari, descripcio, dataLog, hora i path
        $log = new Logs;
        $log->idUsuari= $_SESSION['idUsuari'];
        $log->descripcio="L'usuari ".$_SESSION['nomUsuari']." a tancat sessio";
        $log->dataLog=date('Y-m-d');
        $log->hora = date('H:i:s');
        $log->path = " ";
        $log->save();
        
        //Utilitzem el metode flush() per borrar tota la informació de la sessió
        Session::flush();
        //Redirigim al CU01
        return redirect('CU01_login');
    }
}
