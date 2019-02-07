<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermisUsuari extends Model
{
    protected $table = 'permisusuari';
    protected $primaryKey = 'idCarpeta';
    public $timestamps = false;
}
