<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\document;
use App\Logs;




class CU_15Controller extends Controller
{
    private function eliminarVigents($id){
        Document::where('idDocument','=',$id)
                    ->where('vigent','=',1)
                    ->update(['vigent' => 0]); 
    } 
    
    public function getPromocionarVersio($id,$versioInterna){
        $this->eliminarVigents($id);
        
        Document::where('idDocument','=',$id)
                  ->where('versioInterna','=',$versioInterna)
                  ->update(['vigent' => 1]);
        
        $this->registrarLog("S'ha promocionat la versió ".$versioInterna." dels document ".$id);
        
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
        $log->path = "En BBDD";
        $log->save();
    }
}
