<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Http\Requests\StoreCinemaRequest;
use App\Http\Requests\UpdateCinemaRequest;

class CinemaController extends Controller
{
    public function index()
    {
        $cinemas = Cinema::latest()->get();
        return view('cinemas.index', compact('cinemas'));
    }

    public function create()
    {
        return view('cinemas.create');
    }

    public function store(StoreCinemaRequest $request)
    {
        $data = $request->validated();

        Cinema::create($data);

        return redirect()->route('cinemas.index')->with('status', 'Cinema created.');
    }

    public function show(Cinema $cinema)
    {
        return view('cinemas.show', compact('cinema'));
    }

    public function edit(Cinema $cinema)
    {
        return view('cinemas.edit', compact('cinema'));
    }

    public function update(UpdateCinemaRequest $request, Cinema $cinema)
    {
        $data = $request->validated();

        $cinema->update($data);

        return redirect()->route('cinemas.show', $cinema)->with('status', 'Cinema updated.');
    }

    public function destroy(Cinema $cinema)
    {
        $cinema->delete();
        return redirect()->route('cinemas.index')->with('status', 'Cinema deleted.');
    }
}
