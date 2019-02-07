<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class workflowRevisor extends Model
{
    protected $table = 'revisorworkflows';
    protected $primaryKey  = 'idWorkflow';
    //protected   $primaryKey = ['idPlantilla', 'idUsuariRevisor']; DONA ERROR
    public $timestamps = false;
    //public $incrementing = false;
    
}
