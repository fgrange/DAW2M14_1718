<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Usuari;
use \App\crearPlantilla;
use App\plantillaRevisor;

class CU_26Controller extends Controller
{
    public function getIndex() {
       //return view('CU_26');
       $users = Usuari::all();
       return view('CU_26', compact('users'));
    }
    
    
    public function postCreate(Request $request) {
       session_start();
       $plantilla = new crearPlantilla;
       $plantilla->nomPlantilla= $request->nomPlantilla;
       $plantilla->idUsuariAprovador= $request->aprov;
       $plantilla->idUsuariCreador= $_SESSION['idUsuari'];
       $plantilla->save();
     
        foreach ($request->revi as $revi):
            $plantirevisors = new plantillaRevisor;
            $plantirevisors->idUsuariRevisor= $revi;
            $plantirevisors->idPlantilla=$plantilla->idPlantilla;
            $plantirevisors->save();
        endforeach;
    
      
       return redirect ('/CU_50');

    }
    /*public function postCreate2(Request $request) {
       $plantirevisors = new plantillaRevisor;
       $plantirevisors->idUsuariRevisor= $request->revi;
       $plantirevisors->save();
       
      
       return redirect ('/CU_26');

    }*/
    
    
    
    
}