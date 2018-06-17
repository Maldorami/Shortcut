@extends('layouts.app')

@section('content')
<div class="container">

    <form class="forml-horizontal" method="post">
        {{ csrf_field() }}
        <fieldset>
            <legend>Página de inicio de sesión de Freelancers</legend>

            <div class="form-group">
              <label for="InputEmail">Email</label>
              <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Ingrese su email" name="email" value="{{old('email')}}">
          </div>

          <div class="form-group">
              <label for="InputPassword">Contraseña</label>
              <input type="password" class="form-control" id="InputPassword" placeholder="Contraseña" name="password">
          </div>

    @if(count($errors) > 0)
      @foreach($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
      @endforeach
    @endif

    @if(session('LogError'))
      <p class="alert alert-danger">{{ session('LogError') }}</p>
    @endif

    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
</fieldset>
</form>
</div>
@endsection