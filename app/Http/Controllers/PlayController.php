<?php

namespace App\Http\Controllers;

use App\Models\Play as PlayModel;
use App\Models\Movie;
use App\Models\Hall;
use App\Models\Cinema;
use App\Http\Requests\StorePlayRequest;
use App\Http\Requests\UpdatePlayRequest;

class PlayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plays = PlayModel::with(['movie', 'hall', 'cinema'])->latest()->get();
        return view('plays.index', compact('plays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::all();
        $halls = Hall::all();
        $cinemas = Cinema::all();
        return view('plays.create', compact('movies', 'halls', 'cinemas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayRequest $request)
    {
        $data = $request->validated();

        PlayModel::create($data);

        return redirect()->route('plays.index')->with('status', 'Play created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Play $play)
    {
        return view('plays.show', compact('play'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Play $play)
    {
        $movies = Movie::all();
        $halls = Hall::all();
        $cinemas = Cinema::all();
        return view('plays.edit', compact('play', 'movies', 'halls', 'cinemas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayRequest $request, Play $play)
    {
        $data = $request->validated();

        $play->update($data);

        return redirect()->route('plays.show', $play)->with('status', 'Play updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(play $play)
    {
        $play->delete();
        return redirect()->route('plays.index')->with('status', 'Play deleted.');
    }
}
