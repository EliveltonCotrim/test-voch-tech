<?php

namespace App\Http\Livewire;

use App\Models\Colaborador;
use App\Models\Unidade;
use Livewire\Component;
use Livewire\WithPagination;

class ColaboradorUnidadeRelatorio extends Component
{
    use WithPagination;

    public $unidade_id;
    public $unidades_filtro;

    public function mount()
    {
        $this->unidades_filtro = Unidade::orderBy('nome_fantasia')->get();
    }

    public function render()
    {
        return view('livewire.colaborador-unidade-relatorio', [
            'unidades' => Unidade::with('colaboradores')->orderBy('nome_fantasia')->when($this->unidade_id, function ($query) {
                $query->where('id', $this->unidade_id);
            })->orderBy('nome_fantasia')->paginate(8)]);

    }
}
