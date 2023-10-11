@if(session()->has('user_session'))
    @php
        $user_session = session('user_session');
    @endphp
@endif

@extends('layouts.agentelayout')
@section('content')
    <div class="overflow-auto rounded-lg shadow" id="contenedor-tabla">
        <table class="w-full">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <tr class="text-blue-900 p-5">
                    <th class="p-5 text-sm font-bold tracking-wide text-left">Cliente</th>
                    <th class="p-5 text-sm font-bold tracking-wide text-left">Asunto</th>
                    <th class="p-5 text-sm font-bold tracking-wide text-left">Agente</th>
                    <th class="p-5 text-sm font-bold tracking-wide text-left">Prioridad</th>
                    <th class="p-5 text-sm font-bold tracking-wide text-left">Estado</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 ">
                @forelse ($tickets as $ticket)
                    <tr class="bg-white" x-data="{ status: '{{ $ticket->status }}' }">
                        <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap "
                            x-bind:class="{'line-through !text-gray-400': status === 'resuelto'}">
                            {{ $ticket->client->first_name }}
                            {{ $ticket->client->first_surname }}</td>
                         <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap "
                            x-bind:class="{'line-through !text-gray-400': status === 'resuelto'}">
                            <a href="{{ route('agent.tickets.show', $ticket) }}"
                                class="hover:text-blue-500 hover:underline transition ease-in-out">{{ $ticket->subject }}
                            </a>
                        </td>
                         <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap"
                         x-bind:class="{'line-through !text-gray-400': status === 'resuelto'}"
                         >
                            <select data-ticket-id="{{ $ticket->id }}" name="agente" id="agente" @change="cambiarAgente($el)">
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}" {{ $ticket->agent->id === $agent->id ? 'selected' : '' }}>{{ $agent->first_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap" x-bind:class="{'line-through !text-gray-400': status === 'resuelto'}">
                            <x-ticket-priority :ticket="$ticket" />
                        </td>
                         <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap"
                            x-bind:class="{'line-through !text-gray-400': status === 'resuelto'}">
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

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>No hay tickets</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection


@push('script')
    <script>
        function cambiarAgente(selectElement){
            const nuevoAgente = selectElement.value;
            const ticketId = selectElement.dataset.ticketId;

            // Enviar la nueva prioridad al servidor a través de una petición AJAX
            fetch(`/app/agent/tickets/${ticketId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Agrega el token CSRF
                    },
                    body: JSON.stringify({
                        nuevoAgente,
                        ticketId
                    })
                })

        }
        function actualizarPrioridad(selectElement) {

            const nuevaPrioridad = selectElement.value;
            const ticketId = selectElement.dataset.id;

            // Enviar la nueva prioridad al servidor a través de una petición AJAX
            fetch(`/app/agent/tickets/${ticketId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Agrega el token CSRF
                    },
                    body: JSON.stringify({
                        nuevaPrioridad,
                        ticketId
                    })
                })
                .then(response => response.json())
                .then(data => {
                })
                // .catch(error => console.error('Error:', error));
        }

        function actualizarStatus(selectElement) {

            const nuevoStatus = selectElement.value;
            const ticketId = selectElement.dataset.id;

            fetch(`/app/agent/tickets/${ticketId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Agrega el token CSRF
                    },
                    body: JSON.stringify({
                        nuevoStatus,
                        ticketId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // console.log(data)
                })
                // .catch(error => console.error('Error:', error));
        }
    </script>
@endpush
