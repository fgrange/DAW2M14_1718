<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Logs;
use App\Document;

class CU_08Controller extends Controller
{
    public function getPujarDoc(){
        return view('CU_08_PujarDoc');
    }
    
    public function postPujarDoc(UploadRequest $request, $idCarpeta){        
        //Storage::disk('local')->put($request->input('arxiu'), $request->input('arxiu'));
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $savePath = $request->arxiu->store('documents');
       
        $nouDoc = new Document;
        
        $nouDoc->nom = $request->nom;
        $nouDoc->descripcio = $request->desc;
        $nouDoc->versioInterna = 1;
        $nouDoc->versioUsuari = 1.0;
        $nouDoc->vigent = true;
        $nouDoc->dataCreacio = date('Y-m-d H:i:s');
        $nouDoc->path = $savePath;
        
        $tmp = explode('.',$savePath);
        $nouDoc->formatDocument = $tmp[(count($tmp)-1)];

        if(isset($_SESSION['idUsuari'])){
            $nouDoc->idusuariCreacio = $_SESSION['idUsuari'];
        }
        
        $nouDoc->idCarpeta = $idCarpeta;
        
        $nouDoc->save();
        
        //LOG----------------  
        $this->registrarLog("Pujar document: ".$request->nom,$idCarpeta);
        
        return redirect('abrirCarpeta/'.$idCarpeta);
        
    }
    
    private function registrarLog($desc,$carpeta){
        $log = new Logs;
        $log->idUsuari = $_SESSION['idUsuari'];
        $log->descripcio = $desc;
        $log->dataLog = date('Y-m-d');
        $log->hora = date('H:i:s');
        $log->path = $carpeta;
        $log->save();
    }
}
