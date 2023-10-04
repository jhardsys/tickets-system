@extends('layouts.adminlayout')
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
                    <tr class="odd:bg-white even:bg-slate-100">
                        <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap">{{ $ticket->client->first_name }}
                            {{ $ticket->client->first_surname }}</td>
                        <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap">
                            <a href="{{ route('admin.tickets.show', $ticket) }}"
                                class="hover:text-blue-500 hover:underline transition ease-in-out">{{ $ticket->subject }}
                            </a>
                        </td>
                        <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap">{{ $ticket->agent->first_name }}
                            {{ $ticket->agent->first_surname }}</td>
                        <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap">{{ $ticket->priority }} </td>
                        <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap">{{ $ticket->status }} </td>
                    </tr>
                @empty
                    <tr>No hay tickets</tr>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
@push('script')
    <script>
        document.querySelector('#contenedor-tabla').addEventListener('change', function(event) {
            if (event.target && event.target.matches('#prioridad')) {
                var colorIndicador = event.target.parentElement.querySelector('#color-indicador');
                var estadoSeleccionado = event.target.value;
                console.log(estadoSeleccionado);
                if (estadoSeleccionado === 'alto') {
                    colorIndicador.classList.add('!bg-red-300')
                } else if (estadoSeleccionado === 'medio') {
                    colorIndicador.classList.add('!bg-gray-300')
                } else if (estadoSeleccionado === 'bajo') {
                    colorIndicador.classList.add('!bg-green-300')
                }
            }
        });
    </script>
@endpush
