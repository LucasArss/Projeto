@extends('layouts.main')

@section('title', 'Cadastrar Evento')

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
        <h1>Adicione seus Dados</h1>

        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Foto de Perfil</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>

            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o nome do bairro">
            </div>  

            <div class="form-group">
                <label for="rua">Rua:</label>
                <input type="text" class="form-control" id="rua" name="rua" placeholder="Digite o nome da rua">
            </div>
            
            <div class="form-group">
                <label for="forma_pagamento">Forma de Pagamento:</label>
                <select id="forma_pagamento" name="forma_pagamento" class="form-control">
                    <option value="Dinheiro">Somente Dinheiro</option>
                    <option value="Cartão">Somente Cartão</option>
                    <option value="Pix">Pix</option>
                    <option value="Dinheiro & cartão">Dinheiro e Cartão</option>
                    <option value="Dinheiro & Pix">Dinheiro e Pix</option>
                    <option value="Cartão & Pix">Cartão e Pix</option>
                    <option value="Qualquer Forma de Pagamento">Tudo</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="h_funcionamento">Horário de Funcionamento:</label>
                <input type="text" class="form-control" id="h_funcionamento" name="h_funcionamento" placeholder="Digite o horário de funcionamento">
            </div>
            
            <div class="form-group">
                <label for="contato">Contato:</label>
                <input type="tel" class="form-control" id="contato" name="contato" placeholder="Digite o número de contato">
            </div>  
            
            <div class="form-group">
                <label for="p_oferecido">Produtos Oferecidos:</label>
                <textarea class="form-control" id="p_oferecido" name="p_oferecido" placeholder="Descreva os produtos oferecidos"></textarea>    
            </div>

            <input type="submit" class="btn btn-primary" value="Cadastrar Informações">
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
</script>

@endsection
