<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreAgentSaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'credit_type_id' => ['nullable', 'exists:credit_types,id'],
            'airline_id' => ['nullable', 'exists:airlines,id'],
            'gds_id' => ['nullable', 'exists:gds,id'],
            'pcc_id' => ['nullable', 'exists:pccs,id'],
            'pnr_number' => ['required', 'string', 'max:255'],
            'pax_name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'string', 'max:255'],
            'time_limit' => ['nullable', 'string', 'max:255'],
            'visa_type_id' => ['nullable', 'exists:visa_types,id'],
            'comment' => ['nullable', 'string', 'max:255'],
        ];
    }
}
