<?php

namespace App\Services;

use App\Models\Cargo;

class CargoService
{
    public function __construct(public Cargo $cargo)
    {

    }

    public function store($request): void
    {
        $this->cargo->create($request->only('cargo'));
    }
}
