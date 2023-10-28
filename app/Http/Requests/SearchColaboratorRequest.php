<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchColaboratorRequest extends FormRequest
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
            'unidade_id' => 'nullable|numeric|exists:unidades,id',
            'nota' => 'nullable|string|in:ASC,DESC',
            'cargo_id' => 'nullable|numeric|exists:cargos,id'
        ];
    }
}
