<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URL_Document extends Model
{
    protected $table = 'ulrdocument';
    protected $primaryKey = 'idURL';
    public $timestamps = false;
}
