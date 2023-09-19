@extends('layouts.profilelayout')
@section('titulo-seccion','Editar Perfil')
@section('content') 
  <div class="profile__box">
    <form class="profile__container" method="POST" action="{{ route('client.perfil.update', ['perfil' =>$data['id']])}}">
      @csrf
      @method('PUT')
      <div class="inputs">
        <div>
          <label class="profile__box__label" for="first_name">Nombre :</label>
          <input class="profile__box__input" type="text" id="first_name" value="{{ $data['first_name']}}"  name="first_name" required >
        </div>
        <div>
          <label class="profile__box__label" for="first_surname">Primer Apellido:</label>
          <input class="profile__box__input" type="text" id="first_surname" value="{{ $data['first_surname']}}" name="first_surname" required >
        </div>
        <div>
            <label class="profile__box__label" for="second_surname">Segundo Apellido:</label>
            <input class="profile__box__input" type="text" id="second_surname" value="{{ $data['second_surname']}}"  name="second_surname" required >
        </div>
        <div>
            <label class="profile__box__label" for="phone">Teléfono:</label>
            <input class="profile__box__input" type="tel" id="phone" value="{{ $data['phone']}}"  name="phone" required >
        </div>
        <div>
            <label class="profile__box__label" for="email">Correo Electrónico:</label>
            <input class="profile__box__input" type="email" id="email" value="{{ $data['email']}}" name="email" required >
        </div>
        <button class="profile__box__button__savet" type="submit">Guardar</button>
      </div>
     </form>
  </div>        

@endsection
