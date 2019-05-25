<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workflow;
use App\workflowRevisor;

session_start();
class CU_35Controller extends Controller
{
    public function mostrar()
    {
        error_reporting(E_ALL ^ E_NOTICE);

        $workflows = array();
        $id_Usuario = $_SESSION['idUsuari'];


        $workflows = Workflow::select('workflows.*', 'documents.*')
            ->join('revisorworkflows', function ($join) {
                    $join->on('revisorworkflows.idWorkflow', '=', 'workflows.idWorkflow');
                })
            ->join('documents', function ($join2) {
                    $join2->on('documents.idDocument', '=', 'workflows.idDocument');
                })
            ->where('workflows.idUsuariCreacio', '=', $id_Usuario)
            ->orWhere('revisorworkflows.idUsuariRevisor', '=', $id_Usuario)->distinct()
            ->orWhere('workflows.idUsuariAprovador', '=', $id_Usuario)
            ->get();
        //->toSql();
        // dd($workflows);

        $user = workflowRevisor::where('idUsuariRevisor', '=', $id_Usuario)->get();
        // dd($user);

        return view('CU_35_Mostrar')->with('workflows', $workflows)->with('idUsuari', $id_Usuario)->with('idRevisor', $user);
    }

    public function revisarWorkflow(Request $request)
    {
      $revisio = workflowRevisor::where('idWorkflow', $request->idWorkflow)
                                ->where('idUsuariRevisor', $request->idRevisor)
                                ->update(['estat' => 'Revisat']);

      // Comprovem que tothom hagi revisat el doc
      $revisats = workflowRevisor::where('idWorkflow', $request->idWorkflow)
                                 ->where('estat', '<>', 'Revisat')
                                 // si es fica el seguent orWhere afecta als dos wheres anteriors
                                 // ->orWhere('estat', '<>', 'Rebutjat')
                                   ->count();
      // dd($revisats);
      if ($revisats == 0) {
        $canviWorkflow = Workflow::where('idWorkflow', $request->idWorkflow)
                                 ->update(['estat' => 'Revisat'], ['dataAprovacio' => date('Y-m-d H:i:s')]);

      }

      return redirect('CU_35_MostrarWorkflows');
    }

    public function rebutjarRevisarWorkflow(Request $request)
    {
      $revisio = workflowRevisor::where('idWorkflow', $request->idWorkflow)
                                ->where('idUsuariRevisor', $request->idRevisor)
                                ->update(['estat' => 'Rebutjat'], ['dataRebuig' => date('Y-m-d H:i:s')]);
      // TODO canviar alguna altra taula
    }

    public function aprovarWorkflow(Request $request)
    {
      $revisio = Workflow::where('idWorkflow', $request->idWorkflow)
                         ->update(['estat' => 'Aprovat'], ['dataAprovacio' => date('Y-m-d H:i:s')]);
      // TODO canviar alguna altra taula
    }
    public function rebutjarAprovarWorkflow(Request $request)
    {
      $revisio = Workflow::where('idWorkflow', $request->idWorkflow)
                         ->update(['estat' => 'Rebutjat'], ['dataAprovacio' => date('Y-m-d H:i:s')]);
      // TODO canviar alguna altra taula
    }

}
