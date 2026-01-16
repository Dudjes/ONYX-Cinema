<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Tickets for this user
        $tickets = $user->tickets()->with('play.movie')->get();

        // Basic stats
        $totalTickets = $tickets->count();
        $totalMovies = Movie::count(); // all movies in DB
        $ticketsPerMovie = $tickets->groupBy(fn($ticket) => $ticket->play->movie->movieName ?? 'Unknown')
                                   ->map(fn($tickets) => $tickets->count());

        return view('report.index', compact('user', 'tickets', 'totalTickets', 'totalMovies', 'ticketsPerMovie'));
    }
}
