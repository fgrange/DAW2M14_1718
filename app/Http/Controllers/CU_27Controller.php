<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Usuari;
use \App\crearPlantilla;
use App\plantillaRevisor;
class CU_27Controller extends Controller {
public function getIndex($id){
       $plantillas = crearPlantilla::findOrFail($id);
       $userAprov = Usuari::all();
       $usersRev = plantillaRevisor::all();
       return view('CU_27_EditarPlantilla_modal', compact('plantillas', 'userAprov', 'usersRev','id'));
}
public function editarPlantilla(Request $request, $id) {
        var_dump($id);
        session_start();
       $plantillas = crearPlantilla::findOrFail($id);
       
       
       $plantillas->nomPlantilla= $request->nomPlantilla;
        $plantillas->idUsuariAprovador= $request->aprov;
       
       $plantillas->idUsuariCreador= $_SESSION['idUsuari'];
       $plantillas->save();
        
        $plantirevisors = plantillaRevisor::findOrFail($id);
        
//      print_r(Usuari::where('nomUsuari','=',)->first()->idUsuari);
         $plantirevisors->idUsuariRevisor = $request->revi[0];
        
        //$plantirevisors->idUsuariRevisor=$request->revi4;
        
        /*if (revi[0] == null){
            $plantirevisors->idUsuariRevisor = $request->revi4[0];
        } else{
            $plantirevisors->idUsuariRevisor=$request->revi[0];
        }*/
        
        $plantirevisors->save();
        
 
      
        return redirect ('/CU_50');
       //return view('/CU_50');
       //
//       $plantilla->nomPlantilla= $request->nomPlantilla;
//       $plantilla->idUsuariAprovador= $request->aprov;
//       $plantilla->idUsuariCreador= $_SESSION['idUsuari'];
//       $plantilla->save();
//       
//       $plantirevisors->idUsuariRevisor= $request->revi;
//       $plantirevisors->idPlantilla=$plantilla->idPlantilla;
//       $plantirevisors->save();
       
      
      //return redirect ('/CU_50');
    }
    
}

