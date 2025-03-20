<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAirlinesRequest;
use App\Http\Requests\UpdateAirlinesRequest;
use App\Models\Airlines;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AirlinesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $airlines = Airlines::paginate(10);

        return view('airlines.index', compact('airlines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('airlines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAirlinesRequest $request): RedirectResponse
    {
        Airlines::create($request->validated());

        return redirect()->route('airlines.index')
            ->with('success', 'Airline created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Airlines $airline): View
    {
        return view('airlines.show', compact('airline'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Airlines $airline): View
    {
        return view('airlines.edit', compact('airline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAirlinesRequest $request, Airlines $airline): RedirectResponse
    {
        $airline->update($request->validated());

        return redirect()->route('airlines.index')
            ->with('success', 'Airline updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airlines $airline): RedirectResponse
    {
        $airline->delete();

        return redirect()->route('airlines.index')
            ->with('success', 'Airline deleted successfully.');
    }
}
