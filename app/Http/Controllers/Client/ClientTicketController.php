<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ClientTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        setlocale(LC_TIME, 'es_ES.UTF-8');
        // dd(session('user_session')["id"]);
        // $tickets = Ticket::select('*')->where('client_id', session('user_session')["id"])->get();

        $tickets = DB::table('tickets')->leftJoin('agents', 'tickets.agent_id', '=', 'agents.id')->select('tickets.*', 'agents.first_name', 'agents.first_surname')->where('client_id', session('user_session')["id"])->get();

        if ($request->has('search')) {
            $tickets = DB::table('tickets')->leftJoin('agents', 'tickets.agent_id', '=', 'agents.id')->select('tickets.*', 'agents.first_name', 'agents.first_surname')->where('client_id', session('user_session')["id"])->where('subject', 'like', '%' . $request->search . '%')->get();
        }
        // dd($tickets);

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
        // $user = session('user_session');
        // dd($user["id"]);
        $ticket = new Ticket;
        $ticket->subject = $request->asunto;
        $ticket->description = $request->descripcion;

        $ticket->priority = 'baja';
        $ticket->status = 'abierto';
        $ticket->client_id = session('user_session')["id"];
        $ticket->agent_id = 1;
        $ticket->save();

        // $comment = new Comment;
        // $comment->ticket_id = $ticket->id;
        // $comment->body = $request->descripcion;
        // $comment->commentable_type = session('role');
        // //Consultar commentable_id
        // $comment->commentable_id = "1";
        // $comment->save();
        return redirect()->route('client.tickets.index')->with('alert', 'Ticket creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::findOrFail($id);
        $comments = Comment::select('*')->where('ticket_id', $id)->get();
        $name = session('user_session')["first_name"];
        $apellido_pa = session('user_session')["first_surname"];
        $apellido_ma = session('user_session')["second_surname"];

        $fecha =  $ticket->first()->created_at;
        $formattedDate = date_format($fecha, 'D, d M, Y H:i A');

        // $description = $comments[0];
        // $body =
        // dd($ticket->comments);
        // dd($comments[0]);
        // dd($ticket, $comments, $name, $apellido_pa, $apellido_ma, $formattedDate, $description);
        return view('client.tickets.show', compact('ticket', 'comments', 'name', 'apellido_pa', 'apellido_ma', 'formattedDate'));
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
