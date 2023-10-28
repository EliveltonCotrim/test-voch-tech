<?php

namespace App\Services;

use App\Models\Colaborador;
use App\Src\Utils\Utils;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ColaboradorService
{
    public function __construct(public Colaborador $colaborador)
    {

    }


    public function store($request): void
    {
        $dados = [
            'nome' => $request->nome,
            'cpf' => Utils::removeCaracters($request->cpf),
            'email' => $request->email,
            'unidade_id' => $request->unidade_id,
        ];

        $colaborador = $this->colaborador->create($dados);
        $colaborador->cargoColaborador()->create(['cargo_id' => $request->cargo_id, 'colaborador_id' => $colaborador->id]);
    }

    public function updateNotaDesempenho($nota, Colaborador $colaborador): void
    {
        $colaborador->cargoColaborador()->update(['nota_desempenho' => $nota]);
    }

    /**
     *  Pesquisar colaboradores por unidade, cargo e nota de desempenho.
     *
     * @param array $dados
     * Exemplo: ['unidade_id' => 1, 'cargo_id' => 1, 'nota' => 'desc']
     * @return Builder[]|Collection|LengthAwarePaginator
     */
    public static function searchColaboradores(array $dados): Collection|LengthAwarePaginator
    {
        return Colaborador::join('cargo_colaborador', 'colaboradors.id', '=', 'cargo_colaborador.colaborador_id')
            ->join('cargos', 'cargo_colaborador.cargo_id', '=', 'cargos.id')
            ->join('unidades', 'colaboradors.unidade_id', '=', 'unidades.id')
            ->select('colaboradors.*', 'cargo_colaborador.nota_desempenho', 'cargos.cargo', 'unidades.nome_fantasia')
            ->when(isset($dados['unidade_id']), function ($query) use ($dados) {
                $query->where('colaboradors.unidade_id', $dados['unidade_id']);

            })->when(isset($dados['cargo_id']), function ($query) use ($dados) {
                $query->where('cargo_colaborador.cargo_id', $dados['cargo_id']);

            })->when(isset($dados['nota']), function ($query) use ($dados) {

                $query->orderBy('cargo_colaborador.nota_desempenho', $dados['nota']);

            }, function ($query) {
                $query->orderBy('colaboradors.nome');

            })->paginate(8);
    }
}
