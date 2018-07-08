<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Film extends Model
{
    protected $guarded = ['film_id'];

	// protected $primaryKey = 'film_id';

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
    	// $this->comments()->create(compact('body'));
    	// Equivaut à la ligne suivante4
    	Comment::create([
            'body' => $body,
            'film_id' => $this->id,
            'user_id' => auth()->user()->id 
        ]);
    }

    public function uploadPicture()
    {
        $pictureName = $this->id . '.' . request()->file('picture')->getClientOriginalExtension();
        
        request()->file('picture')->move(
            base_path() . '/public/uploads/', $pictureName
        );
        
        $this->picture = $pictureName;
        $this->save();
    }

    public function scopeFilter($query, $filters)
    {
        if($filters)
        {
            // dd($filters);
            if($month = $filters['month'])
                $query->whereMonth('created_at', Carbon::parse($month)->month);
            if($year = $filters['year'])
                $query->whereYear('created_at', $year);
        }        
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    } 
}
