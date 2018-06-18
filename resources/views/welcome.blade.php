@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background-image: url('{{URL::to('shortcut_imges/background.jpg')}}');" class="jumbotron">
        <strong><h1 class="display-1 text-center">Shortcut</h1></strong>
        <p class="lead text-center font-weight-bold">La plataforma donde los mejores freelancer e ideas se encuentran para dar vida a grandes proyectos.</p>
        <hr class="my-4">
        <p class="lead text-center">
            <a class="btn btn-primary btn-lg" href="{{route('faq')}}" role="button">Conocé más.</a>
        </p>
    </div>
</div>
@endsection