<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //TODO: Add Gate for permisisons here
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        dd($request->all());

        return [
            'invoice_number' => ['required', 'string', 'max:255', 'unique:' . Invoice::class],
            'invoice_date' => ['required', 'date'],
            'invoice_terms' => ['string', 'max:2000'],
            'invoice_conditions' => ['string', 'max:2000'],
            'invoice_notes' => ['string', 'max:2000'],

            'sender_name' => ['required', 'string', 'max:255'],
            'sender_business_name' => ['string', 'max:255'],
            'sender_email' => ['required', 'lowercase', 'email:rfc,dns', 'max:255'],
            'sender_tel' => ['required', 'string', 'max:25'],
            'sender_website' => ['string', 'max:255'],
            'sender_business_number' => ['string', 'max:255'],

            'client_name' => ['required', 'string', 'max:255'],
            'client_email' => ['required', 'email, rfc,dns', 'max:255'],
            'client_tel' => ['required', 'string', 'max:25'],
            'client_business_number' => ['string', 'max:255'],

            'item.*.name' => ['required', 'string', 'max:255'],
            'item.*.description' => ['string', 'max:255'],
            'item.*.quantity' => ['required', 'numeric'],
            'item.*.price' => ['required', 'decimal:0,2'],
            'item.*.discount' => ['required', 'numeric', 'gte:0', 'lte:100'],
            'item.*.shipping' => ['required', 'decimal:0,2'],

            'grand_total' => ['required'],
        ];
    }
}
