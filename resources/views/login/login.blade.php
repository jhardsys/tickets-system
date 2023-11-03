@extends('layouts.landing')
@section('title', 'Login')
@section('content')
    <form class="login" method="POST" action="{{ route('login.store') }}">
        @csrf
        <h3 class="login__titulo">Iniciar sesión en el portal de soporte</h3>
        <div class="login__body">

            <div class="login__campo">
                <label class="login__label" for="correo">
                    <span class="login__span">Su dirección de correo electrónico :</span>
                    <input class="login__input" id="username" type="email" name="correo" value="{{ old('correo') }}" />
                </label>
                <div>
                    @error('correo')
                        <span style="color: red" class="login__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="login__campo">
                <label class="login__label" for="password">
                    <span class="login__span">Contraseña:</span>
                    <input class="login__input" id="password" type="password" name="password" value="{{ old('password') }}" />
                </label>
                <div>
                    @error('password')
                        <span style="color: red" class="login__error">{{ $message }}</span>
                    @enderror
                </div>
            </div>

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

            <input class="login__button" type="submit" value="Iniciar sesion" />
            <a class="login__olvido" href="{{ route('register.index') }}">¿No tiene una cuenta? Registrese aquí</a>
            {{-- TODO: FUNCIÓN RECUPERAR CONTRASEÑA --}}
            <a class="login__olvido" href="#">¿Olvidó su contraseña?</a>

        </div>
    </form>
@endsection
