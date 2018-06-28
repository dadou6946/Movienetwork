<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Film;
use App\Repositories\Films;

class FilmController extends Controller
{
	public function __construct()
	{
		
        $this->middleware('auth')->except(['index', 'show']);
	}

    public function index(Films $films)
    {
        $films = Film::latest()
            ->filter(request(['month', 'year']))
            ->get();
     	
    	return view('films.index', compact('films', 'archives'));
    }

    public function create()
    {
    	
        return view('films.create');
    }

    public function store()
    {
        $this->validate(request(), 
            [
                'title' => 'required|min:1',
                'description' => 'required',
                'picture' => 'required|image'
            ]);
        
        $film = auth()->user()->publish(
            new Film(request(['title', 'description', 'picture']))  
        );

        $film->uploadPicture();

        session()->flash('message', 'Votre film a été publié !');

    	return redirect('/');
    }

    public function show($id)
    {
    	
        $film = Film::find($id);
        $suggests = array();
        foreach ($film->tags as $value)
            $suggests[$value->name] = $value->films;

    	return view('films.show', compact('film','suggests'));
    }
}
