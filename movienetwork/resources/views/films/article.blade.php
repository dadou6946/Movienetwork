<div class="blog-post row">

	<div class="col-sm-9">
	
		<h2 class="blog-post-title title-article" style="font-weight: 300;">
			<a href="/films/{{ $film->id }}">{{ $film->title }}</a>
		</h2>

		<p class="blog-post-meta">Ajouté par {{ $film->user->name }}</p>

		<p class="blog-post-meta">{{ $film->created_at->toFormattedDateString() }}</p>
		
		<p>{{ $film->description }}</p>
		
	</div>

	<div class="col-sm-3">
		<center>
			<a href="/films/{{ $film->id }}">
				<img class="photo-liste img-fluid img-thumbnail" src="/uploads/{{ $film->picture }}" alt="{{ $film->title }}" style="height: 220px;">
			</a>
		</center>
	</div>

</div>

<hr>
<br>