@extends('layouts.ticketslayot')
@section('titulo-seccion', 'Tickets')
@section('contenido')
    <form action="" method="get" style="margin: 0.25cm; width: 50%">
        <label for="tickets-search-term" class="login__label">
            <input class="login__input" type="search" name="tickets-search-term" id="tickets-search-term"
                placeholder="Buscar ticket">
        </label>
    </form>
    <div class="ticket__container">
        @foreach ($tickets as $ticket)
            <div class="ticket">
                <div class="ticket__body">
                    <div class="ticket__logo"><img src="{{ asset('assets/client/img/logo-ticket.png') }}" alt="">
                    </div>
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
    </div>
@endsection
