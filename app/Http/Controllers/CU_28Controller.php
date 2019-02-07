<?php

namespace App\Http\Controllers;
use App\crearPlantilla;
use App\plantillaRevisor;


class CU_28Controller extends Controller
{
     public function getEliminarPlatilla($id){
         $plantiRevi = plantillaRevisor::findOrFail($id);
        $plantilla = crearPlantilla::findOrFail($id);
        $plantiRevi->delete();
        $plantilla->delete();
     

        return redirect('/CU_50');
    }
   
}

