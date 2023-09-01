@extends('layouts.landing')
@section('title', 'Login')
@section('content')
    <form class="login">
        <h3 class="login__titulo">Iniciar sesión en el portal de soporte</h3>
        <div class="login__body">

            <div class="login__campo">
                <label class="login__label" for="correo">
                    <span class="login__span">Su dirección de correo electrónico :</span>
                    <input class="login__input" id="username" type="email" name="correo" />
                </label>
            </div>

            <div class="login__campo">
                <label class="login__label" for="password">
                    <span class="login__span">Contraseña:</span>
                    <input class="login__input" id="password" type="password" name="password" />
                </label>
            </div>

            <input class="login__button" type="submit" value="Iniciar sesion" />
            <a class="login__olvido" href="#">¿Olvidó su contraseña?</a>

        </div>
    </form>
@endsection
