<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\URL_Document;
use App\Document;
use App\Http\Requests;
use Dompdf\Dompdf;

class CU_13Controller extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function generaPDF(Request $request, $id, $nombre, $path, $pathb, $formato) {
        //Agafem les dos path que ens arriven i les transformem en una sola ruta
        $ruta=$path.'/'.$pathb;
        //Fem que descarregui el arxiu que estobra en storage/app/ amb la ruta esmentada abans.
        
        if($formato == "pdf"){
            return response()->download(storage_path("app/{$ruta}"));
        }else if($formato == "odt"){
            $FilePath = "app/".$ruta;
            //echo $FilePath;
            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $document = $phpWord->loadTemplate(storage_path("app/{$ruta}"));
            $document->saveAs('temp.odt');
            
            $domPdfPath = base_path('/../vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
            
            $phpWord = \PhpOffice\PhpWord\IOFactory::load('temp.odt');
            $pdfWriter = \PhpOffice\PhpWord\IOFactory::createWriter( $phpWord, 'PDF' );
            $pdfWriter->save(storage_path("app/documents{$nombre}.pdf"));
            //echo $FilePath;
            return response()->download(storage_path("app/documents{$nombre}.pdf"));
        }else if($formato == "doc"){
            $FilePath = "app/".$ruta;
            //echo $FilePath;
            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $document = $phpWord->loadTemplate(storage_path("app/{$ruta}"));
            $document->saveAs('temp.odt');
            
            $domPdfPath = base_path('/../vendor/dompdf/dompdf');
            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');
            
            $phpWord = \PhpOffice\PhpWord\IOFactory::load('temp.doc');
            $pdfWriter = \PhpOffice\PhpWord\IOFactory::createWriter( $phpWord, 'PDF' );
            $pdfWriter->save(storage_path("app/documents{$nombre}.pdf"));
            //echo $FilePath;
            return response()->download(storage_path("app/documents{$nombre}.pdf"));
        }
        
    }
}
