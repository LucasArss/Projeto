@extends('layouts.main')

@section('title', 'Sobre')

@section('content')

<main class="container mt-4">
    <div id="sobre-container">

        <div class="sobre-header">
            <img src="/img/IFBA_Logo.png" alt="Logo do IFBA" class="logo-sobre">
            <h1>Sobre o Projeto AcheComércio</h1>
            <img src="/img/IFBA_Logo.png" alt="Logo do IFBA" class="logo-sobre">
        </div>

        <p>
            Este projeto foi desenvolvido pelo estudante <strong>Lucas Arouca Santos</strong> para a disciplina 
            <em>Projeto de Inovação</em>, ministrada pelo professor <strong>Bruno de Jesus Santos</strong> no Instituto 
            Federal da Bahia (IFBA), campus Valença.
        </p>

        <p>
            O <strong>AcheComércio</strong> é um sistema criado para ajudar a <strong>aproximar os ambulantes, pequenos comerciantes e clientes da cidade de Valença</strong>.  
            Muitas vezes não sabemos <em>quem vende determinado produto</em> ou <em>em que bairro encontrar</em>. O sistema vem para resolver isso.
        </p>

        <h2>Como funciona?</h2>
        <p>
            - <strong>Comerciantes e ambulantes</strong> podem se cadastrar, informando:
            <ul>
                <li>Produtos que vendem (como alimentos, roupas, brinquedos, eletrônicos, utilidades, etc.);</li>
                <li>Horários de funcionamento;</li>
                <li>Formas de pagamento aceitas (dinheiro, cartão, Pix, etc.);</li>
                <li>Local de trabalho (bairro, rua, número e telefone de contato).</li>
            </ul>
        </p>

        <p>
            - <strong>Clientes</strong> podem navegar pelo sistema para descobrir os comerciantes próximos, 
            visualizar informações detalhadas e até <em>curtir ou descurtir</em> cada comerciante, ajudando a destacar os mais bem avaliados.
        </p>

        <h2>Por que usar?</h2>
        <p>
            O AcheComércio foi pensado para:
            <ul>
                <li>Facilitar o contato entre comerciantes e clientes locais;</li>
                <li>Valorizar e dar mais visibilidade aos ambulantes da cidade;</li>
                <li>Oferecer aos moradores de Valença uma forma rápida de encontrar o que precisam sem depender apenas do boca a boca;</li>
                <li>Fortalecer o comércio local.</li>
            </ul>
        </p>

        <p>
            Em resumo, o <strong>AcheComércio</strong> é uma plataforma simples e inovadora para conectar pessoas e fortalecer o comércio da nossa comunidade.
        </p>

    </div>
</main>

@endsection
