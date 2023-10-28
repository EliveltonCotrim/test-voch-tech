<?php

namespace App\Http\Livewire;

use App\Models\Colaborador;
use App\Services\ColaboradorService;
use Livewire\Component;
use Livewire\WithPagination;

class RankingColaboradorRelatorio extends Component
{
    use WithPagination;

    protected ColaboradorService $colaboradorService;

    public function mount()
    {
        $this->colaboradorService = new ColaboradorService(new Colaborador());
    }

    public function update()
    {
        $this->colaboradorService = new ColaboradorService(new Colaborador());

    }

    public function render()
    {
        return view('livewire.ranking-colaborador-relatorio', [
            'colaboradores' => ColaboradorService::searchColaboradores(['nota' => 'desc'])
        ]);
    }
}
