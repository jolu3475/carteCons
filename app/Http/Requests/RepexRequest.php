<?php

namespace App\Http\Requests;

/* use Illuminate\Validation\Rule; */
use Illuminate\Foundation\Http\FormRequest;

class RepexRequest extends FormRequest
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
                'label' => ['required', 'string', 'max:255'/* , Rule::unique('repex')->ignore($this->repex) */],
                'codePays' => ['required', 'string' , 'max:2'/* , Rule::unique('repex')->ignore($this->repex) */],
                'adr' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
        ];
    }
}
