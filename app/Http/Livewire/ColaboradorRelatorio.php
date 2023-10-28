<?php

namespace App\Http\Livewire;

use App\Models\Colaborador;
use Livewire\Component;
use Livewire\WithPagination;

class ColaboradorRelatorio extends Component
{
    use WithPagination;

    public $nome;

    public function render()
    {
        $colaboradores = Colaborador::with('cargoColaborador.cargo', 'unidade')
            ->where('nome', 'like', '%' . $this->nome . '%')
            ->orderBy('nome')
            ->paginate(8);

        return view('livewire.colaborador-relatorio', compact('colaboradores'));
    }
}
