<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VisaTypes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'types'
    ];

    /**
     * Get the agent sales for this visa type.
     */
    public function agentSales(): HasMany
    {
        return $this->hasMany(AgentSale::class, 'visa_type_id');
    }
}
