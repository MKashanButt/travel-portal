<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgentSale extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'agent_sale';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'credit_type_id',
        'airline_id',
        'gds_id',
        'pcc_id',
        'pnr_number',
        'pax_name',
        'amount',
        'time_limit',
        'visa_type_id',
        'comment',
        'user_id',
        'status',
        'type',
    ];

    /**
     * Get the credit type associated with the agent sale.
     */
    public function creditType(): BelongsTo
    {
        return $this->belongsTo(CreditType::class);
    }

    /**
     * Get the airline associated with the agent sale.
     */
    public function airline(): BelongsTo
    {
        return $this->belongsTo(Airlines::class, 'airline_id');
    }

    /**
     * Get the GDS associated with the agent sale.
     */
    public function gds(): BelongsTo
    {
        return $this->belongsTo(Gds::class);
    }

    /**
     * Get the PCC associated with the agent sale.
     */
    public function pcc(): BelongsTo
    {
        return $this->belongsTo(Pcc::class);
    }

    /**
     * Get the visa type associated with the agent sale.
     */
    public function visaType(): BelongsTo
    {
        return $this->belongsTo(VisaTypes::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
