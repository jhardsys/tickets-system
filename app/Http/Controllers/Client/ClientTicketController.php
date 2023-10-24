<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\Tickets\AdminTicketAbierto;
use App\Mail\Tickets\ClientTicketAbierto;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd(session('user_session')["id"]);
        $tickets = Ticket::select('*')->where('client_id', session('user_session')["id"])->get();

        if ($request->has('search')) {
            $tickets = Ticket::select('*')->where('client_id', session('user_session')["id"])->where('subject', 'like', '%' . $request->search . '%')->get();
        }

        return view('client.tickets.index', compact('tickets', 'request'));
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
        // validacion de datos enviados por el formulario
        $request->validate([
            'asunto' => 'required',
            'descripcion' => 'required',
        ]);
        // dd(session('user_session'));
        $ticket = new Ticket;
        $ticket->subject = $request->asunto;
        $ticket->description = $request->descripcion;
        $ticket->client_id = session('user_session')["id"];
        $ticket->save();
        // dd($request->all());
        // dd($ticket);

        Mail::to('erickramirez.dnbk@gmail.com')->send(new AdminTicketAbierto(session('user_session')["first_name"], session('user_session')["first_surname"], session('user_session')["second_surname"]));
        Mail::to(session('user_session')["email"])->send(new ClientTicketAbierto());

        return redirect()->route('client.tickets.create')->with('alert', 'Ticket creado correctamente');
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
