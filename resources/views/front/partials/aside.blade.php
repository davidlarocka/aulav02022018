<div class="panel panel-primary">
	
		<div class="panel-heading">
			<h3 class="panel-title">Ctegorias</h3>
		</div>
		<div class="panel-body">

			<ul class="list-group">
				@foreach($articulos->categoria as $category)
					<li class="list-group-item">
						<span class="badge">{{ $category->nombre }}</span>
						
					</li>
					
				@endforeach
			</ul>
				
		</div>
</div>

