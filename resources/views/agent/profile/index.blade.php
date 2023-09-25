@extends('layouts.agentelayout')
@section('content')
<link href="{{ asset('assets/admin/style.css') }}" rel="stylesheet" />  
<main>
  <div class="profile__box">
    <div class="inputs">
        <div>
          <label class="profile__box__label" for="first_name">Nombre :</label>
          <input class="profile__box__input" type="text" id="first_name" value="{{ $data['first_name'] }}" name="first_name" required disabled>
        </div>
          <div>
            <label class="profile__box__label" for="first_surname">Primer Apellido:</label>
            <input class="profile__box__input" type="text" id="first_surname" value="{{ $data['first_surname']}}" name="first_surname" required disabled>
          </div>
          <div>
            <label class="profile__box__label" for="second_surname">Segundo Apellido:</label>
            <input class="profile__box__input" type="text" id="second_surname" value="{{ $data['second_surname']}} " name="second_surname" required disabled>
          </div>
          <div>
            <label class="profile__box__label" for="phone">Teléfono:</label>
            <input class="profile__box__input" type="tel" id="phone" name="phone" value="{{$data['phone']}}" required disabled>
          </div>
          <div>
              <label class="profile__box__label" for="email">Correo Electrónico:</label>
              <input class="profile__box__input" type="email" id="email" name="email" value="{{ $data['email'] }}" required disabled>
          </div>
          <div>
              <label class="profile__box__label" for="password">Contraseña:</label>
              <input class="profile__box__input" type="text" id="password" value="********"  name="password" required disabled>
          </div> 
          
          <div class="profile__box__buttons">
              {{-- <a class="" href="{{ url('app/client/tickets') }}"><button class="profile__box__button">Volver</button></a> --}}
              <a href="{{ route('agent.perfil.edit', $data['id'])}}"><button class="profile__box__button__edit">Editar</button></a>
          </div>
    </div>
  </div>        
</main>
@endsection