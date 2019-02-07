<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\URL_Document;
use App\Document;

class CU12_urlController extends Controller
{
    public function generaURL(Request $request, $id, $idVer, $path, $pathb) {
        
        $ruta=$path.'/'.$pathb;
        //Es fa consulta per comprovar si el document del que es vol genera la url existeix
        $resultat = Document::where('idDocument', '=', $id)->where('versioInterna', '=', $idVer)->first();
        
        $doc = new URL_Document;
        //Si el document existeix es fa una consulta a la taula URL_Document per comprovar que no se li a generat una url anteriorment 
        if(count($resultat)==1){
            
            $user = URL_Document::where('idDocument', '=', $id)
                                ->where ('versioInterna', '=', $idVer)
                                ->get()->count();
            //En cas de no tenir la url generada es genera
            if($user==0){
                
                $doc->idDocument=$id;
                $doc->versioInterna=$idVer;
                $doc->url="http://localhost/DAW2M14/public/CU12_URL_Descarrega/".$id."/".$idVer."/".$path."/".$pathb;
                $doc->actiu=true;
                $doc->save();
            }
        }
       return redirect('abrirCarpeta/'.$resultat->idCarpeta);
        
    }
    
    public function descarregarURL($id, $idVer, $path, $pathb) {
        
        //Copiada la url en un navegador es descarrega el document 
      
        $ruta=$path.'/'.$pathb;
      
      return response()->download(storage_path("app/{$ruta}"));
     
    }
    
}
