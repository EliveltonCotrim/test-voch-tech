<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCargoRequest;
use App\Models\Cargo;
use App\Services\CargoService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CargoController extends Controller
{
    public function __construct(public Cargo $cargo, public CargoService $cargoService)
    {

    }

    public function index(): View
    {
        return view('cargo.cargo-index', ['cargos' => $this->cargo->get()]);
    }

    public function create(): View
    {
        return view('cargo.cargo-create');
    }

    public function store(CreateCargoRequest $request): RedirectResponse
    {
        $this->cargoService->store($request);

        return redirect()->route('cargos.index')->with('success', 'Cargo cadastrado com sucesso!');
    }

}
