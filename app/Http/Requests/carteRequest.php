<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
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
            'nom' => ['required', 'string'],
            'prenom' => ['required', 'string'],
            'dateNais' => ['required', 'date'],
            'lieuNais' => ['required', 'string'],
            'sitMat' => ['required', 'string'],
            'proffession' => ['required', 'string'],
            'nbEnf' => ['integer'],
            'adr' => ['required', 'string'],
            'pays' => ['required', 'string'],
            'tel' => ['required', 'string', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'numPass' => ['required', 'string'],
            'expPass' => ['required', 'date'],
            'arrExt' => ['required', 'date'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Hash::make(Str::slug($this->nom . '-' . $this->prenom)),
        ]);
    }
}
