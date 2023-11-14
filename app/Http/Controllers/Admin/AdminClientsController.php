<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\User\NewCredentials;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

        $current_email = $user->email;

        if ($user) {
            $request->validate([
                'first_name' => 'required',
                'first_surname' => 'required',
                'second_surname' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]);
        } else {
            $request->validate([
                'first_name' => 'required',
                'first_surname' => 'required',
                'second_surname' => 'required',
                'phone' => 'required',
            ]);
        }

        $client->update([
            'first_name' => $request->input('first_name'),
            'first_surname' => $request->input('first_surname'),
            'second_surname' => $request->input('second_surname'),
            'phone' => $request->input('phone'),
        ]);


        if ($user) {
            $bytesAleatorios = random_bytes(16);
            $password = bin2hex($bytesAleatorios);
            $user->update([
                'email' => $request->input('email'),
                'password' => Hash::make($password),
            ]);

            if ($current_email != $request->input('email')) {
                Mail::to($request->input('email'))->send(new NewCredentials($password));
            }
        }

        return redirect()->route('admin.clients.index')->with('success', 'Cliente actualizado exitosamente');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $user = $client->user;

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
        $client->is_active = true;

        $client->save();

        $user = new User();

        $bytesAleatorios = random_bytes(16);
        $password = bin2hex($bytesAleatorios);

        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->userable_id = $client->id;
        $user->userable_type = 'App\Models\Client';

        $user->save();

        Mail::to($request->input('email'))->send(new NewCredentials($password));

        return redirect()->route('admin.clients.index')->with('success', 'Cliente creado exitosamente');
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);

        if ($client->user) {
            $client->user->delete();
        }
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Cliente eliminado exitosamente');
    }
}
