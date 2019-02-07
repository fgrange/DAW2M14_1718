<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Carpeta;
use App\Document;
use Illuminate\Http\Request;
use ZipArchive;

class CU_19Controller extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id, $path, $nombre) {
        //Creamos una variable de tipo ZipArchive.
        $zip = new ZipArchive();
        //Abrimo esta nueva variable y le damos un nombre y la creamos.
        $zip->open($nombre . ".zip", ZipArchive::CREATE);
        //Creamos la primera carpeta dentro del zip.
        $zip->addEmptyDir($nombre);
        //Llamamos al metodo fills y le pasamos de parametro la id de la carpeta,
        //el archivo zip y el nombre de la carpeta, este metodo nos devolverá el
        //nuevo estado del zip.
        $zipFinal = $this->fills($id, $zip, $nombre);
        //Cerramos el zip.
        $zipFinal->close();
        //Miramos cuanto pesa el zip.
        $size = filesize($nombre . ".zip");
        //Creamos la cabezera para poder descargarlo.
        header("Content-Transfer-Encoding: binary");
        header("Content-type: application/force-download");
        header("Content-Disposition: attachment; filename=" . $nombre . ".zip");
        header("Content-Length: $size");
        readfile($nombre . ".zip");

        unlink($nombre . ".zip"); //Destruye el archivo temporal

        $CarpetaPare = Carpeta::where('idCarpeta', '=', $id)->get();
    }

    public static function fills($id, $zip, $nombre) {
        //Recogemos de la base de datos las carpetas y archivos que recibimos por parametro.
        $carpetes = Carpeta::where('idCarpetaPare', '=', $id)->get();
        $arxius = Document::where('idCarpeta', '=', $id)->get();

        //Por cada carpeta encontrada en la base de datos.
        foreach ($carpetes as $key => $carpeta) {
            //Creamos una varaible para poder indexar una carpeta dentro de otra
            //la estructura quedaria como: carpeta1/carpeta2.
            $nombre2 = $nombre."/".$carpeta->nom;
            //Ahora creamos la carpeta con la variable anterior y se creará la estructura
            //de directorios correcta.
            $zip->addEmptyDir($nombre2);
            //Por cada archivo encontrado en la base de datos.
            foreach ($arxius as $key => $arxiu) {
                //Añadimos un nuevo archivo, con la ruta de nuestro storage y el
                //nombre que le queremos dar con la extensión del archivo.
                $zip->addFile(storage_path("app/".$arxiu->path),$nombre. "/" . $arxiu->nom.".".$arxiu->formatDocument);
            }
            //Volvemos a llamar de forma recursiva a esta función, hasta que deje 
            //de encontrar resultados en la base de datos y pase directamente por el return.
            CU_19Controller::fills($carpeta->idCarpeta, $zip, $nombre2);
        }
        //Nos devuelve el estado actual del zip.
        return $zip;
    }

}
