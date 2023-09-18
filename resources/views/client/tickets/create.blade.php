@extends('layouts.ticketslayot')
@section('titulo-seccion','Enviar un ticket')
@section('contenido') 
<form class="login" method="post" action="{{url('app/client/tickets')}}">
  @csrf
  <div class="loginbody">

      <div class="logincampo">
          <label class="loginlabel" for="correo">
              <span class="loginspan">Asunto:</span>
              <input class="logininput" id="username" type="text" name="asunto" />
          </label>
      </div>

      <div class="logincampo">
          <label class="loginlabel" for="password">
              <span class="loginspan">Descripcion:</span>
              <textarea class="formdescripcion" name="descripcion"></textarea>
          </label>
      </div>

      <input class="loginbutton" type="submit" value="Enviar" />

  </div>
</form>
@endsection