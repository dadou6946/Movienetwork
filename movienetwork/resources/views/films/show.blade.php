@extends('layouts.master')

@section('content')
	<div class="col-sm-10 blog-main">
		<div class="row">
			<div class="col-sm-8">

				<h2 class="title-article" style="font-weight: 300;">{{ $film->title }}</h2>

				<p>{{ $film->description }}</p>
				
				@if(count($film->tags))
					@foreach($film->tags as $tag)
						<button class="btn btn-default"><a href="/films/tags/{{ $tag->name }}">{{ $tag->name }}</a></button>
					@endforeach
				@endif

				<hr>

				<div class="comments">
					<ul class="list-group">
						@foreach($film->comments as $comment)

							<li class="list-group-item">
								<strong>{{ $comment->created_at->diffForHumans() }}</strong> : 
								{{  $comment->body }}
							</li>
							
						@endforeach
						
					</ul>	
				</div>
				
				<hr>

				<div class="card">
					<div class="card-block">
						
						<form method="POST" action="{{ route('film_comments', ['film' => $film->id]) }}">
							@csrf
							<div class="form-group">
								<textarea @if(!Auth::check()) disabled @endif
									class="form-control" name="body" placeholder="Ajouter un commentaire" required></textarea>
							</div>

				  			 <div class="form-group">
						  		<button  @if(!Auth::check()) disabled @endif
						  			type="submit" class="btn btn-primary">Commenter</button>
						  	</div>

						</form>
						
						@include('layouts.errors')

					</div>
				</div>

			</div>
			<div class="col-sm-4">
				<center>
					<img class="photo-detail img-fluid img-thumbnail" src="/uploads/{{ $film->picture }}" alt="{{ $film->title }}" >
				</center>
			</div>
		</div>
		
		<hr>
		
		@include('layouts.suggests')

	</div>

@endsection