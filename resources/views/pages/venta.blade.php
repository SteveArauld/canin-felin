@extends('layouts.app')

@section('title', __('puppies.page_title'))

@push('styles')
<style>
    .hover-scale {
        transition: all 0.3s ease;
    }
    
    .hover-scale:hover {
        transform: translateY(-5px);
    }
    
    .transition {
        transition: all 0.3s ease;
    }
    
    .object-fit-cover {
        object-fit: cover;
    }
    
    .bg-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .card {
        border-radius: 1rem;
        overflow: hidden;
    }
    
    .btn-outline-primary {
        border-color: #667eea;
        color: #667eea;
    }
    
    .btn-outline-primary:hover {
        background: #667eea;
        border-color: #667eea;
        color: white;
    }
    
    .puppy-card {
        border-radius: 1rem;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .puppy-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1) !important;
    }
    
    .puppy-image {
        aspect-ratio: 1 / 1;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .puppy-card:hover .puppy-image {
        transform: scale(1.1);
    }
    
    .image-wrapper {
        position: relative;
        overflow: hidden;
        background: #f8f9fa;
        aspect-ratio: 1 / 1;
    }
    
    .breed-badge {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.15) 0%, rgba(118, 75, 162, 0.15) 100%);
        color: #667eea;
        border: 1px solid rgba(102, 126, 234, 0.2);
        
        padding: 0.35rem 1rem;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-block;
    }
    
    /* Suggestions de recherche */
    .suggestion-item {
        display: block;
        padding: 0.75rem 1rem;
        text-decoration: none;
        color: #333;
        border-bottom: 1px solid #eee;
        transition: background 0.2s;
    }
    
    .suggestion-item:hover {
        background: #f8f9fa;
    }
    
    .suggestion-category {
        padding: 0.5rem 1rem;
        background: #f5f5f5;
        font-weight: bold;
        font-size: 0.875rem;
        color: #666;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .puppy-card {
        animation: fadeInUp 0.5s ease forwards;
        opacity: 0;
    }
    
    .puppy-card:nth-child(1) { animation-delay: 0.05s; }
    .puppy-card:nth-child(2) { animation-delay: 0.1s; }
    .puppy-card:nth-child(3) { animation-delay: 0.15s; }
    .puppy-card:nth-child(4) { animation-delay: 0.2s; }
    .puppy-card:nth-child(5) { animation-delay: 0.25s; }
    .puppy-card:nth-child(6) { animation-delay: 0.3s; }
    .puppy-card:nth-child(7) { animation-delay: 0.35s; }
    .puppy-card:nth-child(8) { animation-delay: 0.4s; }
    .puppy-card:nth-child(9) { animation-delay: 0.45s; }
    .puppy-card:nth-child(10) { animation-delay: 0.5s; }
    .puppy-card:nth-child(11) { animation-delay: 0.55s; }
    .puppy-card:nth-child(12) { animation-delay: 0.6s; }
    
    @media (prefers-reduced-motion: reduce) {
        .puppy-card {
            animation: none;
            opacity: 1;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                <h1 class="display-4 fw-bold mb-4 text-dark">
                    {{ __($categorie . '.main_title') }}
                </h1>
                
                <div class="text-secondary">
                    <p class="lead mb-3">{{ __($categorie . '.intro_1') }}</p>
                    <p class="mb-2">{{ __($categorie . '.intro_2') }}</p>
                    <p class="mb-2">{{ __($categorie . '.intro_3') }}</p>
                    <p class="mb-2">{{ __($categorie . '.intro_4') }}</p>
                    <p class="mb-0">
                        {{ __($categorie . '.intro_5') }}
                        <strong>{{ __($categorie . '.intro_6') }}</strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Barre de recherche -->
<section class="py-4 border-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form id="searchForm" action="{{ route('search', ['lang' => app()->getLocale()]) }}" method="GET">
                    <div class="position-relative">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-secondary"></i>
                            </span>
                            <input type="search" 
                                   id="searchInput"
                                   class="form-control border-start-0 ps-0" 
                                   name="q"
                                   value="{{ request('q') }}"
                                   placeholder="{{ __($categorie . '.search_placeholder') }}"
                                   aria-label="{{ __($categorie . '.search_aria_label') }}"
                                   autocomplete="off">
                            <button class="btn btn-dark px-4" type="submit">
                                {{ __('common.search') }}
                            </button>
                        </div>
                        
                        <!-- Loader -->
                        <div id="searchLoader" class="position-absolute end-0 top-50 translate-middle-y me-5 d-none">
                            <div class="spinner-border spinner-border-sm text-primary" role="status">
                                <span class="visually-hidden">Chargement...</span>
                            </div>
                        </div>
                        
                        <!-- Suggestions -->
                        <div id="searchSuggestions" 
                             class="position-absolute w-100 mt-2 bg-white border rounded-3 shadow-lg d-none" 
                             style="z-index: 1050; max-height: 400px; overflow-y: auto;">
                            <div id="suggestionsContent"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Races disponibles -->
<section class="py-5">
    <div class="container">
        <h2 class="h3 fw-bold text-center mb-4">
            {{ __($categorie . '.available_by_breed') }}
        </h2>
        
        <div class="row g-3 g-md-4">
            @foreach($razasUnicas as $raza)
                @php
                    $count = $countByRace[$raza->id] ?? 0;
                    $slug = $raza->slug;
                    $imagenEjemplo = $raceImages[$raza->id] ?? null;
                @endphp
                
                @if($count > 0)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route($categorie . '.par-race', ['lang' => app()->getLocale(), 'slug' => $slug]) }}" 
                       class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm hover-scale transition">
                            <div class="card-img-top position-relative overflow-hidden" style="padding-top: 100%;">
                                @if($imagenEjemplo)
                                    <img src="{{ asset($imagenEjemplo) }}"
                                         alt="{{ $raza->nom }}"
                                         class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover">
                                @else
                                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-gradient">
                                        <span class="text-white fw-bold text-center px-2">{{ $raza->nom }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body text-center p-3">
                                <h3 class="h6 fw-bold mb-0">
                                    {{ $raza->nom }}
                                    <span class="badge bg-secondary ms-2">{{ $count }}</span>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

<!-- Liste des animaux -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6 fw-bold mb-3">{{ __($categorie . '.our_animals') }}</h2>
            <p class="text-secondary">{{ __($categorie . '.find_perfect_companion') }}</p>
        </div>
        
        <div class="row g-4">
            @forelse($animaux as $animal)
                @php
                    $images = is_string($animal->images) ? json_decode($animal->images, true) : $animal->images;
                    $firstImage = is_array($images) && !empty($images) ? $images[0] : null;
                    $descriptionExcerpt = \Illuminate\Support\Str::limit(strip_tags($animal->description ?? ''), 80, '...');
                @endphp
                <div class="col-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100 border-0 shadow-sm puppy-card">
                        <!-- Image -->
                        <div class="image-wrapper">
                            <a href="{{ route($categorie . '.show', ['lang' => app()->getLocale(), 'slug' => $animal->slug]) }}">
                                @if($firstImage)
                                    <img src="{{ asset($firstImage) }}"
                                         class="puppy-image w-100"
                                         alt="{{ $animal->nom }}"
                                         loading="lazy">
                                @else
                                    <div class="image-placeholder d-flex align-items-center justify-content-center w-100 h-100 bg-gradient-primary">
                                        <span class="text-white fs-1 fw-bold">{{ substr($animal->nom, 0, 1) ?? ($categorie == 'chiens' ? '🐕' : ($categorie == 'chats' ? '🐱' : '🦜')) }}</span>
                                    </div>
                                @endif
                            </a>
                        </div>
                        
                        <!-- Informations -->
                        <div class="card-body d-flex flex-column p-3 p-md-4">
                            <h3 class="h5 fw-bold mb-2">
                                <a href="{{ route($categorie . '.show', ['lang' => app()->getLocale(), 'slug' => $animal->slug]) }}"
                                   class="text-dark text-decoration-none hover-orange">
                                    {{ $animal->nom }}
                                </a>
                            </h3>
                            
                            <span class="breed-badge align-self-start mb-3">
                                {{ $animal->race->nom ?? $animal->race_nom ?? '' }}
                            </span>
                            
                            @if(!empty($descriptionExcerpt) && $descriptionExcerpt != '...')
                                <p class="text-secondary small mb-3 flex-grow-1">
                                    <i class="bi bi-chat-dots me-1"></i>
                                    {{ $descriptionExcerpt }}
                                </p>
                            @else
                                <p class="text-secondary small mb-3 flex-grow-1">
                                    <i class="bi bi-check-circle-fill text-success me-1"></i>
                                    {{ __($categorie . '.vaccinated_chipped_dewormed') }}
                                </p>
                            @endif
                            
                            @if($animal->prix)
                                <div class="mb-2">
                                    <span class="fw-bold text-primary">{{ $animal->prix }}</span>
                                </div>
                            @endif
                            
                            <a class="btn btn-outline-primary mt-auto d-inline-flex align-items-center justify-content-center gap-2"
                               href="{{ route($categorie . '.show', ['lang' => app()->getLocale(), 'slug' => $animal->slug]) }}">
                                {{ __($categorie . '.view_details') }}
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-emoji-frown fs-1 text-secondary mb-3"></i>
                    <h3 class="h5 text-secondary">{{ __($categorie . '.no_animals_found') }}</h3>
                    <p class="text-muted">{{ __($categorie . '.check_back_soon') }}</p>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        @if(method_exists($animaux, 'links'))
            <div class="mt-5">
                {{ $animaux->links() }}
            </div>
        @endif
    </div>
</section>

<!-- Section légale / informations -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h3 fw-bold text-center mb-4">
                            {{ __($categorie . '.included_title') }}
                        </h2>
                        
                        <h3 class="h5 fw-bold text-center mb-3" style="color: var(--accent-orange, #fb8b43);">
                            {{ __($categorie . '.each_animal_includes') }}
                        </h3>
                        
                        <ul class="list-unstyled">
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>{{ __($categorie . '.health_documentation') }}</span>
                            </li>
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>{{ __($categorie . '.vaccination_record') }}</span>
                            </li>
                            <li class="mb-3 d-flex">
                                <i class="bi bi-check-circle-fill text-success me-3 mt-1"></i>
                                <span>{{ __($categorie . '.health_guarantee') }}</span>
                            </li>
                        </ul>
                        
                        <hr class="my-4">
                        
                        <h3 class="h5 fw-bold text-center mb-3">
                            {{ __($categorie . '.why_choose_us') }}
                        </h3>
                        
                        <p class="text-center mb-3">{{ __($categorie . '.ethical_standards') }}</p>
                        
                        <div class="text-center mt-4">
                            <h4 class="h6 fw-bold">{{ __($categorie . '.contact_title') }}</h4>
                            <p class="mb-0">{{ __($categorie . '.ready_to_meet') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Styles supplémentaires -->
<style>
    .hover-orange {
        transition: color 0.3s ease;
    }
    
    .hover-orange:hover {
        color: var(--accent-orange, #fb8b43) !important;
    }
    
    .text-primary {
        color: var(--accent-orange, #fb8b43) !important;
    }
    
    .btn-outline-primary {
        border-color: var(--accent-orange, #fb8b43);
        color: var(--accent-orange, #fb8b43);
    }
    
    .btn-outline-primary:hover {
        background: var(--accent-orange, #fb8b43);
        border-color: var(--accent-orange, #fb8b43);
        color: white;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .image-placeholder {
        aspect-ratio: 1 / 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .pagination {
        --bs-pagination-active-bg: var(--accent-orange, #fb8b43);
        --bs-pagination-active-border-color: var(--accent-orange, #fb8b43);
        --bs-pagination-color: var(--accent-orange, #fb8b43);
    }
</style>

<!-- JavaScript pour la recherche -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const searchForm = document.getElementById('searchForm');
        const searchLoader = document.getElementById('searchLoader');
        const suggestionsContainer = document.getElementById('searchSuggestions');
        const suggestionsContent = document.getElementById('suggestionsContent');
        
        let searchTimeout;
        let lastSearch = '';
        
        if (!searchInput) return;
        
        // Recherche en temps réel
        searchInput.addEventListener('input', function(e) {
            const query = e.target.value.trim();
            
            clearTimeout(searchTimeout);
            
            if (query.length < 2) {
                hideSuggestions();
                hideLoader();
                return;
            }
            
            if (query === lastSearch) return;
            lastSearch = query;
            
            showLoader();
            
            searchTimeout = setTimeout(() => {
                fetchSuggestions(query);
            }, 300);
        });
        
        // Soumission du formulaire
        searchForm.addEventListener('submit', function(e) {
            const query = searchInput.value.trim();
            
            if (query.length < 2) {
                e.preventDefault();
                showToast('{{ __("search.min_characters") }}', 'warning');
                return false;
            }
            
            showLoader();
        });
        
        // Focus sur l'input
        searchInput.addEventListener('focus', function() {
            const query = searchInput.value.trim();
            if (query.length >= 2) {
                fetchSuggestions(query);
            }
        });
        
        // Fermer les suggestions au clic extérieur
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !suggestionsContainer.contains(e.target)) {
                hideSuggestions();
            }
        });
        
        // Touche Escape
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideSuggestions();
            }
        });
        
        function showLoader() {
            searchLoader.classList.remove('d-none');
        }
        
        function hideLoader() {
            searchLoader.classList.add('d-none');
        }
        
        function hideSuggestions() {
            suggestionsContainer.classList.add('d-none');
            hideLoader();
        }
        
        function showSuggestions() {
            suggestionsContainer.classList.remove('d-none');
        }
        
        function fetchSuggestions(query) {
            fetch(`/recherche/autocompletion?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    hideLoader();
                    displaySuggestions(data, query);
                })
                .catch(error => {
                    console.error('Erreur de recherche:', error);
                    hideLoader();
                    hideSuggestions();
                });
        }
        
        function displaySuggestions(suggestions, query) {
            if (!suggestions || suggestions.length === 0) {
                suggestionsContent.innerHTML = `
                    <div class="p-3 text-center text-secondary">
                        <i class="bi bi-search mb-2"></i>
                        <p class="mb-0">{{ __('search.no_results') }} "${escapeHtml(query)}"</p>
                    </div>
                `;
                showSuggestions();
                return;
            }
            
            let html = '';
            
            const races = suggestions.filter(s => s.type === 'race');
            const animaux = suggestions.filter(s => s.type === 'animal');
            
            if (races.length > 0) {
                html += `<div class="suggestion-category">{{ __('search.categories') }}</div>`;
                
                races.forEach(race => {
                    html += `
                        <a href="${race.url}" class="suggestion-item d-flex justify-content-between align-items-center">
                            <span>${highlightText(race.text, query)}</span>
                            <span class="badge bg-secondary">${race.count}</span>
                        </a>
                    `;
                });
            }
            
            if (animaux.length > 0) {
                html += `<div class="suggestion-category">{{ __('search.animals') }}</div>`;
                
                animaux.forEach(animal => {
                    html += `
                        <a href="${animal.url}" class="suggestion-item">
                            <div class="d-flex align-items-center">
                                ${animal.imagen ? 
                                    `<img src="${animal.imagen}" width="40" height="40" class="rounded me-3 object-fit-cover">` : 
                                    `<div class="bg-light rounded me-3" style="width: 40px; height: 40px;"></div>`
                                }
                                <div>
                                    <div class="fw-medium">${highlightText(animal.text, query)}</div>
                                    <small class="text-secondary">${escapeHtml(animal.race)}</small>
                                </div>
                            </div>
                        </a>
                    `;
                });
            }
            
            suggestionsContent.innerHTML = html;
            showSuggestions();
        }
        
        function highlightText(text, query) {
            const regex = new RegExp(`(${escapeRegExp(query)})`, 'gi');
            return escapeHtml(text).replace(regex, '<strong class="text-primary">$1</strong>');
        }
        
        function escapeHtml(text) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, m => map[m]);
        }
        
        function escapeRegExp(string) {
            return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        }
        
        function showToast(message, type = 'info') {
            const toastContainer = document.createElement('div');
            toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
            toastContainer.style.zIndex = '1090';
            
            const toast = document.createElement('div');
            toast.className = `toast align-items-center text-white bg-${type} border-0`;
            toast.setAttribute('role', 'alert');
            
            toast.innerHTML = `
                <div class="d-flex">
                    <div class="toast-body">${message}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            `;
            
            toastContainer.appendChild(toast);
            document.body.appendChild(toastContainer);
            
            const bsToast = new bootstrap.Toast(toast);
            bsToast.show();
            
            setTimeout(() => toastContainer.remove(), 5000);
        }
    });
</script>
@endsection