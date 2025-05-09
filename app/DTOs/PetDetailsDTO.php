<?php

namespace App\DTOs;

class PetDetailsDTO
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $bredFor,
        public readonly ?string $breedGroup,
        public readonly ?string $lifeSpan,
        public readonly ?string $temperament,
        public readonly ?string $origin,
        public readonly string $image,
    ) {}
}
