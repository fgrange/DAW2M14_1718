<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workflow;
use App\workflowRevisor;
use App\User;

session_start();
class CU_35Controller extends Controller
{
    public function mostrar()
    {
        error_reporting(E_ALL ^ E_NOTICE);

        $workflows = array();
        $id_Usuario = $_SESSION['idUsuari'];

        $userAdmin = User::where('idUsuari', $id_Usuario)->first();
        // dd($userAdmin->tipus);

        // ##########################
        // Comprovar dates
        $workflows = Workflow::select('workflows.*', 'documents.*')
            ->join('revisorworkflows', function ($join) {
                    $join->on('revisorworkflows.idWorkflow', '=', 'workflows.idWorkflow');
                })
            ->join('documents', function ($join2) {
                    $join2->on('documents.idDocument', '=', 'workflows.idDocument');
                })
            ->get();

        $now = date('Y-m-d H:i:s');
        $notesAutoAprov = 'Rebuig automàtic: data límit d\'aprovació superada.';
        $notesAutoRev = 'Rebuig automàtic: data límit de revisió superada.';

        // Comprovem primer l'estat de les revisions
        foreach ($workflows as $workflow) {
          if ($workflow->dataLimitRevisio < $date) {

            // Modifiquem totes les revisions amb data passada
            $wfrevisor = workflowRevisor::where('idWorkflow', $workflow->idWorkflow)
                                        ->update(['estat' => 'Rebutjat']);

            $wfrevisor = workflowRevisor::where('idWorkflow', $workflow->idWorkflow)
                                        ->update(['dataRevisio' => date('Y-m-d H:i:s')]);

            $wfrevisor = workflowRevisor::where('idWorkflow', $workflow->idWorkflow)
                                        ->update(['notesRevisor' => $request->notesAutoRev]);

            // Modifiquem el workflow i el marquem com a rebutjat
            $wf = Workflow::where('idWorkflow', $workflow->idWorkflow)
                          ->update(['estat' => 'Rebutjat']);

          }
        }

        // Comprovem l'estat de les aprovacions
        foreach ($workflows as $workflow) {
          if ($workflow->dataLimitAprovacio < $date) {
            // Modifiquem el workflow amb data d'aprovacio passada
            $wf = Workflow::where('idWorkflow', $workflow->idWorkflow)
                          ->update(['estat' => 'Rebutjat']);

            $wf = Workflow::where('idWorkflow', $workflow->idWorkflow)
                          ->update(['dataAprovacio' => date('Y-m-d H:i:s')]);

            $wf = Workflow::where('idWorkflow', $workflow->idWorkflow)
                          ->update(['notesAprovador' => $request->notesAutoAprov]);
          }
        }
        // ##########################
        // Final comprovar dates


        if ($userAdmin->tipus == 'Administrador') {
          $workflows = Workflow::select('workflows.*', 'documents.*')
              ->join('revisorworkflows', function ($join) {
                      $join->on('revisorworkflows.idWorkflow', '=', 'workflows.idWorkflow');
                  })
              ->join('documents', function ($join2) {
                      $join2->on('documents.idDocument', '=', 'workflows.idDocument');
                  })
              ->distinct()
              ->get();
          $user = $userAdmin;
        }
        // dd($userAdmin->tipus);
        if ($userAdmin->tipus == 'Estandar') {
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

          $user = workflowRevisor::where('idUsuariRevisor', '=', $id_Usuario)->get();
        }



        // dd($user);

        return view('CU_35_Mostrar')->with('workflows', $workflows)->with('idUsuari', $id_Usuario)->with('idRevisor', $user);
    }

    // public function comprovarDates()
    // {
    //   $workflows = Workflow::select('workflows.*', 'documents.*')
    //       ->join('revisorworkflows', function ($join) {
    //               $join->on('revisorworkflows.idWorkflow', '=', 'workflows.idWorkflow');
    //           })
    //       ->join('documents', function ($join2) {
    //               $join2->on('documents.idDocument', '=', 'workflows.idDocument');
    //           })
    //       ->get();
    //
    //   $now = date('Y-m-d H:i:s');
    //   $notesAutoAprov = 'Rebuig automàtic: data límit d\'aprovació superada.';
    //   $notesAutoRev = 'Rebuig automàtic: data límit de revisió superada.';
    //
    //   // Comprovem primer l'estat de les revisions
    //   foreach ($workflows as $workflow) {
    //     if ($workflow->dataLimitRevisio < $date) {
    //
    //       // Modifiquem totes les revisions amb data passada
    //       $wfrevisor = workflowRevisor::where('idWorkflow', $workflow->idWorkflow)
    //                                   ->update(['estat' => 'Rebutjat']);
    //
    //       $wfrevisor = workflowRevisor::where('idWorkflow', $workflow->idWorkflow)
    //                                   ->update(['dataRevisio' => date('Y-m-d H:i:s')]);
    //
    //       $wfrevisor = workflowRevisor::where('idWorkflow', $workflow->idWorkflow)
    //                                   ->update(['notesRevisor' => $request->notesAutoRev]);
    //
    //       // Modifiquem el workflow i el marquem com a rebutjat
    //       $wf = Workflow::where('idWorkflow', $workflow->idWorkflow)
    //                     ->update(['estat' => 'Rebutjat']);
    //
    //     }
    //   }
    //
    //   // Comprovem l'estat de les aprovacions
    //   foreach ($workflows as $workflow) {
    //     if ($workflow->dataLimitAprovacio < $date) {
    //       // Modifiquem el workflow amb data d'aprovacio passada
    //       $wf = Workflow::where('idWorkflow', $workflow->idWorkflow)
    //                     ->update(['estat' => 'Rebutjat']);
    //
    //       $wf = Workflow::where('idWorkflow', $workflow->idWorkflow)
    //                     ->update(['dataAprovacio' => date('Y-m-d H:i:s')]);
    //
    //       $wf = Workflow::where('idWorkflow', $workflow->idWorkflow)
    //                     ->update(['notesAprovador' => $request->notesAutoAprov]);
    //     }
    //   }
    // }

    public function revisarWorkflow(Request $request)
    {

      // REVIEW hauria de ser aixi, pero nomes fa update del primer valor i no dels tres
      // $revisio = workflowRevisor::where('idWorkflow', $request->idWorkflow)
      //                           ->where('idUsuariRevisor', $request->idRevisor)
      //                           ->update(['estat' => 'Revisat'], ['dataRevisio' => $date], ['notesRevisor' => $request->notesRevisor]);

      $revisio = workflowRevisor::where('idWorkflow', $request->idWorkflow)
                                ->where('idUsuariRevisor', $request->idRevisor)
                                ->update(['estat' => 'Revisat']);

      $revisio = workflowRevisor::where('idWorkflow', $request->idWorkflow)
                                ->where('idUsuariRevisor', $request->idRevisor)
                                ->update(['dataRevisio' => date('Y-m-d H:i:s')]);

      $revisio = workflowRevisor::where('idWorkflow', $request->idWorkflow)
                                ->where('idUsuariRevisor', $request->idRevisor)
                                ->update(['notesRevisor' => $request->notesRevisor]);

      // Comprovem que tothom hagi revisat el doc
      // REVIEW aqui lo ideal sera fer una subquery per agrupar tots els estats
      // que hi ha, pero de moment no es necessari
      $revisats = workflowRevisor::where('idWorkflow', $request->idWorkflow)
                                 ->where('estat', 'Nou')
                                 ->count();

      if ($revisats == 0) {
        $canviWorkflow = Workflow::where('idWorkflow', $request->idWorkflow)
                                 ->update(['estat' => 'Revisat'], ['dataAprovacio' => date('Y-m-d H:i:s')]);

        $canviWorkflow = Workflow::where('idWorkflow', $request->idWorkflow)
                                 ->update(['dataAprovacio' => date('Y-m-d H:i:s')]);

      }

      return redirect('CU_35_MostrarWorkflows');
    }

    public function rebutjarRevisarWorkflow(Request $request)
    {
      // REVIEW hauria de ser aixi, pero nomes fa update del primer valor i no dels tres
      // $revisio = workflowRevisor::where('idWorkflow', $request->idWorkflow)
      //                           ->where('idUsuariRevisor', $request->idRevisor)
      //                           ->update(['estat' => 'Rebutjat'], ['dataRebuig' => date('Y-m-d H:i:s')], ['notesRevisor' => $request->notesRevisor]);

      $revisio = workflowRevisor::where('idWorkflow', $request->idWorkflow)
                                ->where('idUsuariRevisor', $request->idRevisor)
                                ->update(['estat' => 'Rebutjat']);

      $revisio = workflowRevisor::where('idWorkflow', $request->idWorkflow)
                                ->where('idUsuariRevisor', $request->idRevisor)
                                ->update(['dataRebuig' => date('Y-m-d H:i:s')]);

      $revisio = workflowRevisor::where('idWorkflow', $request->idWorkflow)
                                ->where('idUsuariRevisor', $request->idRevisor)
                                ->update(['notesRevisor' => $request->notesRevisor]);

      // Comprovem que tothom hagi revisat el doc
      // REVIEW aqui lo ideal sera fer una subquery per agrupar tots els estats
      // que hi ha, pero de moment no es necessari
      $revisats = workflowRevisor::where('idWorkflow', $request->idWorkflow)
                                 ->where('estat', 'Nou')
                                 ->count();
      if ($revisats == 0) {
        $canviWorkflow = Workflow::where('idWorkflow', $request->idWorkflow)
                                 ->update(['estat' => 'Revisat'], ['dataAprovacio' => date('Y-m-d H:i:s')]);

        $canviWorkflow = Workflow::where('idWorkflow', $request->idWorkflow)
                                 ->update(['dataAprovacio' => date('Y-m-d H:i:s')]);

      }

      return redirect('CU_35_MostrarWorkflows');
    }

    public function aprovarWorkflow(Request $request)
    {
      // REVIEW hauria de ser aixi, pero nomes fa update del primer valor i no dels tres
      // $revisio = Workflow::where('idWorkflow', $request->idWorkflow)
      //                    ->update(['estat' => 'Aprovat'], ['dataAprovacio' => date('Y-m-d H:i:s')], ['notesAprovador' => $request->notesAprovador]);

      $revisio = Workflow::where('idWorkflow', $request->idWorkflow)
                         ->update(['estat' => 'Aprovat']);

      $revisio = Workflow::where('idWorkflow', $request->idWorkflow)
                         ->update(['dataAprovacio' => date('Y-m-d H:i:s')]);

      $revisio = Workflow::where('idWorkflow', $request->idWorkflow)
                         ->update(['notesAprovador' => $request->notesAprovador]);

      return redirect('CU_35_MostrarWorkflows');
    }

    public function rebutjarAprovarWorkflow(Request $request)
    {
      // REVIEW hauria de ser aixi, pero nomes fa update del primer valor i no dels tres
      // $revisio = Workflow::where('idWorkflow', $request->idWorkflow)
      //                    ->update(['estat' => 'Rebutjat'], ['dataRebuig' => date('Y-m-d H:i:s')], ['notesAprovador' => $request->notesAprovador]);

      $revisio = Workflow::where('idWorkflow', $request->idWorkflow)
                         ->update(['estat' => 'Rebutjat']);

      $revisio = Workflow::where('idWorkflow', $request->idWorkflow)
                         ->update(['dataRebuig' => date('Y-m-d H:i:s')]);

      $revisio = Workflow::where('idWorkflow', $request->idWorkflow)
                         ->update(['notesAprovador' => $request->notesAprovador]);

      return redirect('CU_35_MostrarWorkflows');
    }

    public function completarWorkflow($id)
    {
      $completar = Workflow::where('idWorkflow', $id)
                           ->update(['estat' => 'Finalitzat']);

      $completarRev = workflowRevisor::where('idWorkflow', $id)
                                     ->update(['estat' => 'Finalitzat']);

      return redirect('CU_35_MostrarWorkflows');
    }

    public function eliminarWorkflow($id)
    {
      $eliminar = Workflow::where('idWorkflow', $id)
                          ->delete();

      $eliminarRev = workflowRevisor::where('idWorkflow', $id)
                                    ->delete();

      return redirect('CU_35_MostrarWorkflows');
    }

}
