<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgentSaleRequest;
use App\Http\Requests\StoreRefundRequest;
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

class RefundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $agentSales = AgentSale::with(['creditType', 'airline', 'gds', 'pcc', 'visaType', 'user'])
                ->where('type', 'refund')
                ->orderBy('id', 'DESC')
                ->paginate(10);
        } else {
            $agentSales = AgentSale::where('user_id', Auth::id())
                ->with(['creditType', 'airline', 'gds', 'pcc', 'visaType'])
                ->where('type', 'refund')
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }
        return view('refund.index', compact('agentSales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $agentSale = AgentSale::where('user_id', Auth::id())->get(['id', 'pnr_number']);
        return view('refund.create', compact('agentSale'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRefundRequest $request): RedirectResponse
    {
        $data = $request->validated();
        AgentSale::where('id', $data['pnr_number'])->update([
            'type' => 'refund',
        ]);

        return redirect()->route('refund.index')
            ->with('success', 'Added Refund.');
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
