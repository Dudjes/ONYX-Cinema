<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with('genre')->get();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function store(StoreMovieRequest $request)
    {
        $data = $request->validated();

        if (empty($data['genre_id'])) {
            return back()->withErrors(['genre_id' => 'Genre is required'])->withInput();
        }

        $movie = new Movie();
        $movie->movieName = $data['movieName'];
        $movie->description = $data['description'] ?? null;
        $movie->ageRequirement = $data['ageRequirement'];
        $movie->duration = $data['duration'];
        $movie->image = $data['image'] ?? null;
        $movie->genreId = $data['genre_id'];
        $movie->isDeleted = null;

        $movie->save();

        return redirect()->route('movies.index')->with('status', 'Movie created successfully.');
    }

    public function show(Movie $movie)
    {
        $movie->load('genre');
        return view('movies.show', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMovieRequest $request, Movie $movie)
    {
        $data = $request->validated();

        $movie->movieName = $data['movieName'];
        $movie->description = $data['description'] ?? null;
        $movie->ageRequirement = $data['ageRequirement'];
        $movie->duration = $data['duration'];
        $movie->genreId = $data['genre_id'];

        // Remove existing image if requested (checkbox)
        if ($request->has('remove_image')) {
            $movie->image = null;
        }
        else{
            $movie->image = $data['image'];
        }   

       

        $movie->save();

        return redirect()->route('movies.show', $movie)->with('status', 'Movie updated successfully.');
    }
}
