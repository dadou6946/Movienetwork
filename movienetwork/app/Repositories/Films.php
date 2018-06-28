<?php

namespace App\Repositories;

use App\Film;
// use App\Redis;

class Films

{
	
	public function all()
	{
		return Film::all();		
	}

	
}