<?php

namespace App\Http\Controllers\Agent;

use App\Models\Agent;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgentTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        $agents = Agent::all();
        return view('agent.index',[
            'tickets' => $tickets,
            'agents' => $agents
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

    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('agent.tickets.show',[
            'ticket' => $ticket
        ]);
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
        $ticket = Ticket::find($id);

        //Obtner la prioridad desde js
        $nuevaPrioridad = $request->input('nuevaPrioridad') ?? $ticket->priority;
        $nuevoStatus = $request->input('nuevoStatus') ?? $ticket->status;
        $nuevoAgente = $request->input('nuevoAgente') ?? $ticket->agent_id;

        $ticket->priority = $nuevaPrioridad;
        $ticket->status = $nuevoStatus;
        $ticket->agent_id = $nuevoAgente;
        $ticket->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
