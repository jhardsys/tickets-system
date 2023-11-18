@extends('layouts.adminlayout')
@section('content')
    <section class="py-1 bg-blueGray-50 container m-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-wrap items-center">
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                        <h3
                            class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xl uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                            Lista de Agentes</h3>
                    </div>
                    <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                        <a href="{{ url('app/admin/agents/create') }}">
                            <button type="button"
                                class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                                Agregar Agente
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            @if (session('success'))
                <div class="text-center mb-4" style="color: green">
                    {{ session('success') }}
                </div>
            @endif
            <div class="overflow-auto rounded-lg shadow">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr class="text-blue-900 p-5">
                            <th class="p-5 text-sm font-bold tracking-wide text-left">ID</th>
                            <th class="p-5 text-sm font-bold tracking-wide text-left">Nombre</th>
                            <th class="p-5 text-sm font-bold tracking-wide text-left">Primer Apellido</th>
                            <th class="p-5 text-sm font-bold tracking-wide text-left">Segundo Apellido</th>
                            <th class="p-5 text-sm font-bold tracking-wide text-left">Teléfono</th>
                            <th class="p-5 text-sm font-bold tracking-wide text-left">Correo</th>
                            <th class="p-5 text-sm font-bold tracking-wide text-left"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 ">
                        @forelse ($agents as $agent)
                            <tr class="bg-white">
                                <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap ">
                                    {{ $agent->id }}
                                </td>
                                <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap ">
                                    {{ $agent->first_name }}

                                </td>
                                <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap">
                                    {{ $agent->first_surname }}

                                </td>
                                <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap">
                                    {{ $agent->second_surname }}
                                </td>
                                <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap">
                                    {{ $agent->phone }}
                                </td>
                                <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap">
                                    @if ($agent->user)
                                        {{ $agent->user->email }}
                                    @endif
                                </td>
                                <td class="py-5 px-3 text-sm text-gray-700 whitespace-nowrap grid gap-1">
                                    <a href="{{ route('admin.agents.edit', ['agent' => $agent->id]) }}">
                                        <button type="button"
                                            class="border border-yellow-500 bg-yellow-500 text-white rounded-md px-4 py-2  transition duration-500 ease select-none hover:bg-yellow-600 focus:outline-none focus:shadow-outline">
                                            Editar
                                        </button>
                                    </a>
                                    <x-delete-form modalid="delete-agent-{{ $agent->id }}" id="{{ $agent->id }}"
                                        action="admin.agents.destroy"
                                        text="{{ $agent->first_name }} {{ $agent->first_surname }} {{ $agent->second_surname }}" />

                                </td>
                            </tr>
                        @empty
                            <tr>No hay agentes</tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
    </section>
@endsection
