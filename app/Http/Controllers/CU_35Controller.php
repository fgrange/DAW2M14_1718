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

        $user = workflowRevisor::where('idUsuariRevisor', '=', $id_Usuario)->first();
        // dd($user);

        return view('CU_35_Mostrar')->with('workflows', $workflows)->with('idUsuari', $id_Usuario)->with('idRevisor', $user);
    }

    public function revisarWorkflow(Request $request, $id)
    {
      // dd($request);
      // Ha de ser first i no get perque el get ens retorna una coleccio i no podem fer update
      $revisio = workflowRevisor::where('idWorkflow', $request->idWorkflow)
                                ->where('idUsuariRevisor', $id)
                                ->first();
      // dd($revisio);
      $revisio->dataRevisio = date('Y-m-d H:i:s');
      $revisio->estat = 'Revisat';
      $revisio->save();

      // Comprovem que tothom hagi revisat el doc
      $revisats = workflowRevisor::where('idWorkflow', $request->idWorkflow)
                                 ->where('estat', '<>', 'Revisat')
                                 // si es fica el seguent orWhere afecta als dos wheres anteriors
                                 // ->orWhere('estat', '<>', 'Rebutjat')
                                 ->get();
      // dd($revisats);
      if (!$revisats) {
        $canviWorkflow = Workflow::findOrFail($request->idWorkflow);
        $canviWorkflow->estat = 'Revisat';
        $canviWorkflow->save();
      }

      return redirect('CU_35_MostrarWorkflows');
    }

    public function rebutjarRevisarWorkflow(Request $request, $id)
    {
      $revisio = revisorworkflows::where('idWorkflow', $id)
                                 ->where('idUsuariRevisor', $idUsuariRevisor)
                                 ->get();
      $revisio->dataRevisio = date('Y-m-d H:i:s');
      $revisio->estat = 'Revisio rebutjada';
    }

}
