@extends('layouts.app')

@section('content')
<div class="container">

  <form id="CompanyRegister" class="form-horizontal" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <fieldset class="card">
      <div class="card-header">Página de registro para Companías</div>

      <div class="card-body">
        <div class="form-group">
          <label for="InputEmail">Email</label>
          <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Ingrese su email" name="email" value="{{old('email')}}">
        </div>

        <div class="form-group">
          <label for="InputFirstName">Nombre de la empresa</label>
          <input type="text" class="form-control" id="InputFirstName" placeholder="Ingrese su nombre" name="company_name" value="{{old('company_name')}}">
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
      </div>
    </fieldset>
  </form>
  <script src="js/CompanyRegisterValidation.js"></script>
</div>
@endsection
