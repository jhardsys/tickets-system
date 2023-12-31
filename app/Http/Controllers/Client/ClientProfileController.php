<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;



class ClientProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

      $data = [
        'first_name' => $request->session()->get('user_session')['first_name'],
        'first_surname' => $request->session()->get('user_session')['first_surname'],
        'second_surname' => $request->session()->get('user_session')['second_surname'],
        'phone' => $request->session()->get('user_session')['phone'],
        'email' => $request->session()->get('user_session')['email'],
        'id' => $request->session()->get('user_session')['id'],
        // 'password' => $request->session()->get('user')->password,
      ];
      return view('client.profile.index', ['data' => $data]);
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
    public function edit(string $id, Request $request)
    {
      $data = [
        'first_name' => $request->session()->get('user_session')['first_name'],
        'first_surname' => $request->session()->get('user_session')['first_surname'],
        'second_surname' => $request->session()->get('user_session')['second_surname'],
        'phone' => $request->session()->get('user_session')['phone'],
        'email' => $request->session()->get('user_session')['email'],
        'id' => $request->session()->get('user_session')['id'],
      ];
      return view('client.profile.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $perfil)
    {
        // dd($request->all());
        $client_data = [
          'first_name' => $request->first_name,
          'first_surname' => $request->first_surname,
          'second_surname' => $request->second_surname,
          'phone' => $request->phone,
        ];
        $client = Client::findOrFail($perfil);
        $client->update($client_data);
        $client->user()->update(['email' => $request->email]);
        $request->session()->put('user_session', [
            'id' => $client->id,
            'first_name' => $client->first_name,
            'first_surname' => $client->first_surname,
            'second_surname' => $client->second_surname,
            'phone' => $client->phone,
            'email' => $client->user->email,
        ]);
        return redirect()->route('client.perfil.index')->with('success', 'Perfil actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
