<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookSessionRequest extends FormRequest
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
            'phone' => ['required', 'string', 'max:50'],
            'question' => ['nullable', 'string', 'max:5000'],
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
            'name.required' => __('modal_book.error.name_required'),
            'name.max' => __('modal_book.error.name_max'),
            'email.required' => __('modal_book.error.email_required'),
            'email.email' => __('modal_book.error.email_invalid'),
            'email.max' => __('modal_book.error.email_max'),
            'phone.required' => __('modal_book.error.phone_required'),
            'phone.max' => __('modal_book.error.tel_max'),
            'question.max' => __('modal_book.error.question_max'),
            'section.required' => __('modal_book.error.section_invalid'),
            'section.in' => __('modal_book.error.section_invalid'),
        ];
    }
}
