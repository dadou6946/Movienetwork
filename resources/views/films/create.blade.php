@extends('layouts.master')

@section('content')
	<div class="col-sm-9">
		<h1>Ajouter un film</h1>
		<hr>
		{{ Form::open(array(
			'url' => url('films'),
			'method' => 'Post',
			'files' => true
			)) }}
		{{-- <form method="POST" action="{{ url('films') }}" files="true"> --}}
			
			@csrf

		  	<div class="form-group">
			    <label for="title">Titre :</label>
			    <input type="text" class="form-control" id="title" name="title">
		  	</div>

		  	<div class="form-group">
			    <label for="description">Description :</label>
			    <textarea class="form-control" id="description" name="description"></textarea>
		 	</div>
		  
			<div class="form-group">
			    <label for="picture">Photo :</label><br>
			    <input type="file" id="picture" name="picture">
			</div>

  			 <div class="form-group">
		  		<button type="submit" class="btn btn-primary">Publier</button>
		  	</div>

		{{ Form::close() }}
		{{-- </form> --}}

		@include('layouts.errors')
	</div>

@endsection