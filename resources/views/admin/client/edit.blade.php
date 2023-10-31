@extends('layouts.adminlayout')
@section('content')
    <div class="container mx-auto py-8">
        <form class="w-full max-w-2xl mx-auto bg-white p-8 rounded-md shadow-md "
            action="{{ route('admin.clients.update', ['client' => $client->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Actualizar cliente</h1>
            <div class="grid grid-cols-2 gap-6">
                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2" for="first_name">Nombre:</label>
                    <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" id="first_name" name="first_name" value="{{ $client->first_name }}">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2" for="first_surname">Primer Apellido:</label>
                    <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" id="first_surname" name="first_surname" value="{{ $client->first_surname }}">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2" for="second_surname">Segundo Apellido:</label>
                    <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" id="second_surname" name="second_surname" value="{{ $client->second_surname }}">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2" for="second_surname">Phone</label>
                    <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        id="phone" name="phone" value="{{ $client->phone }}">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-xl font-bold mb-2">Correo Electrónico:</label>
                <!-- <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" required placeholder="email" > -->
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    placeholder="example@email.com" name="email" type="email" value="{{ $user->email ?? 'example@email.com' }}">
            </div>
            {{-- <div class="mb-4">
                <label class="block text-gray-700 text-xl font-bold mb-2">Contraseña</label>
                <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="password"
                    placeholder="******"
                    name="password">
            </div>
            --}}
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-2xl rounded w-full">Guardar
                cambios</button>
        </form>
    </div>
@endsection
