<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Movie;
use App\Models\Play;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::with(['play.movie', 'user'])->latest()->get();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Step 1: choose movie
     */
    public function create()
    {
        $movies = Movie::all();
        return view('tickets.create', compact('movies'));
    }

    /**
     * Step 2: choose play
     */
    public function choosePlay(Movie $movie)
    {
        $plays = $movie->plays()
            ->with(['cinema', 'hall'])
            ->orderBy('when')
            ->get();

        return view('tickets.choose-play', compact('movie', 'plays'));
    }

    /**
     * Step 3: choose seat
     */
    public function chooseSeat(Movie $movie, Play $play)
    {
        // extra safety: make sure play belongs to movie
        if ($play->movieId !== $movie->movieId) {
            abort(404);
        }

        $soldSeats = Ticket::where('playId', $play->playId)
            ->where('isSold', 1)
            ->pluck('seat')
            ->toArray();

        $totalSeats = $play->hall->capacity;

        return view('tickets.choose-seat', compact(
            'movie',
            'play',
            'soldSeats',
            'totalSeats'
        ));
    }

    /**
     * Store ticket
     */
    public function store(StoreTicketRequest $request)
    {
        Ticket::create([
            'seat'   => $request->seat,
            'playId' => $request->playId,
            'userId' => $request->user()->id,
            'isSold' => 1,
        ]);

        return redirect()
            ->route('tickets.index')
            ->with('status', 'Ticket booked successfully.');
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
        $plays = Play::all();
        $users = User::all();

        return view('tickets.edit', compact('ticket', 'plays', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());

        return redirect()
            ->route('tickets.show', $ticket)
            ->with('status', 'Ticket updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()
            ->route('tickets.index')
            ->with('status', 'Ticket deleted.');
    }
}
