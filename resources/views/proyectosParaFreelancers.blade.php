@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			@if(count($proyects) > 0)
				@foreach($proyects as $proyect)
				<div class="card mt-5">
					<div class="card-header">{{ App\Company::find($proyect['company_id'])->company_name }}</div>
					<div class="card-body">
					<p><strong>ID:</strong> {{ $proyect['id'] }}</p>
					<p><strong>Título:</strong> {{$proyect['title']}} </p>
					<p><strong>Descripción:</strong> {{ $proyect['description'] }}</p>
					<p><strong>Tamaño del equipo:</strong> {{ count($freelancers[$proyect['id']]) }}/{{$proyect['team_size']}}</p>

					<form method="post">
						{{csrf_field()}}
						<input type="hidden" name="proyect_id" value="{{ $proyect['id'] }}">
						<input type="hidden" name="freelancer_id" value="{{ Auth::guard('freelancer')->user()->id }}">
						<button type="submit" class="btn btn-primary">Unirse</button>
					</form>
					</div>

				</div>
				@endforeach

				@else
				<div class="card mt-5">
					<div class="card-body text-center">
						<h2>Aún no se han creado proyectos.</h2>
					</div> 
				</div>
				@endif

	</div>
</div>
@endsection