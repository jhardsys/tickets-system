@extends('layouts.profilelayout')
@section('titulo-seccion','Profile')
@section('content') 
  <div class="profile__page">
    <div class="profile__container">
      <div class="profile_grid">
        <div>
          <label for="first_surname">Nombre :</label>
          <input type="text" placeholder={{ $usuario->get('user')->first_name }}  name="first_surname" required disabled>
        </div>
        <div>
          <label for="first_surname">Primer Apellido:</label>
          <input type="text" placeholder={{ $usuario->get('user')->first_surname }} name="first_surname" required disabled>
        </div>
      </div>
       <div class="profile_grid">
        <div>
            <label for="second_surname">Segundo Apellido:</label>
            <input type="text" placeholder={{$usuario->get('user')->second_surname}}  name="second_surname" required disabled>
        </div>
          <div>
            <label for="phone">Teléfono:</label>
            <input type="tel" placeholder={{$usuario->get('user')->phone}}  name="phone" required disabled>
        </div>
      </div>
      <div>
          <label for="email">Correo Electrónico:</label>
          <input type="email" placeholder={{$usuario->get('user')->email}} name="email" required disabled>
      </div>
      <div>
          <label for="password">Contraseña:</label>
          <input type="password" placeholder="**********"  name="password" required disabled>
      </div>
      <div class="profile__btns">
          <button type="submit">Editar</button>
          <a class="a" href="{{ url('app/client/tickets') }}"><button>Volver</button></a>
      </div>
    </div>
  </div>        
@endsection