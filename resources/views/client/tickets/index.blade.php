@extends('layouts.ticketslayot')
@section('titulo-seccion', 'Tickets')
@section('contenido')
    <form action="" method="get" style="margin: 0.25cm; width: 50%">
        <label for="search" class="login__label">
            <input class="login__input" type="search" name="search" id="search" value="{{ $request->search }}" placeholder="Buscar ticket">
        </label>
    </form>
    <div class="ticket__container">
        @forelse ($tickets as $ticket)
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
        @empty
            <div class="ticket">
                <div class="ticket__body">
                    <div class="ticket__texts">
                        <a href="{{ route('client.tickets.index') }}" class="ticket__titulo">No hay tickets</a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@endsection
