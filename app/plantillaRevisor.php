<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder; 


class plantillaRevisor extends Model

/**
 * Set the keys for a save update query.
 *
 * @param  \Illuminate\Database\Eloquent\Builder  $query
 * @return \Illuminate\Database\Eloquent\Builder
 */

{   
    protected $table = 'plantillarevisors';
    protected   $primaryKey = 'idPlantilla';
    //protected   $primaryKey = ['idPlantilla', 'idUsuariRevisor']; 
    public $timestamps = false;
    public $incrementing = false;
    
    /**
    protected function getKeyForSaveQuery()
{

    $primaryKeyForSaveQuery = array(count($this->primaryKey));

    foreach ($this->primaryKey as $i => $pKey) {
        $primaryKeyForSaveQuery[$i] = isset($this->original[$this->getKeyName()[$i]])
            ? $this->original[$this->getKeyName()[$i]]
            : $this->getAttribute($this->getKeyName()[$i]);
    }

    return $primaryKeyForSaveQuery;

}

/**
 * Set the keys for a save update query.
 *
 * @param  \Illuminate\Database\Eloquent\Builder  $query
 * @return \Illuminate\Database\Eloquent\Builder
 
protected function setKeysForSaveQuery(Builder $query)
{

    foreach ($this->primaryKey as $i => $pKey) {
        $query->where($this->getKeyName()[$i], '=', $this->getKeyForSaveQuery()[$i]);
    }

    return $query;
}

  */  
}
