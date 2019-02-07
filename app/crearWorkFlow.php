<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crearWorkFlow extends Model
{
    protected $table = 'Workflows';
    protected $primaryKey = 'idWorkflow';
    public $timestamps = false;
    
}
