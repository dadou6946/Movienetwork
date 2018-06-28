<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
	protected $guarded = ['id'];

    public function film()
    {
    	return $this->belongsTo(Film::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
