@extends('layouts.master')

@section('content')
	
	<div class="col-sm-10">
		<h3>Authentification</h3>

		<form method="POST" action="{{ url('/login') }}">
			@csrf
			
			<div class="form-group">
				<label for="email">Email :</label>
				<input type="email" id="email" name="email" class="form-control">
			</div>

			<div class="form-group">
				<label for="password">Mot de passe :</label>
				<input type="password" id="password" name="password" class="form-control">
			</div>
			
			<div class="form-group">
				<button class="btn btn-primary" type="submit">S'identifier</button>
			</div>

			@include('layouts.errors')
		</form>
	</div>

@endsection