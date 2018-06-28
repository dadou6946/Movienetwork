<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Film $film)
    {
    	
    	$this->validate(request(), ['body' => 'required|min:2']);
    	//Add a comment tu a film
    	$film->addComment(request('body'));

    	return back();
    }
}
