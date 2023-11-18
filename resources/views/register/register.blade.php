@extends('layouts.landing')
@section('title', 'Login')
@section('content')
    <form class="login" method="POST" action="{{ route('register.store') }}">
        @csrf
        <h3 class="login__titulo">Registrar en el portal de soporte</h3>
        <div class="login__body">

            <div class="login__campo">
                <label class="login__label" for="first_name">
                    <span class="login__span">Su nombre :</span>
                    <input class="login__input" id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" />
                </label>
                <div>
                    @error('first_name')
                        <span style="color: red" class="login__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="login__campo">
                <label class="login__label" for="first_surname">
                    <span class="login__span">Su primer apellido :</span>
                    <input class="login__input" id="first_surname" type="text" name="first_surname" value="{{ old('first_surname') }}" />
                </label>
                <div>
                    @error('first_surname')
                        <span style="color: red" class="login__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="login__campo">
                <label class="login__label" for="second_surname">
                    <span class="login__span">Su segundo apellido :</span>
                    <input class="login__input" id="second_surname" type="text" name="second_surname" value="{{ old('second_surname') }}" />
                </label>
                <div>
                    @error('second_surname')
                        <span style="color: red" class="login__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="login__campo">
                <label class="login__label" for="phone">
                    <span class="login__span">Su número de telefono :</span>
                    <input class="login__input" id="phone" type="text" name="phone" value="{{ old('phone') }}" />
                </label>
                <div>
                    @error('phone')
                        <span style="color: red" class="login__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="login__campo">
                <label class="login__label" for="email">
                    <span class="login__span">Su dirección de correo electrónico :</span>
                    <input class="login__input" id="email" type="email" name="email" value="{{ old('email') }}" />
                </label>
                <div>
                    @error('email')
                        <span style="color: red" class="login__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- <div class="login__campo">
                <label class="login__label" for="password">
                    <span class="login__span">Contraseña:</span>
                    <input class="login__input" id="password" type="password" name="password"
                        value="{{ old('password') }}" />
                </label>
                <div>
                    @error('password')
                        <span style="color: red" class="login__error">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}

            {{-- <div class="login__campo">
            <label class="login__label" for="role">
                <span class="login__span">Rol:</span>
                <select name="role" id="role" class="login__input">
                    @foreach ($roles as $role)
                        <option @selected(old('role') == $role) value="{{ $role }}">{{ $role }}</option>
                    @endforeach
                </select>
            </label>
            <div>
                @error('role')
                    <span style="color: red" class="login__error">{{ $message }}</span>
                @enderror
            </div>
        </div> --}}

            <input class="login__button" type="submit" value="Registrar" />
            <a class="login__olvido" href="{{ route('login.index') }}">¿Tiene una cuenta? Inicie sesión aquí</a>

        </div>
    </form>
@endsection
