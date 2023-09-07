@extends('layouts.ticketslayot')
@section('titulo-seccion','Tickets')
@section('contenido') 
  <div class="lista-tickets">
    <div class="ticket">
      <div class="ticket__body">
        <div class="ticket__logo"><img src="{{ asset('assets/client/img/ticket-list-logo.png') }}" alt=""></div>
        <div class="ticket__texts">
            <p class="ticket__titulo">Quiero restablecer mi contraseña de SENATI #2</p>
            <p class="ticket__fecha">Creado el Mie, 30 Ago a 4: 11 A.M a traves de Portal</p>
        </div>
      </div>
      <div class="ticket__estado-container">
        <p class="ticket__estado">Abierto</p>
      </div>
    </div>
  </div>
@endsection