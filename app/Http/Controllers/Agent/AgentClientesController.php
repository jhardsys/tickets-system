<?php

namespace App\Http\Controllers\Agent;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AgentClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Client::all();
        return view('agent.clientes.index',[
            'clientes' => $clientes
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
        $cliente = Client::find($id);

        return view('agent.clientes.show',$cliente);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $cliente = Client::find($id);

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|min:3|alpha',
            'first_surname' => 'required|min:3',
            'phone' => 'required|min:9|unique:clients,phone,' . $cliente->id
        ]);

        $errors = [];
        if ($validator->fails()) {
            $errors = $validator->errors();
        } else {
            $cliente->update($request->all());
        }

        return response()->json([
            "data" => $request->all(),
            "errors" => $errors
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = Client::findOrFail($id);
        $registro->delete();

        return response()->json([
            "data" => "Registro eliminado"
        ]);
    }
}
