<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'gdpr' => ['accepted'],
            // Honeypot: must stay empty. Bots tend to fill every field.
            'website' => ['nullable', 'prohibited'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Numele este obligatoriu.',
            'name.max' => 'Numele este prea lung.',
            'email.required' => 'Adresa de email este obligatorie.',
            'email.email' => 'Adresa de email nu este validă.',
            'email.max' => 'Adresa de email este prea lungă.',
            'message.required' => 'Mesajul este obligatoriu.',
            'message.min' => 'Mesajul este prea scurt.',
            'message.max' => 'Mesajul este prea lung.',
            'gdpr.accepted' => 'Trebuie să fii de acord cu prelucrarea datelor personale.',
        ];
    }
}
