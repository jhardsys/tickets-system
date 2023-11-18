<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // TODO: REGISTRAR VISTA
        return view('register.register');
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
        // FUNCION REGISTRAR
        $request->validate([
            'first_name' => 'required',
            'first_surname' => 'required',
            'second_surname' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
        ]);

        $client = Client::create([
            'first_name' => $request->input('first_name'),
            'first_surname' => $request->input('first_surname'),
            'second_surname' => $request->input('second_surname'),
            'phone' => $request->input('phone'),
            'is_active' => false
        ]);

        // $bytesAleatorios = random_bytes(16);
        // $password = bin2hex($bytesAleatorios);

        $client->user()->create([
            'email' => $request->input('email'),
            'password' => bcrypt('password'),
            'userable_type' => 'App\Models\Client',
            'userable_id' => $client->id,
        ]);

        return redirect()->route('login.index');
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
        //
    }
}
