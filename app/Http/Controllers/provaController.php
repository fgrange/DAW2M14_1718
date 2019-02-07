<?php

namespace App\Http\Controllers;
use App\Prova;
use Illuminate\Http\Request;

class provaController extends Controller {
        public function getIndex(){
             return view('prova', array('arrayProva'=>Prova::all()));
        }
}
