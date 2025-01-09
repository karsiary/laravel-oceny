<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Pole imię jest wymagane.',
            'name.max' => 'Imię nie może być dłuższe niż 255 znaków.',
            'surname.required' => 'Pole nazwisko jest wymagane.',
            'surname.max' => 'Nazwisko nie może być dłuższe niż 255 znaków.',
        ];
    }
} 