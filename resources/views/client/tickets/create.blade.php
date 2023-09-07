@extends('layouts.ticketslayot')
@section('titulo-seccion','Enviar un ticket')
@section('contenido') 
<form class="login">
  <div class="login__body">

      <div class="login__campo">
          <label class="login__label" for="correo">
              <span class="login__span">Asunto:</span>
              <input class="login__input" id="username" type="text" name="asunto" />
          </label>
      </div>

      <div class="login__campo">
          <label class="login__label" for="password">
              <span class="login__span">Descripcion:</span>
              <textarea class="form__descripcion" name="descripcion"></textarea>
          </label>
      </div>

      <input class="login__button" type="submit" value="Enviar" />

  </div>
</form>
@endsection