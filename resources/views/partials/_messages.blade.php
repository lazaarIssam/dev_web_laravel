@if (Session::has('success'))
	
	<div class="alert alert-success" role="alert">
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>

@endif
{{-- Il y a toujours 0 erreur d'objects à montrer sauf s'il y a une eurreur  --}}
@if (count($errors) > 0)

	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong>
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach  
		</ul>
	</div>

@endif