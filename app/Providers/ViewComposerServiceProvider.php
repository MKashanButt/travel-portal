<?php

namespace App\Providers;

use App\Models\AgentSale;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Limit;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();

                // Share user limits with all views
                $view->with([
                    'limit' =>
                    $user->isAdmin()
                        ? null
                        : Limit::where('user_id', $user->id)->pluck('limit')->first(),
                    'limit_used' => $user->isAdmin()
                        ? null
                        : AgentSale::where('user_id', $user->id)->count('amount'),
                ]);
            }
        });
    }
}
