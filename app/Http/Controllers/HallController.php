<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Cinema;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;

class HallController extends Controller
{
    public function index()
    {
        $halls = Hall::with('cinema')->latest()->get();
        return view('halls.index', compact('halls'));
    }

    public function create()
    {
        $cinemas = Cinema::all();
        return view('halls.create', compact('cinemas'));
    }

    public function store(StoreHallRequest $request)
    {
        $data = $request->validated();

        Hall::create($data);

        return redirect()->route('halls.index')->with('status', 'Hall created.');
    }

    public function show(Hall $hall)
    {
        return view('halls.show', compact('hall'));
    }

    public function edit(Hall $hall)
    {
        $cinemas = Cinema::all();
        return view('halls.edit', compact('hall', 'cinemas'));
    }

    public function update(UpdateHallRequest $request, Hall $hall)
    {
        $data = $request->validated();

        $hall->update($data);

        return redirect()->route('halls.show', $hall)->with('status', 'Hall updated.');
    }

    public function destroy(Hall $hall)
    {
        $hall->delete();
        return redirect()->route('halls.index')->with('status', 'Hall deleted.');
    }
}
