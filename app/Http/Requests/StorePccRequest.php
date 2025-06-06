<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePccRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:255', 'unique:pccs,code'],
            'user_id' => ['required', 'string', 'max:255']
        ];
    }
}
