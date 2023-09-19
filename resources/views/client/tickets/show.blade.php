@extends('layouts.ticketslayot')
@section('titulo-seccion', 'Tickets')
@section('contenido')
    <h1>Vista Detalles</h1>
    <div class="header_detail">
        <div class="search_ticket">
            <span>Buscar Ticket: </span>
            <input type="text" name="search" id="search" placeholder="Nombre Ticket">
        </div>
    </div>
    <div class="ticket__container">
        <div class="container" style="width: 100%">
            <div style="width: 100%">

                <h1 style="text-align: center">{{ $ticket->subject }}</h1>
            </div>

            <div style="width: 100%">
                <label for="">ID</label>
            </div>
            <div>

                <span style="display: block ;border: 1px solid; border-radius: 7px; background: gray ; width: 100%"
                    class="box">a</span>
            </div>
            <div>

                <label for="">Prioridad</label>
            </div>
            <div>

                <span style="display: block ;border: 1px solid; border-radius: 7px; background: gray ; width: 100%"
                    class="box">{{ $ticket->priority }}</span>
            </div>
            <div>

                <label for="">Estado</label>
            </div>
            <div>

                <span style="display: block ;border: 1px solid; border-radius: 7px; background: gray ; width: 100%"
                    class="box">{{ $ticket->status }}</span>
            </div>
            <div>

                <label for="">Descripción</label>
            </div>
            <div>


                @foreach ($comments as $comment)
                    <p
                        style="display: block ;border: 1px solid; border-radius: 7px; background: gray ; width: 100% ;width: 100%; height: 40px;">
                        {{ $comment->body }}</p>
                @endforeach
            </div>
            <div>

                <label for="">Nombre del Cliente</label>
            </div>
            <div>

                <span style="display: block ;border: 1px solid; border-radius: 7px; background: gray ; width: 100%"
                    class="box">{{ $name }}
                    {{ $apellido_pa }} {{ $apellido_ma }}</span>
            </div>
        </div>
    </div>
@endsection
