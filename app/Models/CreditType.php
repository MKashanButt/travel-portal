<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CreditType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the agent sales for this credit type.
     */
    public function agentSales(): HasMany
    {
        return $this->hasMany(AgentSale::class);
    }
}
