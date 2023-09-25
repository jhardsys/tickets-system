<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentProfileController extends Controller
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
      return view("agent.profile.index", ['data' => $data]);
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
    public function edit(Request $request)
    {
        $data = [
        'first_name' => $request->session()->get('user_session')['first_name'],
        'first_surname' => $request->session()->get('user_session')['first_surname'],
        'second_surname' => $request->session()->get('user_session')['second_surname'],
        'phone' => $request->session()->get('user_session')['phone'],
        'email' => $request->session()->get('user_session')['email'],
        'id' => $request->session()->get('user_session')['id'],
      ];
      return view('agent.profile.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $agentData = [
        'first_name' => $request->first_name,
        'first_surname' => $request->first_surname,
        'second_surname' => $request->second_surname,
        'phone' => $request->phone,
    ];

    $agent = Agent::findOrFail($id);
    $agent->update($agentData);
    $agent->user()->update(['email' => $request->email]);

    // Guardar datos en la sesión
    $request->session()->put('user_session', [
        'id' => $agent->id,
        'first_name' => $agent->first_name,
        'first_surname' => $agent->first_surname,
        'second_surname' => $agent->second_surname,
        'phone' => $agent->phone,
        'email' => $agent->user->email,
    ]);

    return redirect()->route('agent.perfil.index')->with('success', 'Perfil actualizado con éxito');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
