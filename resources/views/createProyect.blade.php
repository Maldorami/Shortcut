@extends('layouts.app')

@section('content')
<div class="container">

  <form class="forml-horizontal" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <fieldset class="card">
      <div class="card-header">Página de creación para Proyectos</div>

      <div class="card-body">
        <div class="form-group">
          <label for="company_id" class="col-form-label">ID Companía:</label>
          <input type="email" class="form-control" id="company_id" name="company_id" value="{{Auth::guard('company')->user()->id}}" readonly="">
        </div>

        <div class="form-group">
          <label for="title" class="col-form-label">Título:</label>
          <input type="text" class="form-control" id="title" placeholder="Ingrese un título" name="title" value="{{old('title')}}">
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Descripción:</label>
          <textarea class="form-control" id="description" placeholder="Ingrese una descripción" name="description" value="{{old('description')}}" rows="3"></textarea>
        </div>

        <div class="form-group">
          <label class="col-form-label" for="team_size">Tamaño del equipo:</label>
          <input type="text" class="form-control" placeholder="Ingrese el tamaño del equipo" id="team_size" name="team_size">
        </div>


        @if(count($errors) > 0)
          @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
          @endforeach
        @endif

        <button type="submit" class="btn btn-primary">Crear proyecto</button>
      </div>
    </fieldset>
  </form>
</div>
@endsection