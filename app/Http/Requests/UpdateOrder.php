<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrder extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_email' => 'required|email|max:255',
            'partner_id' => 'required|exists:partners,id',
            'status'       => ['required', Rule::in([0, 10, 20])]
        ];
    }
}
