<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

    public function getRouteKeyName()
    {
    	return 'name';
    } 
}
