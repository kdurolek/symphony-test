@extends('layouts.app')

@section('title', 'Pet details')

@section('content')
    <div class="card shadow-lg border-0 mt-5">
        <div class="row g-0">            
            <div class="col-md-5">
                <img src="{{ $petDetails->image }}" class="img-fluid rounded-start w-100 h-100 object-fit-cover" alt="{{ $petDetails->name }}">
            </div>
            
            <div class="col-md-7">
                <div class="card-body">
                    <h2 class="card-title">{{ $petDetails->name }}</h2>

                    @if (!empty($petDetails->breedGroup))
                        <p class="card-text"><strong>Breed group:</strong> {{ $petDetails->breedGroup }}</p>
                    @endif

                    @if (!empty($petDetails->temperament))
                        <p class="card-text"><strong>Temperament:</strong> {{ $petDetails->temperament }}</p>
                    @endif

                    @if (!empty($petDetails->origin))
                        <p class="card-text"><strong>Origin:</strong> {{ $petDetails->origin }}</p>
                    @endif

                    @if (!empty($petDetails->lifeSpan))
                        <p class="card-text"><strong>Life Span:</strong> {{ $petDetails->lifeSpan }}</p>
                    @endif

                    @if (!empty($petDetails->bredFor))
                        <p class="card-text"><strong>Bred For:</strong> {{ $petDetails->bredFor }}</p>
                    @endif

                    <a href="{{ route('pets.index') }}" class="btn btn-outline-secondary mb-4">
                        &larr; Home
                    </a>
                </div>
            </div>       
        </div>
    </div>
@endsection


