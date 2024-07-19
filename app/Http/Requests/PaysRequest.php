<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PaysRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:2', Rule::unique('pays')->ignore($this->code, 'code'),'uppercase'],
            'nom' => ['required', 'string', 'max:255', Rule::unique('pays')->ignore( $this->code, 'code')],
            'indicatif' => ['required', 'string', 'max:4', 'min:4'],
        ];
    }
}
