<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;

class AdminAgentsController extends Controller
{
    public function index()
    {
      $agents = Agent::all(); 
      // dd($clients);
    //   return view("admin.agent.index");
      return view("admin.agent.index",[
         'agents' => $agents,
     ]);
    }

    public function create()
    {
        return view("admin.agent.create");
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'first_surname' => 'required',
            'second_surname' => 'required',
            'phone' => 'required',
        ]);

        $agent = Agent::findOrFail($id);
        $agent->update([
        'first_name' => $request->input('first_name'),
        'first_surname' => $request->input('first_surname'),
        'second_surname' => $request->input('second_surname'),
        'phone' => $request->input('phone'),
    ]);
        return redirect()->route('admin.agents.index')->with('success', 'Agent actualizado exitosamente');
    }

    public function edit(string $id)
    {
        $agent = Agent::findOrFail($id);
        // dd($agent);

        return view('admin.agent.edit', compact('agent'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'first_surname' => 'required',
            'second_surname' => 'required',
            'phone' => 'required',
            'password' => 'required|confirmed',
       ]);
  
       $agent = new Agent();
  
       $agent->first_name = $request->first_name;
       $agent->first_surname = $request->first_surname;
       $agent->second_surname = $request->second_surname;
       $agent->phone = $request->phone;
       // $client->password = $request->password;
  
       $agent->save();
  
       return redirect()->route('admin.agents.index');
    }
}
