@extends('layouts.adminlayout')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div>
        <div class="container mx-auto py-8">
            <form class="w-full max-w-2xl mx-auto bg-white p-8 rounded-md shadow-md "  action="{{ route('admin.clients.store') }}" method="POST">
            @csrf
            @method('POST')
                <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Registrar Cliente</h1>
                <div class="grid grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xl font-bold mb-2" >Nombre</label>
                        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        placeholder="John" name="first_name">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xl font-bold mb-2" >Primer Apellido:</label>
                        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        placeholder="Doe" name="first_surname">
                    </div>
                </div>
                <!---->
                <div class="grid grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xl font-bold mb-2" >Segundo Apellido:</label>
                        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        placeholder="Doe" name="second_surname">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xl font-bold mb-2" >Phone:</label>
                        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="number"
                        placeholder="999-999"
                        name= "phone"
                        >
                    </div>
                </div>

                <!-- <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2" >Email:</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="email"
                    placeholder="email@email.com"
                    name="email"
                    >
                </div> -->

                {{-- <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2">Contraseña</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="password"
                        placeholder="******"
                        name="password">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2">Confirmar Contraseña</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="password"
                        placeholder="******"
                        name="password_confirmation">
                </div> --}}
                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2" >Correo Electrónico:</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    placeholder="example@email.com" name="email" type="email">
                </div>
                <button
                class="w-full bg-indigo-500 text-white text-xl font-bold py-3  rounded-md hover:bg-indigo-600 transition duration-300"
                type="submit">Añadir Cliente</button>
            </form>
        </div>
    </div>
@endsection
