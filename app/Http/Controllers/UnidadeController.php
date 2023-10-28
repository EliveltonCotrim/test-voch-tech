<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUnidadeRequest;
use App\Models\Unidade;
use App\Services\UnidadeService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UnidadeController extends Controller
{
    public function __construct(
        public Unidade        $unidade,
        public UnidadeService $unidadeService
    )
    {

    }

    public function index(): View
    {
        return view('unidade.index-unidade', ['unidades' => $this->unidade->paginate(10)]);
    }

    public function create(): View
    {
        return view('unidade.create-unidade');
    }

    public function store(CreateUnidadeRequest $request): RedirectResponse
    {
        $this->unidadeService->store($request);

        return redirect()->route('unidades.index')->with('success', 'Unidade cadastrada com sucesso!');
    }
}
