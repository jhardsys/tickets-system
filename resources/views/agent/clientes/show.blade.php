@extends('layouts.agentelayout')

@section('content')
    <section>
        <header>
            <div class="bg-white flex p-5">
                <div class="flex-1 flex gap-4">
                    <figure class="h-28">
                        <img src="{{ asset('assets/admin/img/avatar-profile-anonymous.jpg') }}" alt="Imagen perfil"
                            class="h-full">
                    </figure>
                    <p class="text-xl font-bold py-2">{{ $cliente->fullname() }}</p>
                </div>
                <div>
                    <section class="flex flex-gap2">
                        <button
                            class="bg-gray-50 font-semibold border border-1 transition ease-in hover:bg-gray-200 rounded-sm text-blue-950 py-2 px-4">
                            + Nuevo ticket</button>
                    </section>
                </div>
            </div>
        </header>
        <section class="overflow-hidden">
            <ul class="flex bg-slate-100 shadow mb-2">
                <li
                    class="uppercase py-2 px-4 font-semibold hover:bg-blue-500 transition duration-300 ease in cursor-pointer  text-white bg-blue-500">
                    tickets</li>
                <li
                    class="uppercase py-2 px-4 font-semibold text-gray-600 hover:bg-blue-500 hover:text-white transition duration-300 ease in cursor-pointer">
                    timeline</li>
            </ul>
            <div>
                @forelse ($cliente->tickets as $ticket )
                <section class="flex py-5 bg-white shadow-sm rounded">
                    <div class="shrink-0  w-20 grid place-items-center">
                        <x-ticket-icon width=30/>
                    </div>
                    <div class="h-full flex-1 p-2">
                        <a href="{{ route('agent.tickets.show', $ticket) }}" class="block text-blue-800 font-semibold hover:underline hover:cursor-pointer">{{ $ticket->subject }}</a>
                        <p class="inline text-sm text-gray-500">Status:  {{ $ticket->status }}</p> <p class="inline text-sm text-gray-500">Agent: {{ $ticket->agent->fullname() }}</p>
                        <p class="text-sm text-gray-500">Agent respondio: {{ $ticket->created_at->diffForHumans() }}</p>
                    </div>
                </section>
                @empty
                <section class="flex py-5 bg-white shadow-sm rounded">
                    <div class="shrink-0  w-20 grid place-items-center">
                        <x-ticket-icon width=30/>
                    </div>
                    <div class="h-full flex-1 p-2">
                        <a class="block text-blue-800 font-semibold hover:underline hover:cursor-pointer">No hay ningun ticket aun</a>

                    </div>
                </section>
                @endforelse

            </div>
        </section>
    </section>
@endsection
