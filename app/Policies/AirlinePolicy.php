<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Airline;
use App\Models\Airlines;

class AirlinePolicy
{
    /**
     * Allow all users to view the list of airlines.
     */
    public function viewAny(?User $user): bool
    {
        return true; // Public access
    }

    /**
     * Determine if the user can create an airline.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine if the user can update an airline.
     */
    public function update(User $user, Airlines $airline): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine if the user can delete an airline.
     */
    public function delete(User $user, Airlines $airline): bool
    {
        return $user->role === 'admin';
    }
}
