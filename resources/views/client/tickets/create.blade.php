@extends('layouts.ticketslayot')
@section('titulo-seccion', 'Tickets')
@section('contenido')
    <div class="ticket__container">
        {{-- <div class="ticket">
      <div class="ticket__body">
        <div class="ticket__logo"><img src="{{ asset('assets/client/img/logo-ticket.png') }}" alt=""></div>
        <div class="ticket__texts">
            <p class="ticket__titulo">Quiero restablecer mi contraseña de SENATI #2</p>
            <p class="ticket__fecha">Creado el Mie, 30 Ago a 4: 11 A.M a traves de Portal</p>
        </div>
      </div>
      <div class="ticket__estado-container">
        <p class="ticket__estado">Abierto</p>
      </div>
    </div> --}}
        @foreach ($tickets as $ticket)
            <div class="ticket">
                <div class="ticket__body">
                    <div class="ticket__logo"><img src="{{ asset('assets/client/img/logo-ticket.png') }}" alt=""></div>
                    <div class="ticket__texts">
                        <a href="{{ url('app/client/tickets/' . $ticket->id) }}"
                            class="ticket__titulo">{{ $ticket->subject }}</a>
                        <p class="ticket__fecha">Creado el {{ $ticket->created_at }} a traves de Portal</p>
                    </div>
                </div>
                <div class="ticket__estado-container">
                    <p class="ticket__estado">{{ $ticket->status }}</p>
                </div>
            </div>
        @endforeach
        {{-- <div class="ticket">
      <div class="ticket__body">
        <div class="ticket__logo"><img src="{{ asset('assets/client/img/logo-ticket.png') }}" alt=""></div>
        <div class="ticket__texts">
            <p class="ticket__titulo">Quiero restablecer mi contraseña de SENATI #2</p>
            <p class="ticket__fecha">Creado el Mie, 30 Ago a 4: 11 A.M a traves de Portal</p>
        </div>
      </div>
      <div class="ticket__estado-container">
        <p class="ticket__estado">Abierto</p>
      </div>
    </div> --}}
    </div>
@endsection
