@extends('layouts.app')

@section('content')
<div class="container">

    <form class="forml-horizontal" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset>
            <legend>Página de registro de Freelancers</legend>

            <div class="form-group">
              <label for="InputEmail">Email</label>
              <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Ingrese su email" name="email" value="{{old('email')}}">
          </div>

          <div class="form-group">
              <label for="InputFirstName">Nombre</label>
              <input type="text" class="form-control" id="InputFirstName" placeholder="Ingrese su nombre" name="first_name" value="{{old('first_name')}}">
          </div>

          <div class="form-group">
              <label for="InputLastName">Apellido</label>
              <input type="text" class="form-control" id="InputLastName" placeholder="Ingrese su apellido" name="last_name" value="{{old('last_name')}}">
          </div>

          <div class="form-group">
              <label for="InputPassword">Contraseña</label>
              <input type="password" class="form-control" id="InputPassword" placeholder="Contraseña" name="password">
          </div>
          <div class="form-group">
              <label for="exampleInputPassword1">Confirmar contraseña</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirmar contraseña" name="password_confirmation">
          </div>


          <div class="form-group">
              <label for="InputGenre">Género:</label>
              <select class="form-control" id="InputGenre" name="genre">
                <option value="female">Femenino</option>
                <option value="male">Masculino</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group">
          <label for="InputBirthdate">Fecha de nacimiento</label>
          <input type="date" class="form-control" id="InputBirthdate" name="birthdate" min="1900-03-25" max="2018-05-25" step="1">
      </div>


      <div class="form-group">
        <label for="InputFile">Avatar</label>
        <input type="file" class="form-control-file" id="InputFile" aria-describedby="fileHelp" name="avatar">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
    </div>


    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @endif

    <button type="submit" class="btn btn-primary" value="Upload">Registrarse</button>
</fieldset>
</form>
</div>
@endsection