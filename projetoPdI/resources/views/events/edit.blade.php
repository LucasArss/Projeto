@extends('layouts.main')

@section('title', 'Editar Usuario')

@section('content')



<main>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Confira os campos vazios:</strong>
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Edite seus Dados</h1>

        <form action="{{ route('events.update', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" value="{{ $user->cpf }}" oninput="mascaraCPF(this)" required>
            </div>

            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" value="{{ $user->email }}">
            </div>

            <div class="form-group">
                <label for="image">Foto de Perfil</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <img src="{{ asset('img/users/' . $user->image) }}" alt="{{ $user->name }}" class="img-preview mt-2" style="max-width: 200px;">
            </div>

            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o nome do bairro" value="{{ $user->bairro }}">
            </div>  

            <div class="form-group">
                <label for="rua">Rua:</label>
                <input type="text" class="form-control" id="rua" name="rua" placeholder="Digite o nome da rua" value="{{ $user->rua }}">
            </div>
            
            <div class="form-group">
                <label for="forma_pagamento">Forma de Pagamento:</label>
                <select id="forma_pagamento" name="forma_pagamento" class="form-control">
                    <option value="Dinheiro" {{ $user->forma_pagamento == 'Dinheiro' ? 'selected' : '' }}>Somente Dinheiro</option>
                    <option value="Cartão" {{ $user->forma_pagamento == 'Cartão' ? 'selected' : '' }}>Somente Cartão</option>
                    <option value="Pix" {{ $user->forma_pagamento == 'Pix' ? 'selected' : '' }}>Pix</option>
                    <option value="Dinheiro & cartão" {{ $user->forma_pagamento == 'Dinheiro & cartão' ? 'selected' : '' }}>Dinheiro e Cartão</option>
                    <option value="Dinheiro & Pix" {{ $user->forma_pagamento == 'Dinheiro & Pix' ? 'selected' : '' }}>Dinheiro e Pix</option>
                    <option value="Cartão & Pix" {{ $user->forma_pagamento == 'Cartão & Pix' ? 'selected' : '' }}>Cartão e Pix</option>
                    <option value="Qualquer Forma de Pagamento" {{ $user->forma_pagamento == 'Qualquer Forma de Pagamento' ? 'selected' : '' }}>Tudo</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="h_funcionamento">Horário de Funcionamento:</label>
                <input type="text" class="form-control" id="h_funcionamento" name="h_funcionamento" placeholder="Digite o horário de funcionamento" value="{{ $user->horario_funcionamento }}">
            </div>
            
            <div class="form-group">
                <label for="contato">Contato:</label>
                <input type="tel" class="form-control" id="contato" name="contato" placeholder="Digite o número de contato" value="{{ $user->contato }}">
            </div>
            
            <div class="form-group">
                <label for="produto">Produto Principal:</label>
                <select id="produto" name="produto" class="form-control" required>
                    <option value="">-- Selecione um produto --</option>
                    <option value="Eletronicos" {{ $user->produto == 'Eletronicos' ? 'selected' : '' }}>Eletrônicos</option>
                    <option value="Alimentos" {{ $user->produto == 'Alimentos' ? 'selected' : '' }}>Alimentos</option>
                    <option value="Brinquedos" {{ $user->produto == 'Brinquedos' ? 'selected' : '' }}>Brinquedos</option>
                    <option value="Roupas" {{ $user->produto == 'Roupas' ? 'selected' : '' }}>Roupas</option>
                    <option value="Utilidades" {{ $user->produto == 'Utilidades' ? 'selected' : '' }}>Utilidades</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="p_oferecido">Produtos Oferecidos:</label>
                <textarea class="form-control" id="p_oferecido" name="p_oferecido" placeholder="Descreva os produtos oferecidos">{{ $user->produtos_oferecidos }}</textarea>    
            </div>

            <input type="submit" class="btn btn-primary" value="Salvar Informações">
        </form>
    </div>
</main>

<!-- JQuery e JQuery Mask -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
$(document).ready(function(){
    $('#contato').mask('(00) 0000-00009');

    $('#contato').on('blur', function() {
        var last = $(this).val().substr($(this).val().length - 1);
        if(last.match(/[0-9]/)) {
            $(this).mask('(00) 00000-0000');
        } else {
            $(this).mask('(00) 0000-0000');
        }
    });
});
$(document).ready(function() {
    $('#h_funcionamento').mask('00:00 - 00:00', {placeholder: "HH:MM - HH:MM"});
});

$(document).ready(function() {
    $('#cpf').mask('000.000.000-00', {reverse: true});
});
</script>

@endsection
