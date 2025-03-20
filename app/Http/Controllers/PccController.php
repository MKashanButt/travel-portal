<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePccRequest;
use App\Http\Requests\UpdatePccRequest;
use App\Models\Pcc;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PccController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pccs = Pcc::with('user')->paginate(10);

        return view('pccs.index', compact('pccs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::all();
        return view('pccs.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePccRequest $request): RedirectResponse
    {
        Pcc::create($request->validated());

        return redirect()->route('pccs.index')
            ->with('success', 'PCC created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pcc $pcc): View
    {
        $pcc->load('user');
        return view('pccs.show', compact('pcc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pcc $pcc): View
    {
        $users = User::all();
        return view('pccs.edit', compact('pcc', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePccRequest $request, Pcc $pcc): RedirectResponse
    {
        $pcc->update($request->validated());

        return redirect()->route('pccs.index')
            ->with('success', 'PCC updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pcc $pcc): RedirectResponse
    {
        $pcc->delete();

        return redirect()->route('pccs.index')
            ->with('success', 'PCC deleted successfully.');
    }
}
