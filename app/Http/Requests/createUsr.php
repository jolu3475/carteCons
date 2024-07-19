<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class createUsr extends FormRequest
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
            'email' => ['required', 'email', 'unique:users'],
            'repex_id' => ['required', 'exists:repexes,id', 'integer'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => 'User',
            'role' => false,
            'slug' => Hash::make(Str::slug($this->email)),
        ]);
    }
}
