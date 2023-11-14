<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\User\NewCredentials;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminAgentsController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        // dd($agents);
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

        $agent->update([
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
        // $agent->password = $request->password;

        $agent->save();

        $user = new User();

        $bytesAleatorios = random_bytes(16);
        $password = bin2hex($bytesAleatorios);


        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->userable_id = $agent->id;
        $user->userable_type = 'App\Models\Agent';

        $user->save();

        Mail::to($request->input('email'))->send(new NewCredentials($password));

        return redirect()->route('admin.agents.index');
    }

    public function destroy(string $id)
    {
        $agent = Agent::findOrFail($id);

        if ($agent->user) {
            $agent->user->delete();
        }
        $agent->delete();

        return redirect()->route('admin.agents.index')->with('success', 'Agente eliminado exitosamente');
    }
}
