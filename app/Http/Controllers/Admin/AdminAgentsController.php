<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminAgentsController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        // dd($clients);
        //   return view("admin.agent.index");
        return view("admin.agent.index", [
            'agents' => $agents,
        ]);
    }

    public function create()
    {
        return view("admin.agent.create");
    }

    public function update(Request $request, string $id)
    {
        $agent = Agent::findOrFail($id);
        $user = $agent->user;

        $request->validate([
            'first_name' => 'required',
            'first_surname' => 'required',
            'second_surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $agent->update([
            'first_name' => $request->input('first_name'),
            'first_surname' => $request->input('first_surname'),
            'second_surname' => $request->input('second_surname'),
            'phone' => $request->input('phone'),
        ]);

        // $bytesAleatorios = random_bytes(16);
        // $password = bin2hex($bytesAleatorios);

        $password = 'password';

        $user->update([
            'email' => $request->input('email'),
            'password' => Hash::make($password),
        ]);

        // TODO: HACER ENVIO DE CORREO A CLIENTE CON CREDENCIALES

        return redirect()->route('admin.agents.index')->with('success', 'Agent actualizado exitosamente');
    }

    public function edit(string $id)
    {
        $agent = Agent::findOrFail($id);
        $user = $agent->user;
        // dd($agent);

        return view('admin.agent.edit', compact('agent', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'first_surname' => 'required',
            'second_surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $agent = new Agent();

        $agent->first_name = $request->first_name;
        $agent->first_surname = $request->first_surname;
        $agent->second_surname = $request->second_surname;
        $agent->phone = $request->phone;
        // $client->password = $request->password;

        $agent->save();

        $user = new User();

        // $bytesAleatorios = random_bytes(16);
        // $password = bin2hex($bytesAleatorios);

        $password = 'password';

        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->userable_id = $agent->id;
        $user->userable_type = 'App\Models\Agent';

        $user->save();

        // TODO: HACER ENVIO DE CORREO A CLIENTE CON CREDENCIALES

        return redirect()->route('admin.agents.index');
    }
}
