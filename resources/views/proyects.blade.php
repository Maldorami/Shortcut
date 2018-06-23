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
					<p><strong>Equipo:</strong></p>
					<ul>
					@if(count($proyect->freelancers) > 0)
						@foreach($proyect->freelancers as $freelancer)
							<li>{{$freelancer['first_name']}} {{$freelancer['last_name']}} - {{$freelancer['email']}}</li>
						@endforeach
					@else
						<small>El proyecto no tiene un equipo...</small>
					@endif
					</ul> 
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
