<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Logs;


class CU_04Controller extends Controller
{
   public function consultarLogs(){
        error_reporting(E_ALL ^ E_NOTICE); 
       if(isset($_GET['filtro']) && isset($_GET['cadena'])){
            $logs = array();
            $logs = Logs::join('usuaris', function($join)
            {
                $join->on('usuaris.idUsuari', '=', 'logs.idUsuari')
                     ->where($_GET['filtro'], 'LIKE', '%'.$_GET['cadena'].'%');
            })->get(); 
             return view('CU_49_FiltraLogs')->with('logs', $logs);
       }else{
           
            $logs = Logs::join('usuaris', function($join)
            {
                $join->on('usuaris.idUsuari', '=', 'logs.idUsuari');
            })->get();

            return view('CU_04_ConsultarLogs')->with('logs', $logs);
       
        }
    }
     
    
}
