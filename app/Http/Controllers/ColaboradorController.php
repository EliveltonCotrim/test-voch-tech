<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateColaboadorRequest;
use App\Http\Requests\SearchColaboratorRequest;
use App\Http\Requests\UpdateColaboradorRequest;
use App\Models\Cargo;
use App\Models\Colaborador;
use App\Models\Unidade;
use App\Services\ColaboradorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ColaboradorController extends Controller
{
    public function __construct(
        public Colaborador        $colaborador,
        public ColaboradorService $colaboradorService)
    {

    }

    public function index(): View
    {
        return view('colaborador.colaborador-index', [
            'colaboradores' => $this->colaborador->with('cargoColaborador.cargo', 'unidade')->orderBy('nome')->paginate(8),
            'cargos' => Cargo::orderBy('cargo')->get(),
            'unidades' => Unidade::orderBy('nome_fantasia')->get()
        ]);
    }

    public function create(): View
    {
        return view('colaborador.colaborador-create', [
            'uniades' => Unidade::orderBy('nome_fantasia')->get(),
            'cargos' => Cargo::orderBy('cargo')->get()
        ]);
    }

    public function store(CreateColaboadorRequest $request): RedirectResponse
    {
        $this->colaboradorService->store($request);

        return redirect()->route('colaboradores.index')->with('success', 'Colaborador cadastrado com sucesso!');
    }

    public function edit(Colaborador $colaborador): View
    {
        return view('colaborador.colaborador-edit', compact('colaborador'));
    }

    public function update(UpdateColaboradorRequest $request, Colaborador $colaborador): RedirectResponse
    {
        $this->colaboradorService->updateNotaDesempenho($request->nota_desempenho, $colaborador);

        return redirect()->route('colaboradores.index')->with('success', 'Colaborador atualizado com sucesso!');
    }

    public function search(SearchColaboratorRequest $request): View
    {
        $filters = $request->except('_token');
        $colaboradores = $this->colaboradorService->searchColaboradores($filters);

        return view('colaborador.colaborador-index', [
            'colaboradores' => $colaboradores,
            'cargos' => Cargo::orderBy('cargo')->get(),
            'unidades' => Unidade::orderBy('nome_fantasia')->get(),
            'filters' => $filters
        ]);
    }
}
