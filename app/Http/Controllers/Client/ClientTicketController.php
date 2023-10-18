<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Ticket;
use Illuminate\Http\Request;

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
        $ticket->priority = 'alta';
        $ticket->status = 'en proceso';
        $ticket->client_id = session('user_session')->id;
        $ticket->agent_id = 1;
        $ticket->save();
        $comment = new Comment;
        $comment->ticket_id = $ticket->id;
        $comment->body = $request->descripcion;
        $comment->commentable_type = 'App\Models\Client';
        //Consultar commentable_id
        $comment->commentable_id = '1';
        $comment->save();
        return redirect('/app/client/tickets');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::findOrFail($id);
        $comments = Comment::select('*')->where('ticket_id', $id)->get();
        $name = session('user_session')->first_name;
        $apellido_pa = session('user_session')->first_surname;
        $apellido_ma = session('user_session')->second_surname;

        return view('client.tickets.show', compact('ticket', 'comments', 'name', 'apellido_pa', 'apellido_ma'));
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
