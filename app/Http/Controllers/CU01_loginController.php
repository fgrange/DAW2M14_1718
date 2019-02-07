<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuari;
use App\Carpeta;
use App\Document;
use App\Logs;

class CU01_loginController extends Controller
{
    //
    function login(Request $request){
        //inici de sessiò
        session_start();
        //consulta a la BBDD per veure si el usuari i la password existeixen
        $resultat = Usuari::where('nomUsuari', '=', $request->input('user'))->where('contrasenya', '=', $request->input('password'))->get();
        //comprovem si la consutla retorna algo si es aixi guardem a la sessiò la informació del usuari i en la taula logs de la base de dades guradem l'acció el usuari 
        //que la dut a terme, el dia i l'hora
        if (count($resultat)==1){
            
           $_SESSION['idUsuari']=$resultat[0]->idUsuari;
           $_SESSION['nomUsuari']=$resultat[0]->nomUsuari;
           $_SESSION['nom']=$resultat[0]->nom;
           $_SESSION['cognoms']=$resultat[0]->cognoms;
           $_SESSION['tipus']=$resultat[0]->tipus;
           $_SESSION['carpetaActual']=$resultat[0]->carpetaActual;
           
           
           
           $log = new Logs;
           $log->idUsuari=$resultat[0]->idUsuari;
           $log->descripcio="L'usuari ".$resultat[0]->nomUsuari." a fet login";
           $log->dataLog=date('Y-m-d');
           $log->hora = date('H:i:s');
           $log->path = " ";
           $log->save();
           
          
           //consultem a la taula carpeta la ruta de la carpeta principa de l'usuari
           $idCarpetaPersonal = Carpeta::where('path', '=','privades/'.$resultat[0]->nomUsuari)->get(); 
           //redirigim a la carpeta principal del usuari;
           return redirect(url('/abrirCarpeta/'.$idCarpetaPersonal[0]->idCarpeta));
        }else {
            //en cas de que l'usuari o la contrasenya no siguin correctes s'envia un error
            return view('CU01_login',['invalido'=>'Los datos no son validos']);
        }
        
    }
}
