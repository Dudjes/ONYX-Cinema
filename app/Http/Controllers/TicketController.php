<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Movie;
use App\Models\Play;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Mail\TicketPurchased;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Ticket::with(['play.movie', 'play.cinema', 'user']);

        // Filter by movie
        if ($request->filled('movie')) {
            $query->whereHas('play.movie', function($q) use ($request) {
                $q->where('movieId', $request->movie);
            });
        }

        // Filter by cinema
        if ($request->filled('cinema')) {
            $query->whereHas('play.cinema', function($q) use ($request) {
                $q->where('cinemaId', $request->cinema);
            });
        }

        // Filter by user
        if ($request->filled('user')) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('firstname', 'like', '%'.$request->user.'%')
                ->orWhere('name', 'like', '%'.$request->user.'%');
            });
        }

        // Filter by play date
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $tickets = $query->get()->sortBy(function($ticket) use ($request) {
            return $ticket->user->firstname ?? $ticket->user->name ?? '';
        }, SORT_REGULAR, $request->get('order', 'asc') === 'desc');

        // Pass movies and cinemas for the filters
        $movies = \App\Models\Movie::all();
        $cinemas = \App\Models\Cinema::all();

        return view('tickets.index', compact('tickets', 'movies', 'cinemas'));
    }

    public function dashboard(Request $request)
    {
        // Load all tickets with relationships
        $ticketsQuery = Ticket::with(['play.movie', 'play.cinema', 'user']);

        // Optional filters (applied to tickets)
        if ($request->filled('movie')) {
            $ticketsQuery->whereHas('play.movie', fn($q) => $q->where('movieId', $request->movie));
        }

        if ($request->filled('cinema')) {
            $ticketsQuery->whereHas('play.cinema', fn($q) => $q->where('cinemaId', $request->cinema));
        }

        if ($request->filled('user')) {
            $ticketsQuery->whereHas('user', fn($q) => $q->where('firstname', 'like', '%'.$request->user.'%')
                                                        ->orWhere('name', 'like', '%'.$request->user.'%'));
        }

        if ($request->filled('date')) {
            $ticketsQuery->whereDate('created_at', $request->date);
        }

        $tickets = $ticketsQuery->get();

        // Calculate stats based on plays
        $totalSeats = \App\Models\Play::with('hall')->get()->sum(fn($play) => $play->hall->capacity);

        $soldTickets = Ticket::where('isSold', 1)->count(); // total sold tickets
        $availableTickets = $totalSeats - $soldTickets;    // remaining seats

        return view('tickets.dashboard', compact(
            'tickets',
            'soldTickets',
            'availableTickets',
            'totalSeats'
        ));
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
