<?php

namespace App\Http\Requests;

use App\Models\Colaborador;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateColaboadorRequest extends FormRequest
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
            'unidade_id' => 'required|exists:unidades,id',
            'cargo_id' => 'required|exists:cargos,id',
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:colaboradors,email',
            'cpf' => ['required', 'string', 'max:14', 'formato_cpf', 'cpf',
                function ($attribute, $value, $fail) {
                    $cpf = $value;

                    $cpfFormatado = preg_replace('/[^0-9]/im', '', $cpf);

                    $query = Colaborador::where('cpf', $cpfFormatado);
                    $exists = $query->exists();

                    // Validação unique
                    if ($exists) {
                        $fail('O CPF já está em uso.');
                    }
                }
            ],
        ];
    }
}
