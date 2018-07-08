@extends('layouts.master')

@section('content')
	<div class="col-sm-10 blog-main">

		@foreach($films as $film)

			@include('films.article')
			

		@endforeach
	</div>

@endsection