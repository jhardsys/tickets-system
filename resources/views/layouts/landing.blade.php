<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>
        @yield('title')
    </title>
</head>

<body>
    <header class="header">

        <div class="header__logo">
            <picture class="header__picture">
                <img class="header__img" src="{{ asset('assets/img/logo-ticket.png') }}" alt="logo web">
            </picture>
            <p class="header__nombre">SYSTICKETS</p>
        </div>


        <nav class="header__nav">
            <ul class="header__ul">
                {{-- <li class="header__li"><a class="header__link" href="#">Inicio</a></li>
                <li class="header__li"><a class="header__link" href="#">Iniciar sesion</a></li> --}}
            </ul>
        </nav>
    </header>
    <main class="main">
        @yield('content')
    </main>
    <footer class="footer">
        <p class="footer__name">Software de Help Desk de Freshdesk</p>
        <b class="footer__privacy">Politica de privacidad</b>
    </footer>
</body>

</html>
