<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVoidRequest;
use App\Models\AgentSale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class VoidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $agentSales = AgentSale::with(['creditType', 'airline', 'gds', 'pcc', 'visaType', 'user'])
                ->where('type', 'void')
                ->orderBy('id', 'DESC')
                ->paginate(10);
        } else {
            $agentSales = AgentSale::where('user_id', Auth::id())
                ->with(['creditType', 'airline', 'gds', 'pcc', 'visaType'])
                ->where('type', 'void')
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }
        return view('void.index', compact('agentSales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $agentSale = AgentSale::where('user_id', Auth::id())->get(['id', 'pnr_number']);
        return view('void.create', compact('agentSale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoidRequest $request): RedirectResponse
    {
        $data = $request->validated();
        AgentSale::where('id', $data['pnr_number'])->update([
            'type' => 'void',
        ]);

        return redirect()->route('void.index')
            ->with('success', 'Added Void.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgentSale $agentSale): RedirectResponse
    {
        $agentSale->delete();

        return redirect()->route('void.index')
            ->with('success', 'Void Ticket deleted successfully.');
    }
}
