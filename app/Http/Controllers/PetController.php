<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\PetRepositoryInterface;

class PetController extends Controller
{
    public function __construct(private readonly PetRepositoryInterface $petRepository) {}

    public function index()
    {
        $pets = $this->petRepository->findAll();

        return view('dashboard')
            ->with('pets', $pets);
    }

    public function show(int $id)
    {
        $petDetails = $this->petRepository->findById($id);

        return view('show')
            ->with('petDetails', $petDetails);
    }
}
