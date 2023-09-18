@extends('layouts.ticketslayot')
@section('titulo-seccion','Tickets')
@section('contenido') 
    <h1>Vista Detalles</h1>
    <div class="header_detail">
    <div class="search_ticket">
        <span>Buscar Ticket: </span>
        <input type="text" name="search" id="search" placeholder="Nombre Ticket">
    </div>
    </div>
    <div class="ticket__container">
        <div class="container">
            <h1>{{$ticket->subject}}</h1>
            <label for="">ID</label>
            <span class="box">a</span>
            <label for="">Prioridad</label>
            <span class="box">{{$ticket->priority}}</span>
            <label for="">Estado</label>
            <span class="box">{{$ticket->status}}</span>
            <label for="">Descripción</label>
            @foreach ( $comments as $comment )
                <p>{{$comment->body}}</p>
            @endforeach
            <label for="">Nombre del Cliente</label>
                <span class="box">{{$name}}
                {{$apellido_pa}} {{$apellido_ma}}</span>
        </div>
        
        
        
    </div>
@endsection