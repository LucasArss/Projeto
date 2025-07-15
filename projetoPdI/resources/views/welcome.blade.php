@extends('layouts.main')

@section('title', 'Pagina Inicial')

@section('content')

<div id="search-container" class="col-md-12">
    <h1> Busque por um usuario</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procure">
</form>
</div>

<div id="users-container" class="col-md-12">
    <h2> Encontre seus comerciantes num só lugar </h2>
    <div id="cards-container" class="row">
        @if($users->count() > 0)
            @foreach($users as $user)
                <div class="card col-md-3">
                    <img src="{{ asset('img/pngwing.png') }}" alt="{{ $user->name }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->produto }}</p>
                        <a href="/Produto/{{ $user->id }}" class="btn btn-primary">Ver mais</a>
                </div>
            </div>
            @endforeach
        @else
            <p>Não há usuarios cadastrados!</p>
        @endif
    </div>
</div>

@endsection    

