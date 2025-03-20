<?php

namespace App\Http\Controllers;

use App\Models\AgentSale;
use App\Models\Airlines;
use App\Models\Gds;
use App\Models\Pcc;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $stats = [
                'total_sales' => AgentSale::count(),
                'total_airlines' => Airlines::count(),
                'total_gds' => Gds::count(),
                'total_pccs' => Pcc::count(),
            ];

            $recentSales = AgentSale::with(['airline', 'gds', 'pcc'])
                ->latest()
                ->take(5)
                ->get();
        } else {
            $stats = [
                'total_sales' => AgentSale::where("user_id", Auth::id())->count(),
                'total_airlines' => Airlines::count(),
                'total_gds' => Gds::count(),
                'total_pccs' => Pcc::where("user_id", Auth::id())->count(),
            ];

            $recentSales = AgentSale::where("user_id", Auth::id())->with(['airline', 'gds', 'pcc'])
                ->latest()
                ->take(5)
                ->get();
        }

        return view('dashboard', compact('stats', 'recentSales'));
    }
}
