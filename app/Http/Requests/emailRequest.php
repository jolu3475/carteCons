<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class emailRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['email', 'unique:verif_emails,email'],
            'token' => ['integer', 'min:1000', 'max:9999'],
        ];
    }
}
