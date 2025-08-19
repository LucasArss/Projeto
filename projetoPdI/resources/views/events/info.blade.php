@extends('layouts.main')

@section('title', $user->name)

@section('content')
<div class="col-md-10 offset-md-1">
    <h1>Minhas Informações</h1>
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="{{ asset('img/users/' . $user->image) }}" alt="{{ $user->name }}" class="img-fluid">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{ $user->name }}</h1>
            
            <p class="user-cpf">
                <ion-icon name="id-card-outline"></ion-icon> CPF: {{ preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $user->cpf) }}
            </p>

            <p class="user-email"><ion-icon name="mail-outline"></ion-icon> Email: {{ $user->email }}</p>
            <p class="user-bairro"><ion-icon name="location-outline"></ion-icon> Bairro: {{ $user->bairro }}</p>
            <p class="user-rua"><ion-icon name="location-outline"></ion-icon> Endereço: {{ $user->rua }}</p>
            <p class="user-forma_pagamento"><ion-icon name="cash-outline"></ion-icon> Forma de Pagamento: {{ $user->forma_pagamento }}</p>
            <p class="user-horario_funcionamento"><ion-icon name="time-outline"></ion-icon> {{ $user->horario_funcionamento }}</p>
            <p class="user-contato"><ion-icon name="call-outline"></ion-icon> {{ $user->contato }}</p>
            <p class="user-produto"><ion-icon name="pricetag-outline"></ion-icon> Principal Produto: {{ $user->produto }}</p>
            <p class="user-produtos_oferecidos"><ion-icon name="pricetag-outline"></ion-icon> Outros Produtos Vendidos: {{ $user->produtos_oferecidos }}</p>

            <!-- Botões Editar e Excluir -->
            <div class="mt-4 d-flex gap-3">
                <a href="{{ route('events.edit', $user->id) }}" class="btn btn-primary">Editar</a>

                <form action="{{ route('events.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir sua conta?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir Conta</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
