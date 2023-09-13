<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <!-- Google fonts -->
    <link
      rel="preconnect"
      href="https://fonts.googleapis.com"
    />
    <link
      rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <!-- Style.css -->
    <link
      href="{{ asset('assets/admin/style.css') }}"
      rel="stylesheet"
    />
    <!-- Box icons -->
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Box icons</title>
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class="bx bxl-c-plus-plus"></i>
        <span class="logo_name">SYSTICKETS</span>
      </div>

      <ul class="nav-links">
        
        </li>
        <li>
          <div class="iocn-link">
            <a href="#">
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
              <a href="#">
                <i class='bx bx-book-alt' ></i>
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
            <a href="#">
                <i class='bx bx-pie-chart-alt' ></i>
              <span class="link_name">Analytics</span>
            </a>
            <ul class="sub-menu blank">
              <li><a href="#" class="link_name">Analytics</a></li>
            </ul>
          </li>
          <li>
            <a href="#">
                <i class='bx bx-line-chart'></i>
              <span class="link_name">Charts</span>
            </a>
            <ul class="sub-menu blank">
              <li><a href="#" class="link_name">Charts</a></li>
            </ul>
          </li>
          <li>
            <div class="iocn-link">
              <a href="#">
                <i class='bx bx-plug' ></i>
                <span class="link_name">Plugins</span>
              </a>
              <i class="bx bx-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
                <li><a href="#" class="link_name">Plugins</a></li>
                <li><a href="#">UI Face</a></li>
                <li><a href="#">Pigments</a></li>
                <li><a href="#">Box icons</a></li>
              </ul>
          </li>
          <li>
            <a href="#">
                <i class='bx bx-compass' ></i>
              <span class="link_name">Explore</span>
            </a>
            <ul class="sub-menu blank">
              <li><a href="#" class="link_name">Explore</a></li>
            </ul>
          </li>
          <li>
            <a href="#">
                <i class='bx bx-history' ></i>
              <span class="link_name">History</span>
            </a>
            <ul class="sub-menu blank">
              <li><a href="#" class="link_name">History</a></li>
            </ul>
          </li>
          <li>
            <a href="#">
                <i class='bx bx-cog' ></i>
              <span class="link_name">Setting</span>
            </a>
            <ul class="sub-menu blank">
              <li><a href="#" class="link_name">Setting</a></li>
            </ul>
          </li>
          <li>
          <div class="profile-details">
              <div class="profile-content">
                  <img src="{{ asset('assets/img/admin/profile-icon.avif') }}" alt="profile">
                </div>
                    <div class="name-job">
                        <div class="profile_name">Prem Shahi</div>
                        <div class="job">Web Designer</div>
                    </div>
                    <i class='bx bx-log-out' ></i>
                </div>
            </li>
        </ul>
    </div>
    <header class="home-section">
      <div class="home-content">
        <i class='bx bx-menu' ></i>
        <span class="text">Sistema de tickets</span>
      </div>
    </header>
    <main class="main">
      @yield('content')
    </main>
  </body>

  <script>
    let arrows = document.querySelectorAll(".arrow");
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    arrows.forEach(arrow => {
      arrow.addEventListener("click",(e) =>{
        let arrowParent = e.target.parentElement.parentElement;
        arrowParent.classList.toggle("showMenu");
      });
    });

    sidebarBtn.addEventListener("click",()=>{
      sidebar.classList.toggle("close");
    })
  </script>
</html>