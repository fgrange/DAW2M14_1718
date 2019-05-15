<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Usuari;
use App\Document;
use App\workflowRevisor;
use App\crearWorkFlow;
use App\crearPlantilla;
use App\plantillaRevisor;


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
        $worklows->dataCreacio = date('Y-m-d H:i:s');
        $worklows->dataLimitRevisio = date('Y-m-d H:i:s', strtotime($request->dataRevi));
        $worklows->dataLimitAprovacio= date('Y-m-d H:i:s', strtotime($request->dataAprov));
        $worklows->estat= 'Nou';
        $worklows->save();

        $ultimWorkflow = crearWorkFlow::max("idWorkflow");
        if (!empty($request->revisors)) {//inserta en la base de datos si almenos un select esta seleccionado.

            foreach ($request->revisors as $revi){
                 $revisorworkflows = new workflowRevisor;
                 $revisorworkflows->idUsuariRevisor = $revi;
                 $revisorworkflows->idWorkflow = $ultimWorkflow;
                 $revisorworkflows->save();
            }
       }
        return redirect ('/CU_35_MostrarWorkflows');
    }


    public function deleteWorkflow($idWorkflow) {
        $deleteRevisors = workflowRevisor::where('idWorkflow', $idWorkflow)->delete();
        $deleteWorkflow = crearWorkFlow::where('idWorkflow', $idWorkflow)->delete();
        // REVIEW notificacions workflow?
        return redirect ('/CU_35_MostrarWorkflows');
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

    public function getPlantilla(Request $request, $id){

      $plantilla['plantilla'] = crearPlantilla::where('idPlantilla', $id)->get();
      $plantilla['rev'] = plantillaRevisor::where('idPlantilla', $id)->get();

      echo json_encode($plantilla);
    }


}
