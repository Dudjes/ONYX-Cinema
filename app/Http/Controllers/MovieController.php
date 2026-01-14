<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $movie->genreId = $data['genre_id'];
        $movie->isDeleted = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('movies', 'public');
            $movie->image = $path;
        }

        $movie->save();

        return redirect()->route('movies.index')->with('status', 'Movie created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $movie->load('genre');
        return view('movies.show', compact('movie'));
    }
}
