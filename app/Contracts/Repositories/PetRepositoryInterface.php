<?php

namespace App\Contracts\Repositories;

use App\DTOs\PetDetailsDTO;

interface PetRepositoryInterface
{
    public function findAll();

    public function findById(int $id): PetDetailsDTO;
}
