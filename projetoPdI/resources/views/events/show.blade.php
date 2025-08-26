@extends('layouts.main')

@section('title', $user->nome)

@section('content')


    <div class="col-md-10 offset-md-1">
        <h1>Detalhes do Comerciante</h1>
        <div class="row">
            <div id="image-container" class="col-md-6">
            <img src="{{ asset('img/users/' . $user->image) }}" alt="{{ $user->name }}" class="img-fluid">
            <div class="like-count mt-3">
                <span>👍 {{ $user->receivedLikes->where('liked', 1)->count() }}</span>
                <span>👎 {{ $user->receivedLikes->where('liked', 0)->count() }}</span>
            </div>
        </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $user->name }}</h1>
                <p class="user-bairro"><ion-icon name="location-outline"></ion-icon> Bairro: {{ $user->bairro }}</p>
                <p class="user-rua"><ion-icon name="location-outline"></ion-icon> Endereço: {{ $user->rua }}</p>
                <p class="user-forma_pagamento"><ion-icon name="cash-outline"></ion-icon> Forma de Pagamento: {{ $user->forma_pagamento }}</p>
                <p class="user-horario_funcionamento"><ion-icon name="time-outline"></ion-icon> {{ $user->horario_funcionamento }}</p>
                <p class="user-contato"><ion-icon name="call-outline"></ion-icon> {{ $user->contato }}</p>
                <p class="user-produto"><ion-icon name="pricetag-outline"></ion-icon> Principal Produto: {{ $user->produto }}</p>
                <p class="user-produtos_oferecidos"><ion-icon name="pricetag-outline"></ion-icon> Outros produtos vendidos: {{ $user->produtos_oferecidos }}</p>
</div>
</div>
@endsection