<?php

namespace App\Http\Requests;

use App\Models\Unidade;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateUnidadeRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255|unique:unidades',
            'cnpj' => ['required', 'string', 'max:18', 'formato_cnpj', 'cnpj',
                function ($attribute, $value, $fail) {
                    $cnpj = $value;

                    $cnpjFormatado = preg_replace('/[^0-9]/im', '', $cnpj);

                    $query = Unidade::where('cnpj', $cnpjFormatado);
                    $exists = $query->exists();

                    // Validação unique
                    if ($exists) {
                        $fail('O CNPJ já está em uso.');
                    }
                },
            ],
        ];
    }
}
