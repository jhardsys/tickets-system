{{-- @extends('layouts.ticketslayot')
@section('titulo-seccion', 'Enviar un ticket')
@section('content')
    <form class="login" method="POST" action="{{ url('app/client/tickets') }}">
        @csrf
        
        @if (session('alert'))
            <div style="color: green">
                {{ session('alert') }}
            </div>
        @endif
        <div class="login__body">

            <div class="login__campo">
                <label class="login__label" for="asunto">
                    <span class="login__span">Asunto:</span>
                    <input class="login__input" id="asunto" type="text" name="asunto" />
                </label>
                <div>
                    @error('asunto')
                        <span style="color: red" class="login__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="login__campo">
                <label class="login__label" for="descripcion">
                    <span class="login__span">Descripcion:</span>
                    <textarea class="form__descripcion" name="descripcion"></textarea>
                </label>
                <div>
                    @error('descripcion')
                        <span style="color: red" class="login__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="login__campo">
                <label class="login__label" for="evidencia">
                    <span class="login__span">Evidencia:</span>
                    <input type="file" multiple>
                </label>
                <div>
                    @error('evidencia')
                        <span style="color: red" class="login__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <input class="login__button" type="submit" value="Enviar" />

        </div>
    </form>
@endsection --}}


@extends('layouts.ticketslayot')
@section('content')
    <div>
        <div class="container mx-auto py-8">
            <form class="w-full max-w-2xl mx-auto bg-white p-8 rounded-md shadow-md">
                <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Nuevo Ticket</h1>
                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2">Asunto:</label>
                    <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="text" placeholder="Ingresar asunto">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2">Descripción</label>
                    <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"></textarea>

                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-xl font-bold mb-2">Archivo adjunto</label>
                    <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="file">
                </div>
                <button
                    class="w-full bg-indigo-500 text-white text-xl font-bold py-3  rounded-md hover:bg-indigo-600 transition duration-300"
                    type="submit">Enviar</button>
            </form>
        </div>
    </div>
@endsection
