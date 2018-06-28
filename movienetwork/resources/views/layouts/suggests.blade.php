<h2 class="title-article" style="font-weight: 300;">Recommandations</h2>

<div class="row">

		@if(count($film->tags))

			@foreach($suggests as $suggest => $value)

				<h5 class="suggest-phrase" style="margin:25px;font-weight: 300;">
					<img src="/images/play-button .png" alt=""> Autres films de la catégorie {{ $suggest }}
				</h5>
				
				<div class="row">

					@foreach($value as $v)
		
						@if($v->title != $film->title)
		
							<div class="col-sm-3">
								<a href="/films/{{ $v->id }}">
									<div class="suggest-title" style="height: 70px;">
										<h5 class="title-article">{{ $v->title }}</h5>
									</div>
									
									<img class="suggest img-fluid" src="/uploads/{{ $v->picture }}" alt="{{ $v->title }}">
								</a>
							</div>

						@endif
					
					@endforeach
					
				</div>	
			@endforeach
		
		@endif
</div>
