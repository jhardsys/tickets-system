<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/client/style.css') }}">
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    {{-- Google fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <title>@yield('title')</title>
</head>
<body>
    <header class="header">
        <nav class="nav">
            {{-- <i class="uil uil-bars navOpenBtn"></i> --}}
            <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list navOpenBtn" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
            <a href="{{ url('app/client/tickets') }}" class="logo">SYSTICKETS</a>
            <ul class="nav-links">
              <i class="uil uil-times navCloseBtn"></i>
             
              <li><a href="{{ url('app/client/tickets') }}">Inicio</a></li>
              <li><a href="{{ url('app/client/tickets') }}" class="nav__link">Tickets</a></li>
              <li><a href="{{ url('app/client/tickets/create') }}" class="nav__link-enviar-ticket">Enviar un ticket</a></li>
            </ul>
           
           <div class="perfil" id="perfilContainer">
              <a class="perfil__a" href="{{ route('client.perfil.index') }}"><p>P</p></a>
          </div>
          </nav>
    </header>

    <main class="main">
        <div class="head">
            <div class="head__ticket">
             @yield('titulo-seccion')
            </div>
        </div>
        
        @yield('contenido')
    </main>
    
    <footer class="footer">
      <p class="footer__name">Software de Help Desk de Freshdesk</p>
      <b class="footer__privacy">Politica de privacidad</b>
    </footer>
    <script src="{{ asset('assets/client/script.js') }}"></script>
</body>
</html>