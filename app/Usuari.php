<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuari extends Model
{
    protected $table = 'usuaris';
    protected $primaryKey = 'idUsuari';
    public $timestamps = false;
}
