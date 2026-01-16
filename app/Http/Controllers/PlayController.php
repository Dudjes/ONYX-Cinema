<?php

namespace App\Http\Controllers;

use App\Models\Play;
use App\Models\Movie;
use App\Models\Hall;
use App\Models\Cinema;
use App\Http\Requests\StorePlayRequest;
use App\Http\Requests\UpdatePlayRequest;

class PlayController extends Controller
{
    public function index()
    {
        $plays = Play::with(['movie', 'hall', 'cinema', 'tickets'])->latest()->get();

        return view('plays.index', compact('plays'));
    }

    public function create()
    {
        $movies = Movie::all();
        $halls = Hall::all();
        $cinemas = Cinema::all();

        return view('plays.create', compact('movies', 'halls', 'cinemas'));
    }

    public function store(StorePlayRequest $request)
    {
        $data = $request->validated();

        Play::create($data);

        return redirect()->route('plays.index')->with('status', 'Play created.');
    }

    public function show(Play $play)
    {
        return view('plays.show', compact('play'));
    }

    public function edit(Play $play)
    {
        $movies = Movie::all();
        $halls = Hall::all();
        $cinemas = Cinema::all();

        return view('plays.edit', compact('play', 'movies', 'halls', 'cinemas'));
    }

    public function update(UpdatePlayRequest $request, Play $play)
    {
        $data = $request->validated();

        $play->update($data);

        return redirect()->route('plays.show', $play)->with('status', 'Play updated.');
    }

    public function destroy(Play $play)
    {
        $play->delete();

        return redirect()->route('plays.index')->with('status', 'Play deleted.');
    }
}
