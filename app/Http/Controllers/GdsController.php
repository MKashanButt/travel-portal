<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGdsRequest;
use App\Http\Requests\UpdateGdsRequest;
use App\Models\Gds;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GdsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $gdsList = Gds::paginate(10);

        return view('gds.index', compact('gdsList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('gds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGdsRequest $request): RedirectResponse
    {
        Gds::create($request->validated());

        return redirect()->route('gds.index')
            ->with('success', 'GDS created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gds $gds): View
    {
        return view('gds.show', compact('gds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gds $gds): View
    {
        return view('gds.edit', compact('gds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGdsRequest $request, Gds $gds): RedirectResponse
    {
        $gds->update($request->validated());

        return redirect()->route('gds.index')
            ->with('success', 'GDS updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gds $gds): RedirectResponse
    {
        $gds->delete();

        return redirect()->route('gds.index')
            ->with('success', 'GDS deleted successfully.');
    }
}
