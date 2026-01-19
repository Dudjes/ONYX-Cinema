<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $user = auth()->user(); //works

        $tickets = $user->tickets()->with('play.movie')->get();

        // Basic stats
        $totalTickets = $tickets->count();
        $totalMovies = Movie::count(); // all movies in db
        $ticketsPerMovie = $tickets->groupBy(fn($ticket) => $ticket->play->movie->movieName ?? 'Unknown')
                                   ->map(fn($tickets) => $tickets->count());

        return view('reports.index', compact('user', 'tickets', 'totalTickets', 'totalMovies', 'ticketsPerMovie'));
    }

    //make pdf
    public function generatePdf()
    {
        $user = auth()->user();

        $tickets = $user->tickets()->with('play.movie', 'play.hall.cinema')->get();

        $totalTickets = $tickets->count();
        $totalMovies = \App\Models\Movie::count();
        $ticketsPerMovie = $tickets->groupBy(fn($ticket) => $ticket->play->movie->movieName ?? 'Unknown')
                                ->map(fn($tickets) => $tickets->count());

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.pdf', [
            'user' => $user,
            'tickets' => $tickets,
            'totalTickets' => $totalTickets,
            'totalMovies' => $totalMovies,
            'ticketsPerMovie' => $ticketsPerMovie,
        ]);

        return $pdf->download('my_report.pdf');
    }

}
