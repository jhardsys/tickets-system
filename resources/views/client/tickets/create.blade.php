@extends('layouts.ticketslayot')
@section('titulo-seccion', 'Enviar un ticket')
@section('contenido')
    <form class="login" method="POST" action="{{ url('app/client/tickets') }}">
        @csrf
        {{-- @method('PUT') --}}
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

            <input class="login__button" type="submit" value="Enviar" />

        </div>
    </form>
@endsection
