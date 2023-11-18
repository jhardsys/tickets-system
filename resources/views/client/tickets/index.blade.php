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
                    <th class="p-5 text-sm font-bold tracking-wide text-left">Opciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 ">
                @forelse ($tickets as $ticket)
                    <tr class="bg-white" x-data="{ status: '' }">
                        <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap "
                            x-bind:class="{ 'line-through !text-gray-400': status === 'resuelto' }">
                            {{ $ticket->subject }}
                        </td>
                        <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap "
                            x-bind:class="{ 'line-through !text-gray-400': status === 'resuelto' }">
                            @if ($ticket->first_name == '' and $ticket->first_surname == '')
                                Aún no asignado
                            @else
                                {{ $ticket->first_name }}

                                {{ $ticket->first_surname }}
                            @endif
                        </td>
                        <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap capitalize"
                            x-bind:class="{ 'line-through !text-gray-400': status === 'resuelto' }">
                            {{ $ticket->status }}
                        </td>
                        <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap"
                            x-bind:class="{ 'line-through !text-gray-400': status === 'resuelto' }">
                            {{ $ticket->created_at }}
                        </td>
                        <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap"
                            x-bind:class="{ 'line-through !text-gray-400': status === 'resuelto' }">
                            <a href="{{ url('app/client/tickets/' . $ticket->id) }}">
                                <button type="button"
                                    class="border border-blue-700 bg-blue-700 text-white rounded-md px-4 py-2  transition duration-500 ease select-none hover:bg-blue-900 focus:outline-none focus:shadow-outline">
                                    Ver
                                </button>
                            </a>
                        </td>
                    </tr>
                @empty
                    {{-- <div class="ticket">
                        <div class="ticket__body">
                            <div class="ticket__texts">
                                <a href="{{ route('client.tickets.index') }}" class="ticket__titulo">No hay tickets</a>
                            </div>
                        </div>
                    </div> --}}
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
