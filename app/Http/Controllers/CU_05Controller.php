<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Document;
use App\Carpeta;


class CU_05Controller extends Controller
{
    public function buscador(){
        
       $result = array();
        return view('CU_05_BuscarDocuments')->with('resultado', $result);
    }
   public function buscarDocuments(){
      
        $resultado['carpetas'] = Carpeta::select('nom', 'descripcio','dataCreacio','idCarpeta')->where( 'nom', 'like', '%'.$_GET['cadena'].'%')->get();
        $resultado['documentos'] = Document::select('nom', 'descripcio','dataCreacio','idCarpeta','idDocument')->where( 'nom', 'like',  '%'.$_GET['cadena'].'%')->get();
               
        return view('CU_05_BuscarDocuments')->with('resultado', $resultado);
    }
     
    
}
