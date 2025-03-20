<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVisaTypesRequest;
use App\Http\Requests\UpdateVisaTypesRequest;
use App\Models\VisaTypes;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VisaTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $visaTypes = VisaTypes::paginate(10);
        
        return view('visa-types.index', compact('visaTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('visa-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisaTypesRequest $request): RedirectResponse
    {
        VisaTypes::create($request->validated());

        return redirect()->route('visa-types.index')
            ->with('success', 'Visa type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisaTypes $visaType): View
    {
        return view('visa-types.show', compact('visaType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisaTypes $visaType): View
    {
        return view('visa-types.edit', compact('visaType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisaTypesRequest $request, VisaTypes $visaType): RedirectResponse
    {
        $visaType->update($request->validated());

        return redirect()->route('visa-types.index')
            ->with('success', 'Visa type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisaTypes $visaType): RedirectResponse
    {
        $visaType->delete();

        return redirect()->route('visa-types.index')
            ->with('success', 'Visa type deleted successfully.');
    }
}
