<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistema de tickets</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <!-- Style.css -->
    <link href="{{ asset('assets/admin/style.css') }}" rel="stylesheet" />
    <!-- Box icons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body x-data="{ modal: false }">
    <div class="sidebar">
        <a class="logo-details" href="{{ route('agent.tickets.index') }}">
            <i class="bx bxl-c-plus-plus"></i>
            <span class="logo_name">SYSTICKETS</span>
        </a>

        <ul class="nav-links">

            </li>
            <li>
                <div class="iocn-link">
                    <a href="{{ route('agent.tickets.index') }}">
                        <i class="bx bx-collection"></i>
                        <span class="link_name">Ticket</span>
                    </a>
                    <i class="bx bx-chevron-down arrow"></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="#" class="link_name">Ticket</a></li>
                    <li><a href="#">Crear ticket</a></li>
                    <li><a href="#">Listar todos los ticket</a></li>
                    <li><a href="#">Login form</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="{{ route('agent.clientes.index') }}">
                        <i class='bx bx-user-pin'></i>
                        <span class="link_name">Clientes</span>
                    </a>
                    <i class="bx bx-chevron-down arrow"></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="#" class="link_name">Clientes</a></li>
                    <li><a href="#">Crear cliente</a></li>
                    <li><a href="#">Actualizar cliente</a></li>
                </ul>
            </li>                     
            <li>
                <a href="{{route('agent.perfil.index')}}">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Profile</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a href="{{route('agent.perfil.index')}}" class="link_name">Profile</a></li>
                </ul>
            </li>            
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="{{ asset('assets/img/admin/profile-icon.avif') }}" alt="profile">
                    </div>
                    <div class="name-job">
                        <div class="profile_name">{{ session()->get('user_session')['first_name'] }}</div>
                    </div>
                    <form action="{{ route('logout.store') }}" method="POST">
                        @csrf
                        <button type="submit" style="color: transparent; background-color:transparent; border:none">
                            <i class='bx bx-log-out'></i>
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <header class="home-section">
        <div class="home-content bg-white">
            <i class='bx bx-menu'></i>
            <span class="text">Agente</span>
        </div>
    </header>
    <main class="main">
        @yield('content')
    </main>
    {{-- Alpine js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('script')
</body>

<script>
    let arrows = document.querySelectorAll(".arrow");
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    arrows.forEach(arrow => {
        arrow.addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement;
            arrowParent.classList.toggle("showMenu");
        });
    });

    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    })
</script>

</html>
