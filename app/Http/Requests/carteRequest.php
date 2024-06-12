<?php

namespace App\Http\Requests;

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
            'nom' => ['required', 'string'],
            'prenom' => ['required', 'string'],
            'dateNaiss' => ['required', 'date'],
            'lieuNaiss' => ['required', 'string'],
            'sitMat' => ['required', 'string'],
            'prof' => ['required', 'string'],
            'nbEnf' => ['required', 'integer'],
            'adr' => ['required', 'string'],
            'pays' => ['required', 'string'],
            'numTel' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'email' => ['required', 'email'],
            'numPass' => ['required', 'string'],
            'dateExp' => ['required', 'date'],
            'dateArr' => ['required', 'date'],
            'img' => ['required', 'image', 'mimes:jpg,jpeg', 'max:50000'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Hash::make(Str::slug($this->nom . '-' . $this->prenom)),
        ]);
    }
}
