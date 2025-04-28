<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLimitRequest;
use App\Http\Requests\UpdatelimitRequest;
use App\Models\Limit;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LimitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $data = Limit::orderBy("id", "desc")->paginate(10);
        return view("limit.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::whereHas('role', function ($query) {
            $query->where('name', '!=', 'admin');
        })
            ->orderBy("id", "desc")
            ->get();
        return view("limit.create", compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLimitRequest $request): RedirectResponse
    {
        Limit::create($request->validated());

        return redirect()
            ->route("limit.index")
            ->with("success", "Limit created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Limit $limit): View
    {
        return view("limit.show", compact("limit"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Limit $limit): View
    {
        $users = User::whereHas('role', function ($query) {
            $query->where('name', '!=', 'admin');
        })
            ->orderBy("id", "desc")
            ->get();

        return view("limit.edit", compact("limit", "users"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelimitRequest $request, Limit $limit): RedirectResponse
    {
        $limit->update($request->validated());

        return redirect()
            ->route("limit.index")
            ->with("success", "Limit updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Limit $limit): RedirectResponse
    {
        $limit->delete();

        return redirect()
            ->route("limit.index")
            ->with("success", "Limit deleted successfully.");
    }
}
