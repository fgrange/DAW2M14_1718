<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Workflow;
use App\workflowRevisor;
session_start();
class CU_35Controller extends Controller
{
   public function mostrar(){
       error_reporting(E_ALL ^ E_NOTICE);
       
            $workflows = array();
            $id_Usuario = $_SESSION['idUsuari'];
            
            
            $workflows = Workflow::select('workflows.*','documents.*')
            ->join('revisorworkflows', function($join)
                {           
                    $join->on('revisorworkflows.idWorkflow', '=', 'workflows.idWorkflow');
                }
            )
            ->join('documents', function($join2)
                {           
                    $join2->on('documents.idDocument', '=', 'workflows.idDocument');
                }
            )
            ->where('revisorworkflows.idUsuariRevisor', '=', $id_Usuario)
            ->where( 'workflows.idUsuariCreacio', '=', $id_Usuario)
            ->orWhere( 'workflows.idUsuariAprovador', '=', $id_Usuario)
            ->get();
            //->toSql(); 
            
            $user = workflowRevisor::where('idUsuariRevisor', '=', $id_Usuario)->get();
              
        return view('CU_35_Mostrar')->with('workflows', $workflows)->with('idUsuari',$id_Usuario)->with('idRevisor',$user); 
    }
     
    
}
