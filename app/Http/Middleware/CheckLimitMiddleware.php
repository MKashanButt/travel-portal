<?php

namespace App\Http\Middleware;

use App\Models\AgentSale;
use App\Models\Limit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLimitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $limit = Limit::whereHas('user', function ($query) {
            $query->where('id', auth()->id());
        })->first();

        $limitUsed = AgentSale::where('user_id', auth()->id())->count('amount');

        $limitUsed = isset($limit->limit) - $limitUsed;

        if (!auth()->user()->isAdmin()) {
            if ($limitUsed >= 0) {
                return $next($request);
            } else {
                abort(403, 'Limit exceeded');
            }
        }
        return $next($request);
    }
}
