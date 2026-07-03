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
            'tel' => ['nullable', 'string', 'max:50'],
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
            'name.required' => __('ask_modal.error.name_required'),
            'name.max' => __('ask_modal.error.name_max'),
            'email.required' => __('ask_modal.error.email_required'),
            'email.email' => __('ask_modal.error.email_invalid'),
            'email.max' => __('ask_modal.error.email_max'),
            'tel.max' => __('ask_modal.error.tel_max'),
            'question.required' => __('ask_modal.error.question_required'),
            'question.min' => __('ask_modal.error.question_min'),
            'question.max' => __('ask_modal.error.question_max'),
            'section.required' => __('ask_modal.error.section_invalid'),
            'section.in' => __('ask_modal.error.section_invalid'),
        ];
    }
}
