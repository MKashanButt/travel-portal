<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Airlines extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'airlines';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'code',
        'name'
    ];

    /**
     * Get the agent sales for this airline.
     */
    public function agentSales(): HasMany
    {
        return $this->hasMany(AgentSale::class, 'airline_id');
    }
}
