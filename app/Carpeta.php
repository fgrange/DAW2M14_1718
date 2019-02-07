<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carpeta extends Model
{
    protected $table = 'carpetes';
    protected $primaryKey = 'idCarpeta';
    public $timestamps = false;
}
