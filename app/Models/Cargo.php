<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cargo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['cargo'];

    public function colaboradores(): BelongsToMany
    {
        return $this->belongsToMany(Colaborador::class)->using(CargoColaborador::class)
            ->withPivot('nota_desempenho');
    }
}
