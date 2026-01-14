<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Cinema;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $halls = Hall::with('cinema')->latest()->get();
        return view('halls.index', compact('halls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cinemas = Cinema::all();
        return view('halls.create', compact('cinemas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHallRequest $request)
    {
        $data = $request->validated();

        Hall::create($data);

        return redirect()->route('halls.index')->with('status', 'Hall created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        return view('halls.show', compact('hall'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hall $hall)
    {
        $cinemas = Cinema::all();
        return view('halls.edit', compact('hall', 'cinemas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHallRequest $request, Hall $hall)
    {
        $data = $request->validated();

        $hall->update($data);

        return redirect()->route('halls.show', $hall)->with('status', 'Hall updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        $hall->delete();
        return redirect()->route('halls.index')->with('status', 'Hall deleted.');
    }
}
