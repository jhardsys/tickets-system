<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ClientTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(session('user_session')["id"]);
        $tickets = Ticket::select('*')->where('client_id', session('user_session')["id"])->get();

        return view('client.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(session('user_session'));
        $ticket = new Ticket;
        $ticket->subject = $request->asunto;
        $ticket->description = $request->descripcion;
        $ticket->priority = 'alta';
        $ticket->status = 'en proceso';
        $ticket->client_id = session('user_session')["id"];
        $ticket->agent_id = 1;
        $ticket->save();
        // dd($request->all());
        // dd($ticket);
        return redirect('/app/client/tickets');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tickets = Ticket::findOrFail($id);
        dd($tickets);
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
