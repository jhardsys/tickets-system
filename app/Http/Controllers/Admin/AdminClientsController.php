<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminClientsController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::where('is_active', true)->get();

        return view("admin.client.index", [
            'clients' => $clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.client.create");
    }

    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);
        $user = $client->user;

        $request->validate([
            'first_name' => 'required',
            'first_surname' => 'required',
            'second_surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $client->update([
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

        return redirect()->route('admin.clients.index')->with('success', 'Cliente actualizado exitosamente');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        // dd($client);
        $user = $client->user;

        // dd($user->email);

        return view('admin.client.edit', compact('client', 'user'));
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

        $client = new Client();

        $client->first_name = $request->first_name;
        $client->first_surname = $request->first_surname;
        $client->second_surname = $request->second_surname;
        $client->phone = $request->phone;

        $client->save();

        $user = new User();

        // $bytesAleatorios = random_bytes(16);
        // $password = bin2hex($bytesAleatorios);

        $password = 'password';

        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->userable_id = $client->id;
        $user->userable_type = 'App\Models\Client';

        $user->save();

        // TODO: HACER ENVIO DE CORREO A CLIENTE CON CREDENCIALES

        return redirect()->route('admin.clients.index');
    }
}
