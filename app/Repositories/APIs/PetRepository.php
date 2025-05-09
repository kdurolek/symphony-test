<?php

namespace App\Repositories\APIs;

use App\Contracts\Repositories\PetRepositoryInterface;
use App\DTOs\PetDetailsDTO;
use Http;
use Illuminate\Support\Facades\Cache;

class PetRepository implements PetRepositoryInterface
{
    public function __construct(
        private readonly string $apiUrl,
        private readonly string $apiToken,
    ) {}

    private function getAuthHeaders(): array
    {
        return [
            'x-api-key' => $this->apiToken,
        ];
    }

    public function findAll(): array
    {
        // Cache added as I don't expect response to change often.
        $pets = Cache::remember('pets', 60, function () {
            $response = Http::withHeaders($this->getAuthHeaders())->get($this->apiUrl.'/breeds');
            $response->throw();

            return $response->json();
        });

        return $pets;
    }

    public function findById(int $id): PetDetailsDTO
    {
        $response = Http::withHeaders($this->getAuthHeaders())
            ->withUrlParameters(['id' => $id])
            ->get($this->apiUrl.'/breeds/{id}');

        $response->throw();
        $pet = $response->json();

        $response = Http::withHeaders($this->getAuthHeaders())
            ->withUrlParameters(['imageId' => $pet['reference_image_id']])
            ->get($this->apiUrl.'/images/{imageId}');

        $response->throw();
        $image = $response->json();

        return new PetDetailsDTO(
            $pet['name'],
            $pet['bred_for'] ?? null,
            $pet['breed_group'] ?? null,
            $pet['life_span'] ?? null,
            $pet['temperament'] ?? null,
            $pet['origin'] ?? null,
            $image['url'],
        );
    }
}
