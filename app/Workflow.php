<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    protected $table = 'workflows';
    protected $primaryKey = 'idWorkflow';
    public $timestamps = false;
    
    public function NotificacionWorkflow(){ // metodo que se consultará para saber si existen notificaciones.
     
        $notificaciones = array(); // declaro la variable como array
        
        // realizo una consulta con un JOIN para obtener los datos de ambas tablas
        $notificaciones = Workflow::join('revisorworkflows', function($join)
        {
            $join->on('revisorworkflows.idWorkflow', '=', 'workflows.idWorkflow')
                ->where('workflows.estat', '=', 'Nou') // miro que sea un estado nuevo
                ->where( function ( $query )  // para poder realizar una consulta con un OR hacemos esto que equivaldria a ( )
                {
                    $query->where('workflows.idUsuariAprovador', '=', 1) // SUPONEMOS QUE SOMOS EL ID 1
                         ->orWhere('revisorworkflows.idUsuariRevisor', '=', 1); // SUPONEMOS QUE SOMOS EL ID 1
                })
                ;
        
        })->get();
        
     // print_r($notificaciones);  //pintamos por pantalla el resultado pero aparece Illuminate\Database\Eloquent\Collection Object ( [items:protected] => Array ( ) )
        
       
    }
   
    
    
}

