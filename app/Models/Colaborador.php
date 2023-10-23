<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colaborador extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nome', 'cpf', 'email', 'unidade_id'];

    public function unidade(): BelongsTo
    {
        return $this->belongsTo(Unidade::class);
    }

    public function cargos(): BelongsToMany
    {
        return $this->belongsToMany(Cargo::class)->using(CargoColaborador::class)
            ->withPivot('nota_desempenho');
    }
}
