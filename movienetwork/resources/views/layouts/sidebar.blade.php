  
<div class="sidebar-module">
	<h4 class="title-sidebar" style="font-weight: 300;">Historique des films postés</h4>
	
	<ol class="list-unstyled">
		
		@foreach($archives as $stats)
			<li>
				<a href="/?month={{ $stats['month'] }}&year={{ $stats['year']}}">{{ $stats['month'] . ' ' . $stats['year'] }}</a>
			</li>	
		@endforeach
		
	</ol>
</div>


<div class="sidebar-module">
	<h4 class="title-sidebar" style="font-weight: 300;">Catégories</h4>
	
	<ol class="list-unstyled">
		
		@foreach($tags as $tag)
			<li>
				<a href="/films/tags/{{ $tag }}">
					<button class="tag-button btn btn-default" style="margin: 3px;">{{ $tag }}</button>
				</a>
			</li>	
		@endforeach
		
	</ol>
</div>
