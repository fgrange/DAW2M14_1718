<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    protected $table = 'grups';
    protected $primaryKey = 'idGrup';
    public $timestamps = false;
}
