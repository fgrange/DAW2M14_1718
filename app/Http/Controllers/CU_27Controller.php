<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuari;
use \App\crearPlantilla;
use App\plantillaRevisor;

class CU_27Controller extends Controller
{
    public function getIndex($id)
    {
        $plantillas = crearPlantilla::findOrFail($id);
        $userAprov = Usuari::all();
        $usersRev = plantillaRevisor::all();
        return view('CU_27_EditarPlantilla_modal', compact('plantillas', 'userAprov', 'usersRev', 'id'));
    }
    public function editarPlantilla(Request $request, $id)
    {
        var_dump($id);
        session_start();

        // Busquem la plantilla i editem id i aprovador
        $plantillas = crearPlantilla::findOrFail($id);
        $plantillas->nomPlantilla= $request->nomPlantilla;
        $plantillas->idUsuariAprovador= $request->aprov;
        $plantillas->idUsuariCreador= $_SESSION['idUsuari'];
        $plantillas->save();

        // Busquem els revisors de la plantilla, els eliminem i afgim els nous
        $plantirevisors = plantillaRevisor::where('idPlantilla', $id)->delete();
        foreach ($request->revi as $revi) {
            $revisorPlantilla = new plantillaRevisor;
            $revisorPlantilla->idUsuariRevisor = $revi;
            $revisorPlantilla->idPlantilla = $id;
            $revisorPlantilla->save();
        }

        return redirect('/CU_50');
    }
}
