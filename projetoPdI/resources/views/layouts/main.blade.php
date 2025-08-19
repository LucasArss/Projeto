<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        

        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <!-- fontes do google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">


    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="collapse navbar-collapse" id="navbar">
                        <a href="/" class="navbar-brand">
                        <img src="/img/pngwing.png" alt="Logo" class="logo-navbar">
                        </a>
                        <ul class="navbar-nav">
                        @auth
                    @php
                        $user = Auth::user();
                        $dadosCompletos = $user->bairro 
                            && $user->rua 
                            && $user->forma_pagamento 
                            && $user->contato 
                            && $user->produtos_oferecidos 
                            && $user->horario_funcionamento;
                    @endphp

                    @unless($dadosCompletos)
                        <li class="nav-item">
                            <a href="/events/create" class="nav-link blink">Cadastre Suas Informações</a>
                        </li>
                    @endunless
                         <li class="nav-item">
                            <a href="/events/{{$user->id}}/info" class="nav-link">Minhas Informações</a>
                         </li>
                         <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">Sair</a>
                        </form>
                        </li>
                            @endauth
                         
                         @guest   
                         <li class="nav-item">
                            <a href="/login" class="nav-link">Entrar</a>
                         </li>
                         <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastrar</a>
                        </li>
                        @endguest
                         <li class="nav-item">
                            <a href="{{ route('sobre') }}" class="nav-link">Sobre</a>
                        </li>
                    </ul> 
                </div>   
            </nav>
        </header>
        
        <main>

            <div class="container-fluid">
                <div class="row">
                    @if(session('sucess'))
                        <p class="msg">{{ session('sucess') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>

        </main>
        
        <!--yield é um espaço reservado para o conteúdo dinamino das outras páginas-->
        <footer>
            <p>Projeto de Inovação &copy; 2025</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

        @yield('scripts')
    </body>
</html>