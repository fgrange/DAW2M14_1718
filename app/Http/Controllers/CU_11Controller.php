<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Logs;
use App\Document;

class CU_11Controller extends Controller
{
    public function getPujarVersio($id){
//        $tmp = Document::where('idDocument','=',$id)
//                        ->where('vigent','=',true)
//                        ->first();
//        if($tmp == null){
//            echo "No s'ha trobat un document amb aquest ID o aquesta versió.";
//        }
//        else{       
//            return view("CU_11_PujarVersio",array("document"=>$tmp));
//        }
        echo "Discontinued";
    }
    
    //Utilitzem la variable pel bucle i després la sobreescribim
    public function postPujarVersio(UploadRequest $request){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $llistatDocs = Document::where('idDocument','=',$request->id)
                                  ->orderBy('versioInterna','desc');
        
        $ultimaVersio = $llistatDocs->first();
        
        $llistatDocs->update(['vigent' => 0]);
                
        $novaVersio = $this->assignarValors($request, $ultimaVersio);
        
        $novaVersio->save();

        $this->registrarLog("Document ".$request->id." pujat a la versió: "
                            .$novaVersio->versioInterna,$novaVersio->idCarpeta);
        return redirect('abrirCarpeta/'.$novaVersio->idCarpeta); 
    }
    
    private function registrarLog($desc,$carpeta){
        $log = new Logs;
        if(isset($_SESSION['idUsuari'])){
            $log->idUsuari = $_SESSION['idUsuari'];
        }
        $log->descripcio = $desc;
        $log->dataLog = date('Y-m-d');
        $log->hora = date('H:i:s');
        $log->path = $carpeta;
        $log->save();
    }
    
    private function assignarValors($request,$ultimaVersio){
        $novaVersio = new Document();
        $novaVersio->versioInterna = (($ultimaVersio->versioInterna) + 1);
        if(isset($request->ver)){
            
            $novaVersio->versioUsuari = $request->ver;
        }
        else{
            $novaVersio->versioUsuari = $novaVersio->versioInterna;
        }
        
        if(isset($request->nom)){
            $novaVersio->nom = $request->nom;
        }
        else{
            $novaVersio->nom = $ultimaVersio->nom;
        }
            
        if(isset($request->desc)){
            $novaVersio->descripcio = $request->desc;
        }
        else{
            $novaVersio->descripcio = $ultimaVersio->descripcio;
        }
        
        if(isset($request->arxiu)){
            $novaVersio->path = $request->arxiu->store('documents');
        }
        else{
            $novaVersio->path = $ultimaVersio->path;
        }
        
        $novaVersio->idDocument = $request->id; 
        
        
        $novaVersio->dataModificacio = date('Y-m-d H:i:s');
        $novaVersio->vigent = 1;
        //Agafem el valor del document anterior
        $novaVersio->idCarpeta = $ultimaVersio->idCarpeta;
        $novaVersio->idusuariCreacio = $ultimaVersio->idusuariCreacio;
        $novaVersio->dataCreacio = $ultimaVersio->dataCreacio;
        $novaVersio->formatDocument = $ultimaVersio->formatDocument;
        if(isset($_SESSION['idUsuari'])){
            $novaVersio->idusuariModificacio = $_SESSION['idUsuari'];
        }
        
        return $novaVersio;
    }
}