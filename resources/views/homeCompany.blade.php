@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Perfil</div>
                <div class="card-body">
                    <p><strong>Nombre de la Companía:</strong> {{$user['company_name']}}</p>
                    <p><strong>Email:</strong> {{$user['email']}}</p>
                    <p><strong>Avatar:</strong></p>
                    <div class="container">
                        <img src="{{$user['avatar']}}" style="width: 100%;
                        height: auto;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
