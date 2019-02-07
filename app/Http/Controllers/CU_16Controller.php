<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\document;

class CU_16Controller extends Controller
{
   public function veureVersions( $id ){
      $tmp = Document::where('idDocument','=',$id)  
                      ->get();
      
      
      
        return view("CU_16_veureVersions",array("versions"=>$tmp));
        
        



    }
     
    
}
