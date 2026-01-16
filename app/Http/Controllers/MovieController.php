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
    public function index(Request $request)
    {
        $query = Movie::with('genres');

        // Filter by genre
        if ($request->filled('genre')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->where('genres.genreId', $request->genre);
            });
        }

        // Filter by age requirement
        if ($request->filled('age')) {
            $query->where('ageRequirement', '<=', $request->age);
        }

        // Filter by price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter by cinema (through plays relationship)
        if ($request->filled('cinema')) {
            $query->whereHas('plays', function ($q) use ($request) {
                $q->where('plays.cinemaId', $request->cinema);
            });
        }

        // Sorting
        $sortBy = $request->get('sort', 'movieName');
        $sortOrder = $request->get('order', 'asc');

        switch ($sortBy) {
            case 'price':
                $query->orderBy('price', $sortOrder);
                break;
            case 'duration':
                $query->orderBy('duration', $sortOrder);
                break;
            case 'age':
                $query->orderBy('ageRequirement', $sortOrder);
                break;
            default:
                $query->orderBy('movieName', $sortOrder);
        }

        $movies = $query->get();

        // Get filter options
        $genres = \App\Models\Genre::all();
        $cinemas = \App\Models\Cinema::all();

        return view('movies.index', compact('movies', 'genres', 'cinemas'));
    }

    public function dashboard()
    {
        $movies = Movie::with('genres')->get();
        return view('movies.dashboard', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(StoreMovieRequest $request)
    {
        $data = $request->validated();
        $genreIds = isset($data['genre_id']) ? (array) $data['genre_id'] : [];
        if (empty($genreIds)) {
            return back()->withErrors(['genre_id' => 'Genre is required'])->withInput();
        }

        $movie = Movie::create([
            'movieName' => $data['movieName'],
            'description' => $data['description'] ?? null,
            'ageRequirement' => $data['ageRequirement'],
            'duration' => $data['duration'],
            'image' => $data['image'] ?? null,
            'price' => $data['price'] ?? null,
            // keep a primary genre on the movies table for compatibility
            'genreId' => $genreIds[0] ?? null,
            'isDeleted' => null,
        ]);

        $movie->genres()->attach($genreIds); // attach one or more

        return redirect()->route('movies.index')->with('status', 'Movie created successfully.');
    }

    public function show(Movie $movie)
    {
        $movie->load([
            'genres',
            'plays.cinema',
            'plays.hall',
        ]);

        return view('movies.show', compact('movie'));
    }


    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(StoreMovieRequest $request, Movie $movie)
    {
        $data = $request->validated();

        $genreIds = isset($data['genre_id']) ? (array) $data['genre_id'] : [];

        $movie->update([
            'movieName' => $data['movieName'],
            'description' => $data['description'] ?? null,
            'ageRequirement' => $data['ageRequirement'],
            'duration' => $data['duration'],
            'price' => $data['price'] ?? null,
            'image' => $request->has('remove_image') ? null : ($data['image'] ?? $movie->image),
            'genreId' => $genreIds[0] ?? $movie->genreId,
        ]);

        $movie->genres()->sync($genreIds);

        return redirect()->route('movies.show', $movie)->with('status', 'Movie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->back()->with('status', 'Movie deleted.');
    }
}
