@extends('layouts.adminlayout')
@section('content')
    <div>
        <div class="container mx-auto py-8">
            <form class="w-full max-w-2xl mx-auto bg-white p-8 rounded-md shadow-md">
                <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Registrar Cliente</h1>
                <div class="grid grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xl font-bold mb-2" >Nombre</label>
                        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        placeholder="John">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xl font-bold mb-2" >Primer Apellido:</label>
                        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        placeholder="Doe">
                    </div>
                </div>
                <!---->
                <div class="grid grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xl font-bold mb-2" >Segundo Apellido:</label>
                        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        placeholder="Doe">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-xl font-bold mb-2" >Phone:</label>
                        <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="number"
                        placeholder="999-999"
                        >
                    </div>
                </div>
               
                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2" >Email:</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="email"    
                    placeholder="email@email.com" 
                    >
                </div>
               
                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2" >Confirm Password</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="password"
                        placeholder="******">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2" >Confirm Password</label>
                    <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="password"
                        placeholder="******">
                </div>
                <button
                class="w-full bg-indigo-500 text-white text-xl font-bold py-3  rounded-md hover:bg-indigo-600 transition duration-300"
                type="submit">Añadir Cliente</button>
            </form>
        </div>
    </div>
@endsection
