@extends('layouts.ticketslayot')
{{-- @section('titulo-seccion', 'Tickets') --}}
{{-- @section('content')
    <form action="" method="get" style="margin: 0.25cm; width: 50%">
        <label for="search" class="login__label">
            <input class="login__input" type="search" name="search" id="search" value="{{ $request->search }}"
                placeholder="Buscar ticket">
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
@endsection --}}
@section('content')
    <div class="overflow-auto rounded-lg shadow" id="contenedor-tabla">
        <table class="w-full">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr class="text-blue-900 p-5">

                    <th class="p-5 text-sm font-bold tracking-wide text-left">Asunto</th>
                    <th class="p-5 text-sm font-bold tracking-wide text-left">Agente</th>

                    <th class="p-5 text-sm font-bold tracking-wide text-left">Estado</th>
                    <th class="p-5 text-sm font-bold tracking-wide text-left">Fecha</th>
                    <th class="p-5 text-sm font-bold tracking-wide text-left"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 ">

                <tr class="bg-white" x-data="{ status: '' }">
                    <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap "
                        x-bind:class="{ 'line-through !text-gray-400': status === 'resuelto' }">
                        a
                    </td>
                    <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap "
                        x-bind:class="{ 'line-through !text-gray-400': status === 'resuelto' }">
                        b
                    </td>
                    <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap"
                        x-bind:class="{ 'line-through !text-gray-400': status === 'resuelto' }">
                        a
                    </td>
                    <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap"
                        x-bind:class="{ 'line-through !text-gray-400': status === 'resuelto' }">
                        a
                    </td>
                    {{-- <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap"
                        x-bind:class="{ 'line-through !text-gray-400': status === 'resuelto' }">
                        <div class="flex gap-1 items-center">
                            <select data-id="{{ $ticket->id }}" name="status" id="status"
                                onchange="actualizarStatus(this)" x-model="status">
                                <option value="abierto">Abierto</option>
                                <option value="asignado">Asignado</option>
                                <option value="en proceso">En proceso</option>
                                <option value="resuelto">Resuelto</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                        </div>
                    </td> --}}
                    <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap"
                        x-bind:class="{ 'line-through !text-gray-400': status === 'resuelto' }">
                        a
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
