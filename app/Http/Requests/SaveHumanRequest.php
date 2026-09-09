<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SaveHumanRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:255',
            'aura' => 'required|integer|min:0|max:1000000',
            'category' => 'required|in:common,moderate,legendary',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El humano debe tener obligatoriamente un nombre definido.',
            'aura.min' => 'El humano no puede tener niveles de aura negativos.',
            'aura.max' => 'El humano es demasiado poderoso y rompe el balance del ecosistema de aura (Max 1000).',
            'category.in' => 'La categoría seleccionada está adulterada.',
        ];
    }
}
