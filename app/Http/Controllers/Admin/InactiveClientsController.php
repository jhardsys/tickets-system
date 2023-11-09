<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InactiveClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inactive_clients = Client::where('is_active', false)->get();
        return view('admin.inactive-client.index', [
            'clients' => $inactive_clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        // TODO: FUNCIÓN PARA ACTIVAR CLIENTE
        $password = 'password';
        $client = Client::find($id);
        $client->is_active = true;
        $client->save();

        // $bytesAleatorios = random_bytes(16);
        // $password = bin2hex($bytesAleatorios);

        if ($client->user) {
            $user = $client->user;
            $user->password = Hash::make($password);
            $user->save();

            // TODO: HACER ENVIO DE CORREO A CLIENTE CON CREDENCIALES
            
        }

        return redirect()->route('admin.inactive-clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        if ($client->user) {
            $client->user->delete();
        }
        $client->delete();
        return redirect()->route('admin.inactive-clients.index')->with('alert', 'Cliente eliminado exitosamente');
    }
}
