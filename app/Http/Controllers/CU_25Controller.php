<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Usuari;
use App\Document;
use App\workflowRevisor;
use App\crearWorkFlow;
use App\crearPlantilla;


class CU_25Controller extends Controller
{
    public function getIndex() {
       //return view('CU_26');
       $documents = Document::all();
       $users = Usuari::all();
       $plantilla = crearPlantilla::all();
       return view('CU_25_CrearWorkFlow', compact('users', 'documents', 'plantilla'));
    }
    
    
    public function postCreate(Request $request) {
       session_start();
       $worklows = new crearWorkFlow;
       $worklows->idDocument= $request->document;
       $worklows->idUsuariAprovador= $request->aprov;
       $worklows->idUsuariCreacio= $_SESSION['idUsuari'];
       $worklows->dataCreacio= date('Y-m-d H:i:s');
       $worklows->dataLimitRevisio= $request->dataRevi;
       $worklows->dataLimitAprovacio= $request->dataAprov;
       $worklows->estat= 'Nou';
       
       $worklows->save();
          
//       $plantirevisors = new plantillaRevisor;
//       $plantirevisors->idUsuariRevisor= $request->revi;
     
        foreach ($request->revi as $revi):
            $revisorworkflows = new workflowRevisor;
            $revisorworkflows->idUsuariRevisor= $revi;
            $revisorworkflows->idWorkflow=$worklows->idWorkflow;
            $revisorworkflows->save();
        endforeach;
    
      
       return redirect ('/mostar_workflows');

    }
    /*public function postCreate2(Request $request) {
       $plantirevisors = new plantillaRevisor;
       $plantirevisors->idUsuariRevisor= $request->revi;
       $plantirevisors->save();
       
      
       return redirect ('/CU_26');

    }*/
    
    public function descarregarDocument($idDocument) {
        //Al pitja el boto de descarrega es fa una consulta per obtenir el path del document i amb la ruta es descarrega el document 
      $resultat = Document::where('idDocument', '=', $idDocument)->get();

      return response()->download(storage_path("app/{$resultat[0]->path}"));
    }
    
    
}
