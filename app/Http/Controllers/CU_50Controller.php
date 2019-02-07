<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\crearPlantilla;
use App\Usuari;
use App\plantillaRevisor;
class CU_50Controller extends Controller
{
   public function getIndex() {
      $plantilla = crearPlantilla::all();
      $users = Usuari::all();
      $plantillarevisors =  plantillaRevisor::all();
       return view('CU_50', compact('plantilla', 'users','plantillarevisors'));
     // return view('CU_50');
    }
    
    /*public function MostraUsuari() {
      $users = Usuari::all(); 
     
        return view('CU_50', compact('users'));
    }
    */
    
    
}
