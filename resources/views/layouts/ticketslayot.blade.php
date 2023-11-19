<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

    {{-- Alpine js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>Box icons</title>
</head>

<body>
    <div class="sidebar">
        <a class="logo-details" href="{{ route('admin.tickets.index') }}">
            <i class="bx bxl-c-plus-plus"></i>
            <span class="logo_name">SYSTICKETS</span>
        </a>

        <ul class="nav-links">
            <li>
                <div class="iocn-link">
                    <a href="{{ route('client.tickets.index') }}">
                        <i class="bx bx-collection"></i>
                        <span class="link_name">Ticket</span>
                    </a>
                    <i class="bx bx-chevron-down arrow"></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="#" class="link_name">Ticket</a></li>
                    <li><a href="{{ url('app/client/tickets') }}">Listar tickets</a></li>
                    <li><a href="{{ url('app/client/tickets/create') }}">Crear nuevo ticket</a></li>

                </ul>
            </li>





            <li>
                <div class="profile-details">
                    <a href="{{ route('client.perfil.index') }}">

                        <div class="profile-content">
                            <img src="{{ asset('assets/img/admin/profile-icon.avif') }}" alt="profile">
                        </div>
                        <div class="name-job">
                            <div class="profile_name">
                                {{ session()->get('user_session')['first_name'] }}
                            </div>
                            {{-- <div class="job">Web Designer</div> --}}
                        </div>
                    </a>

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
            <span class="text">Sistema de tickets</span>
        </div>
    </header>
    <main class="main">
        @yield('content')
    </main>
    @stack('script')
</body>


@yield('scripts')

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
