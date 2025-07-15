<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        

        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <!-- fontes do google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- Bootsrap CSS -->
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
                         <li class="nav-item">
                            <a href="/login" class="nav-link">Minhas Informações</a>
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
                            <a href="/" class="nav-link">Sobre</a>
                        </li>
                    </ul> 
                </div>   
            </nav>
        </header>    
        <!--yield é um espaço reservado para o conteúdo dinamino das outras páginas-->
        @yield('content')
        <footer>
            <p>Projeto de Inovação &copy; 2025</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    </body>
</html>