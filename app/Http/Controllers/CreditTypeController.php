<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreditTypeRequest;
use App\Http\Requests\UpdateCreditTypeRequest;
use App\Models\CreditType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CreditTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $creditTypes = CreditType::paginate(10);
        
        return view('credit-types.index', compact('creditTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('credit-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreditTypeRequest $request): RedirectResponse
    {
        CreditType::create($request->validated());

        return redirect()->route('credit-types.index')
            ->with('success', 'Credit type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CreditType $creditType): View
    {
        return view('credit-types.show', compact('creditType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CreditType $creditType): View
    {
        return view('credit-types.edit', compact('creditType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCreditTypeRequest $request, CreditType $creditType): RedirectResponse
    {
        $creditType->update($request->validated());

        return redirect()->route('credit-types.index')
            ->with('success', 'Credit type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreditType $creditType): RedirectResponse
    {
        $creditType->delete();

        return redirect()->route('credit-types.index')
            ->with('success', 'Credit type deleted successfully.');
    }
}
