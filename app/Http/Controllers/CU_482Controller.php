<?php

namespace App\Http\Controllers;
use App\Usuari;
use Illuminate\Http\Request;

class CU48Controller extends Controller {
        public function getIndex(){
//             $usuari = Usuari::All();
//             return redirect('CU_42');
//          return view('CU_42');
             return view('CU_482', array('arrayUsuaris'=>Usuari::all()));


        }
}



