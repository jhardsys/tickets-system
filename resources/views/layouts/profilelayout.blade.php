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
      href="{{ asset('assets/client/style.css') }}"
      rel="stylesheet"
    />
    <!-- Box icons -->
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <title>Profile</title>
  </head>
  <body>
    <header class="profile__layout">
          <h4>Perfil de {{ $data['first_name']}} {{ $data['first_surname']}}</h4>
    </header>
    <main >
      @yield('content')
    </main>
  </body>

</html>
