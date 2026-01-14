<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\play as PlayModel;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::with(['play', 'user'])->latest()->get();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plays = PlayModel::all();
        $users = User::all();
        return view('tickets.create', compact('plays', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'seat' => 'required|string|max:10',
            'playId' => 'required|exists:plays,playId',
            'userId' => 'required|exists:users,id',
            'isSold' => 'required|boolean',
        ]);

        Ticket::create($data);

        return redirect()->route('tickets.index')->with('status', 'Ticket created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $plays = PlayModel::all();
        $users = User::all();
        return view('tickets.edit', compact('ticket', 'plays', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'seat' => 'required|string|max:10',
            'playId' => 'required|exists:plays,playId',
            'userId' => 'required|exists:users,id',
            'isSold' => 'required|boolean',
        ]);

        $ticket->update($data);

        return redirect()->route('tickets.show', $ticket)->with('status', 'Ticket updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('status', 'Ticket deleted.');
    }
}
