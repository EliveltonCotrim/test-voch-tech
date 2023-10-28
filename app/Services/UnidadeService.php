<?php

namespace App\Services;

use App\Models\Unidade;
use App\Src\Utils\Utils;

class UnidadeService
{
    public function __construct(public Unidade $unidade)
    {

    }
    public function store($request): void
    {
        $dados = [
            'cnpj' => Utils::removeCaracters($request->cnpj),
            'razao_social' => $request->razao_social,
            'nome_fantasia' => $request->nome_fantasia,
        ];

        $this->unidade->create($dados);
    }
}
