<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class carteRequest extends FormRequest
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
            'nom' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'prenom' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'dateNais' => ['required', 'date', 'before:today'],
            'lieuNais' => ['required', 'string'],
            'sitMat' => ['required', 'string'],
            'proffession' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'nbEnf' => ['integer'],
            'adr' => ['required', 'string'],
            'codePays' => ['required', 'string'],
            'tel' => ['required', 'string', 'regex:/^[\d]{5,15}$/', ],
            'numPass' => ['required', 'string', 'regex:/^(MG)[0-9]{7}$/', Rule::unique('regulars')->ignore(session('id'), 'id')],
            'expPass' => ['required', 'date', 'after:today'],
            'arrExt' => ['required', 'date', 'before:today'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Hash::make(Str::slug($this->nom . '-' . $this->prenom)),
        ]);
    }
}
