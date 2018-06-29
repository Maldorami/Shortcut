@extends('layouts.app')

<script src="js/FreelancerLogInValidation.js"></script>
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Página de inicio de sesión para Freelancers') }}</div>

        <div class="card-body">
          <form id="FreelancerLogin" class="forml-horizontal" method="post">
            @csrf

            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @endif

            @if(session('LogError'))
            <p class="alert alert-danger">{{ session('LogError') }}</p>
            @endif

            <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email') }}</label>

              <div class="col-md-6">
                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" autofocus>

                @if ($errors->has('email'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recuérdame') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Iniciar sesión') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection