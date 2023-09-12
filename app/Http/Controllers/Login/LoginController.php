<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Administrator;
use App\Models\Agent;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO: INICIAR SESION VISTTA
        $roles = [
            1 => 'Administrador',
            2 => 'Agente',
            3 => 'Cliente'
        ];
        return view('login.login', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        // LOGIN FUNCION
        $roles = [
            1 => 'Administrador',
            2 => 'Agente',
            3 => 'Cliente'
        ];

        // COMPROBAR SI USUARIO EXISTE SEGUN ROL
        $user = null;
        if ($request->role == $roles[1]) {
            $user = Administrator::where('email', $request->correo)->first();
        } elseif ($request->role == $roles[2]) {
            $user = Agent::where('email', $request->correo)->first();
        } else {
            $user = Client::where('email', $request->correo)->first();
        }

        // COMPROBAR SI USUARIO EXTRAIDO EXISTE
        if (!$user) {
            return redirect()->route('login.index')->withInput([
                'correo' => $request->correo,
                'password' => $request->password,
                'role' => $request->role
            ])->withErrors(['correo' => 'Correo o rol ingresado incorrecto']);
        }

        // COMPROBAR SI CONTRASEÑA ES CORRECTA
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('login.index')->withInput([
                'correo' => $request->correo,
                'password' => $request->password,
                'role' => $request->role
            ])->withErrors(['password' => 'Contraseña ingresada incorrecta']);
        }

        // REDIRECCION SEGUN ROL
        session(['user' => $user, 'role' => $request->role]);

        if ($request->role == $roles[1]) {
            return redirect()->route('admin.tickets.index');
        } elseif ($request->role == $roles[2]) {
            return redirect()->route('agent.tickets.index');
        } else {
            return redirect()->route('client.tickets.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
