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

     public function update()
     {
        return view("admin.client.update");
     }
     
     public function show($id)
      {
         // Lógica para mostrar un cliente específico
      }
}
