<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FaqAskRequest extends FormRequest
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
            'phone' => ['nullable', 'string', 'max:50'],
            'question' => ['required', 'string', 'min:5', 'max:5000'],
            'section' => ['required', Rule::in(['ib-math'])],
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
            'name.required' => __('modal_ask.error.name_required'),
            'name.max' => __('modal_ask.error.name_max'),
            'email.required' => __('modal_ask.error.email_required'),
            'email.email' => __('modal_ask.error.email_invalid'),
            'email.max' => __('modal_ask.error.email_max'),
            'phone.max' => __('modal_ask.error.phone_max'),
            'question.required' => __('modal_ask.error.question_required'),
            'question.min' => __('modal_ask.error.question_min'),
            'question.max' => __('modal_ask.error.question_max'),
            'section.required' => __('modal_ask.error.section_invalid'),
            'section.in' => __('modal_ask.error.section_invalid'),
        ];
    }
}
