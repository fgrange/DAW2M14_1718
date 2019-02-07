<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\Logs;


class CU_17_Controller extends Controller {

     public function EliminarVersio($id,$versioInterna){
      $elver = Document::where('idDocument','=',$id)  
                        ->where('versioInterna','=',$versioInterna)
                        ->delete();
      $tmp = Document::where('idDocument','=',$id)  
                      ->get();
      
      
      
        return view("CU_16_veureVersions",array("versions"=>$tmp));
        
       
   
}

private function registrarLog($desc){
        $log = new Logs;
        if(isset($_SESSION['idUsuari'])){
            $log->idUsuari = $_SESSION['idUsuari'];
        }
        $log->descripcio = $desc;
        $log->dataLog = date('Y-m-d');
        $log->hora = date('H:i:s');
        $log->save();
    }
}
