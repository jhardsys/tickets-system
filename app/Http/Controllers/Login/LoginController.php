<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Administrator;
use App\Models\Agent;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {

        $user = User::where('email', $request->correo)->first();
        // dd($user);

        // COMPROBAR SI CONTRASEÑA ES CORRECTA
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->route('login.index')->withInput([
                'correo' => $request->correo,
                'password' => $request->password,
            ])->withErrors(['password' => 'Contraseña ingresada incorrecta']);
        }

        // dd($user->userable->id);

        $user_session_data = [
            'id' => $user->userable->id,
            'first_name' => $user->userable->first_name,
            'first_surname' => $user->userable->first_surname,
            'second_surname' => $user->userable->second_surname,
            'phone' => $user->userable->phone,
            'email' => $user->email,
        ];

        session(['user_session' => $user_session_data, 'role' => $user->userable_type]);

        $roles = [
            'admin' => 'App\Models\Administrator',
            'agent' => 'App\Models\Agent',
            'client' => 'App\Models\Client'
        ];

        return match ($user->userable_type) {
            $roles['admin'] => redirect()->route('admin.tickets.index'),
            $roles['agent'] => redirect()->route('agent.tickets.index'),
            $roles['client'] => redirect()->route('client.tickets.index'),
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd('destroy');
        // CERRAR SESION
        session()->forget('user');
        session()->forget('role');
        return redirect()->route('login.index');
    }
}
