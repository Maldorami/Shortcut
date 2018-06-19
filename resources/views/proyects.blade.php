@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			

			@if(count($proyects) > 0)
				@foreach($proyects as $proyect)
				<div class="card mt-5">
					<div class="card-header">{{$proyect['title']}}</div>
					<div class="card-body">
					<p><strong>ID:</strong> {{$proyect['id']}}</p>
					<p><strong>Owner ID:</strong> {{$proyect['company_id']}}</p>
					<p><strong>Descripción:</strong> {{$proyect['description']}}</p>
					<p><strong>Tamaño del equipo:</strong> {{$proyect['team_size']}}</p> 
					</div> 
				</div>
				@endforeach


				@else
				<div class="card mt-5">
					<div class="card-body text-center">
						<h2>Aún no ha creado proyectos.</h2>
					</div> 
				</div>
					
				@endif

	</div>
</div>
@endsection
