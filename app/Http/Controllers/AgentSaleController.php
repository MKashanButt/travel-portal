<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgentSaleRequest;
use App\Http\Requests\UpdateAgentSaleRequest;
use App\Models\AgentSale;
use App\Models\Airlines;
use App\Models\CreditType;
use App\Models\Gds;
use App\Models\Limit;
use App\Models\Pcc;
use App\Models\VisaTypes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AgentSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $agentSales = AgentSale::with(['creditType', 'airline', 'gds', 'pcc', 'visaType', 'user'])
                ->where('type', 'ticket')
                ->orderBy('id', 'DESC')
                ->paginate(10);
        } else {
            $agentSales = AgentSale::where('user_id', Auth::id())
                ->where('type', 'ticket')
                ->with(['creditType', 'airline', 'gds', 'pcc', 'visaType'])
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }
        return view('agent-sales.index', compact('agentSales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $creditTypes = CreditType::all();
        $airlines = Airlines::all();
        $gdsList = Gds::all();
        $pccs = Auth::user()->isAdmin() ? Pcc::all() : Pcc::where('user_id', Auth::id())->get();
        $visaTypes = VisaTypes::all();

        return view('agent-sales.create', compact('creditTypes', 'airlines', 'gdsList', 'pccs', 'visaTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAgentSaleRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $user = Auth::user();

        // Admins bypass limits
        if ($user->isAdmin()) {
            AgentSale::create($data);
            return redirect()->route('agent-sales.index')
                ->with('success', 'Agent sale created successfully.');
        }

        // Non-admins: enforce limits
        $limit = Limit::where('user_id', $user->id)
            ->first();

        if (!$limit) {
            return redirect()->route('agent-sales.index')
                ->with('danger', 'No limit assigned to your account.');
        }

        $usedLimit = AgentSale::where('user_id', $user->id)
            ->where('type', 'ticket')
            ->sum('amount');
        $remainingLimit = $limit->limit - $usedLimit;

        if ($remainingLimit > 0 && $data['amount'] <= $remainingLimit) {
            AgentSale::create($data);
            return redirect()->route('agent-sales.index')
                ->with('success', 'Agent sale created successfully.');
        }

        return redirect()->route('agent-sales.index')
            ->with('error', 'Limit exceeded.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AgentSale $agentSale): View
    {
        return view('agent-sales.show', [
            'agentSale' => $agentSale->load(['creditType', 'airline', 'gds', 'pcc', 'visaType', 'user'])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgentSale $agentSale): View
    {
        $creditTypes = CreditType::all();
        $airlines = Airlines::all();
        $gdsList = Gds::all();
        $pccs = Pcc::all();
        $visaTypes = VisaTypes::all();

        return view('agent-sales.edit', compact('agentSale', 'creditTypes', 'airlines', 'gdsList', 'pccs', 'visaTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAgentSaleRequest $request, AgentSale $agentSale): RedirectResponse
    {
        $agentSale->update($request->validated());

        return redirect()->route('agent-sales.index')
            ->with('success', 'Agent sale updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgentSale $agentSale): RedirectResponse
    {
        $agentSale->delete();

        return redirect()->route('agent-sales.index')
            ->with('success', 'Agent sale deleted successfully.');
    }
}
