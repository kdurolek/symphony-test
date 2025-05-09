@extends('layouts.app')

@section('title', 'Home')

@push('style')
    <style>
        #searchInput {
            padding: 10px 22px;
            border-color: var(--primary-bg-color-dark);
            min-width: 350px;
        }

        .searchInput-icon {
            right: 22px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
@endpush

@section('content')
    <h3 class="typewriter mb-4">
        <span id="typewriterText">What pet are you looking for?</span>
    </h3>

    <form id="searchForm" class="d-flex justify-content-center w-100" style="max-width: 800px;">
        <div class="position-relative w-100">
            <input id="searchInput" class="form-control me-2 rounded-5 form-control-lg" type="search" placeholder="Search" aria-label="Search">
            <i class="ph ph-magnifying-glass position-absolute searchInput-icon"></i>
        </div>
    </form>

    <div id="petList" class="list-group mt-3 w-100" style="max-width: 800px;">
        @foreach ($pets as $pet)
            <a href="{{ route('pets.show', $pet['id']) }}" class="list-group-item list-group-item-action" data-breed="{{ strtolower($pet['name']) }}">
                {{ $pet['name'] }}
            </a>
        @endforeach
        <div id="noResults" class="alert alert-danger d-none">No results</div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('searchInput').focus();

            const titles = [
                "Looking for a Dog Breed?",
                "What Dog Breed Fits You?",
                "Discover Rare Dog Breeds",
                "Which Breed is Right for Your Family?",
                "Discover Dogs by Size and Temperament"
            ];

            const randomTitle = titles[Math.floor(Math.random() * titles.length)];
            document.getElementById('typewriterText').textContent = randomTitle;
        });

        document.getElementById('searchForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const searchInput = document.getElementById("searchInput");
            const petListItems = document.querySelectorAll("#petList .list-group-item");

            const query = searchInput.value.toLowerCase();

            let hasPets = false;

            petListItems.forEach(item => {
                const breed = item.dataset.breed;
                if (breed.includes(query)) {
                    hasPets = true;

                    item.classList.add("d-flex");
                    item.classList.remove("d-none");
                } else {
                    item.classList.add("d-none");
                    item.classList.remove("d-flex");
                }
            });

            const noResultDiv = document.getElementById("noResults")

            if (hasPets) {
                noResultDiv.classList.add("d-none");
            } else {
                noResultDiv.classList.remove("d-none");
            }
        });
    </script>
@endpush
