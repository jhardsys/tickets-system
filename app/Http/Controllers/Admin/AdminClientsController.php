<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class AdminClientsController extends Controller
{
    public function index(Request $request)
    {
      $clients = Client::all(); 
      // dd($clients);
      return view("admin.client.index",[
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
         $request->validate([
             'first_name' => 'required',
             'first_surname' => 'required',
             'second_surname' => 'required',
             'phone' => 'required',
         ]);

         $client = Client::findOrFail($id);
         $client->update([
            'first_name' => $request->input('first_name'),
            'first_surname' => $request->input('first_surname'),
            'second_surname' => $request->input('second_surname'),
            'phone' => $request->input('phone'),
        ]);
         return redirect()->route('admin.clients.index')->with('success', 'Cliente actualizado exitosamente');
     }
     
     public function edit($id)
      {
         $client = Client::findOrFail($id);
         // dd($client);

         return view('admin.client.edit', compact('client'));
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
    
        $client = new Client();
    
        $client->first_name = $request->first_name;
        $client->first_surname = $request->first_surname;
        $client->second_surname = $request->second_surname;
        $client->phone = $request->phone;
        // $client->password = $request->password;
    
        $client->save();
    
        return redirect()->route('admin.clients.index');
      }
}
