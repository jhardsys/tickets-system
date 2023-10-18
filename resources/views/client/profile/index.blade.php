@extends('layouts.profilelayout')
@section('titulo-seccion','Profile')
@section('content') 
  <div class="profile__box">
    <div class="inputs">
      <div>
        <label class="profile__box__label" for="first_name">Nombre :</label>
        <input class="profile__box__input" type="text" id="first_name" placeholder="{{ $data['first_name'] }}"  name="first_name" required disabled>
      </div>
      <div>
        <label class="profile__box__label" for="first_surname">Primer Apellido:</label>
        <input class="profile__box__input" type="text" id="first_surname" placeholder="{{ $data['first_surname'] }}" name="first_surname" required disabled>
      </div>
      <div>
        <label class="profile__box__label" for="second_surname">Segundo Apellido:</label>
        <input class="profile__box__input" type="text" id="second_surname" placeholder=" {{ $data['second_surname'] }}" name="second_surname" required disabled>
      </div>
      <div>
        <label class="profile__box__label" for="phone">Teléfono:</label>
        <input class="profile__box__input" type="tel" id="phone" placeholder="{{ $data['phone'] }}"  name="phone" required disabled>
      </div>
      <div>
          <label class="profile__box__label" for="email">Correo Electrónico:</label>
          <input class="profile__box__input" type="email" id="email" placeholder="{{ $data['email'] }}" name="email" required disabled>
      </div>
      <div>
          <label class="profile__box__label" for="password">Contraseña:</label>
          <input class="profile__box__input" type="text" id="password" value="*********"  name="password" required disabled>
      </div>

      <div class="profile__box__buttons">
          <a class="" href="{{ url('app/client/tickets') }}"><button class="profile__box__button">Volver</button></a>
          <a class="" href="{{ route('client.perfil.edit', ['perfil' => $data['id']]) }}"><button class="profile__box__button__edit">Editar</button></a>
      </div>
    </div>
    
  </div>        

@endsection
