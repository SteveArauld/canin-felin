@extends('layouts.app')

@section('title', __('search.results_title', ['query' => $query]))

@push('styles')
    <style>
        .search-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .race-section {
            margin-bottom: 3rem;
        }

        .race-title {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--accent-orange, #fb8b43);
        }

        .race-title h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            color: var(--primary-dark, #000);
        }

        .race-badge {
            background: var(--accent-orange, #fb8b43);
            color: white;
            padding: 0.25rem 0.75rem;
            
            font-size: 0.9rem;
            font-weight: 600;
        }

        .animal-card {
            border-radius: 1rem;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }

        .animal-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1) !important;
        }

        .animal-image {
            aspect-ratio: 1 / 1;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .animal-card:hover .animal-image {
            transform: scale(1.1);
        }

        .image-wrapper {
            position: relative;
            overflow: hidden;
            background: #f8f9fa;
        }

        .image-placeholder {
            aspect-ratio: 1 / 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .highlight {
            background: rgba(251, 139, 67, 0.2);
            padding: 0.1rem 0.2rem;
            border-radius: 4px;
            font-weight: 600;
        }

        .btn-orange {
            background: linear-gradient(135deg, #fb8b43 0%, #e7772f 100%);
            color: white;
            border: none;
            
            padding: 0.6rem 1.25rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(251, 139, 67, 0.3);
        }

        .btn-orange:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(251, 139, 67, 0.4);
            color: white;
        }

        .btn-outline-orange {
            background: transparent;
            color: var(--accent-orange, #fb8b43);
            border: 2px solid var(--accent-orange, #fb8b43);
            
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-orange:hover {
            background: var(--accent-orange, #fb8b43);
            color: white;
            transform: translateY(-2px);
        }

        .no-results-card {
            background: white;
            border-radius: 1rem;
            padding: 3rem 2rem;
            text-align: center;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.05);
        }

        .no-results-icon {
            font-size: 4rem;
            color: var(--accent-orange, #fb8b43);
            margin-bottom: 1.5rem;
        }

        .suggestions-list {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.5rem 1rem;
        }

        .suggestions-list li {
            display: inline;
        }

        .suggestions-list a {
            color: var(--accent-orange, #fb8b43);
            text-decoration: none;
            font-weight: 500;
        }

        .suggestions-list a:hover {
            text-decoration: underline;
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

        .animal-card {
            animation: fadeInUp 0.5s ease forwards;
            opacity: 0;
        }

        .animal-card:nth-child(1) { animation-delay: 0.05s; }
        .animal-card:nth-child(2) { animation-delay: 0.1s; }
        .animal-card:nth-child(3) { animation-delay: 0.15s; }
        .animal-card:nth-child(4) { animation-delay: 0.2s; }
        .animal-card:nth-child(5) { animation-delay: 0.25s; }
        .animal-card:nth-child(6) { animation-delay: 0.3s; }
        .animal-card:nth-child(7) { animation-delay: 0.35s; }
        .animal-card:nth-child(8) { animation-delay: 0.4s; }

        @media (prefers-reduced-motion: reduce) {
            .animal-card {
                animation: none;
                opacity: 1;
            }
        }

        .hover-orange {
            transition: color 0.3s ease;
        }

        .hover-orange:hover {
            color: var(--accent-orange, #fb8b43) !important;
        }

        .text-orange {
            color: var(--accent-orange, #fb8b43);
        }

        .breed-badge {
            background: rgba(251, 139, 67, 0.15);
            color: #fb8b43;
            border: 1px solid rgba(251, 139, 67, 0.2);
            
            padding: 0.35rem 1rem;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="search-header py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Barre de recherche -->
                    <form action="{{ route('search', ['lang' => app()->getLocale()]) }}" method="GET" class="mb-4">
                        <div class="position-relative">
                            <div class="input-group input-group-lg">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-secondary"></i>
                            </span>
                                <input type="search"
                                       class="form-control border-start-0 border-end-0"
                                       name="q"
                                       value="{{ $query }}"
                                       placeholder="{{ __('search.placeholder') }}"
                                       aria-label="{{ __('search.aria_label') }}"
                                       autocomplete="off">
                                <button class="btn btn-dark px-4" type="submit">
                                    <i class="bi bi-search me-1"></i>
                                    {{ __('search.button') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Résultats -->
                    <h1 class="display-5 fw-bold mb-3">
                        {{ __('search.results_for') }} "<span class="text-break text-orange">{{ $query }}</span>"
                    </h1>
                    <p class="lead text-secondary mb-0">
                        @if($total > 0)
                            {{ trans_choice('search.results_found', $total, ['count' => $total]) }}
                        @else
                            {{ __('search.no_results_found') }}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Résultats -->
    <section class="py-5">
        <div class="container">
            @if($total > 0)
                @foreach($resultatsParRace as $raceNom => $animauxRace)
                    <div class="race-section">
                        <div class="race-title">
                            <h2>{{ $raceNom }}</h2>
                            <span class="race-badge">{{ count($animauxRace) }}</span>
                        </div>

                        <div class="row g-4">
                            @foreach($animauxRace as $animal)
                                @php
                                    $categorie = $animal->race->categorie ?? 'chiens';
                                    $images = is_string($animal->images) ? json_decode($animal->images, true) : $animal->images;
                                    $firstImage = is_array($images) && !empty($images) ? $images[0] : null;
                                    $descriptionExcerpt = Str::limit(strip_tags($animal->description ?? ''), 80, '...');
                                @endphp
                                <div class="col-6 col-md-6 col-lg-4 col-xl-3">
                                    <div class="card border-0 shadow-sm h-100 animal-card">
                                        <!-- Image -->
                                        <div class="image-wrapper">
                                            <a href="{{ route($categorie . '.show', ['lang' => app()->getLocale(), 'slug' => $animal->slug]) }}">
                                                @if($firstImage)
                                                    <img src="{{ asset($firstImage) }}"
                                                         class="animal-image w-100"
                                                         alt="{{ $animal->nom }}"
                                                         loading="lazy">
                                                @else
                                                    <div class="image-placeholder">
                                                        @if($categorie == 'chiens') 🐕
                                                        @elseif($categorie == 'chats') 🐱
                                                        @elseif($categorie == 'perroquets') 🦜
                                                        @else {{ substr($animal->nom, 0, 1) ?? '🐾' }}
                                                        @endif
                                                    </div>
                                                @endif
                                            </a>
                                        </div>

                                        <!-- Informations -->
                                        <div class="card-body d-flex flex-column p-3 p-lg-4">
                                            <h3 class="h5 fw-bold mb-2">
                                                <a href="{{ route($categorie . '.show', ['lang' => app()->getLocale(), 'slug' => $animal->slug]) }}"
                                                   class="text-dark text-decoration-none hover-orange">
                                                    {{ $animal->nom }}
                                                </a>
                                            </h3>

                                            <span class="breed-badge align-self-start mb-3">
                                            {{ $animal->race->nom ?? $animal->race ?? '' }}
                                        </span>

                                            @if(!empty($descriptionExcerpt) && $descriptionExcerpt != '...')
                                                <p class="small text-secondary mb-3 flex-grow-1">
                                                    <i class="bi bi-chat-dots me-1"></i>
                                                    {{ $descriptionExcerpt }}
                                                </p>
                                            @else
                                                <p class="small text-secondary mb-3 flex-grow-1">
                                                    <i class="bi bi-check-circle-fill text-success me-1"></i>
                                                    {{ __($categorie . '.vaccinated_chipped_dewormed') }}
                                                </p>
                                            @endif

                                            @if($animal->prix)
                                                <div class="mb-2">
                                                    <span class="fw-bold text-orange">{{ $animal->prix }}</span>
                                                </div>
                                            @endif

                                            <a href="{{ route($categorie . '.show', ['lang' => app()->getLocale(), 'slug' => $animal->slug]) }}"
                                               class="btn btn-orange mt-auto">
                                                <i class="bi bi-eye me-2"></i>
                                                {{ __('search.view_details') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Lien "Voir tous" pour la race -->
                        @php
                            $firstAnimal = null;
                            if (count($animauxRace) > 0) {
                                if (is_array($animauxRace)) {
                                    $firstAnimal = $animauxRace[0];
                                } elseif (method_exists($animauxRace, 'first')) {
                                    $firstAnimal = $animauxRace->first();
                                }
                            }

                            $raceSlug = null;
                            $categorie = 'chiens';

                            if ($firstAnimal && isset($firstAnimal->race)) {
                                $raceSlug = $firstAnimal->race->slug ?? Str::slug($raceNom);
                                $categorie = $firstAnimal->race->categorie ?? 'chiens';
                            } else {
                                $raceSlug = Str::slug($raceNom);
                            }
                        @endphp
                        @if(count($animauxRace) >= 4 && $raceSlug)
                            <div class="text-center mt-4">
                                <a href="{{ route($categorie . '.par-race', ['lang' => app()->getLocale(), 'slug' => $raceSlug]) }}"
                                   class="btn btn-outline-orange">
                                    <i class="bi bi-grid-3x3-gap-fill me-2"></i>
                                    {{ __('search.view_all_breed', ['breed' => $raceNom]) }}
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach

            @else
                <!-- Aucun résultat -->
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="no-results-card">
                            <div class="no-results-icon">
                                <i class="bi bi-search-heart"></i>
                            </div>

                            <h2 class="h3 fw-bold mb-3">{{ __('search.no_results_title') }}</h2>
                            <p class="text-secondary mb-4">
                                {{ __('search.no_results_message', ['query' => $query]) }}
                            </p>

                            <div class="d-flex flex-wrap justify-content-center gap-3">
                                <a href="{{ route('home', ['lang' => app()->getLocale()]) }}" class="btn btn-orange px-4">
                                    <i class="bi bi-paw me-2"></i>
                                    {{ __('search.view_all_animals') }}
                                </a>
                                <a href="{{ route('home', ['lang' => app()->getLocale()]) }}" class="btn btn-outline-dark px-4">
                                    <i class="bi bi-house me-2"></i>
                                    {{ __('search.back_to_home') }}
                                </a>
                            </div>

                            <!-- Suggestions -->
                            <div class="mt-4 pt-3 border-top">
                                <p class="text-secondary mb-2">{{ __('search.try_searching_for') }}</p>
                                <ul class="suggestions-list">
                                    @php
                                        $popularRaces = App\Models\Race::withCount('animaux')
                                            ->where('is_active', true)
                                            ->orderBy('animaux_count', 'desc')
                                            ->limit(5)
                                            ->get();
                                    @endphp
                                    @foreach($popularRaces as $race)
                                        <li>
                                            <a href="{{ route('search', ['lang' => app()->getLocale(), 'q' => $race->nom]) }}">
                                                {{ $race->nom }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Besoin d'aide -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h3 class="h4 fw-bold mb-3">{{ __('search.need_help_title') }}</h3>
            <p class="text-secondary mb-4">{{ __('search.need_help_description') }}</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="https://wa.me/393508724295" class="btn btn-success px-4 py-2 rounded">
                    <i class="bi bi-whatsapp me-2"></i>
                    {{ __('search.contact_whatsapp') }}
                </a>
                <a href="{{ route('contact', ['lang' => app()->getLocale()]) }}" class="btn btn-outline-dark px-4 py-2 rounded">
                    <i class="bi bi-envelope me-2"></i>
                    {{ __('search.contact_form') }}
                </a>
            </div>
        </div>
    </section>
@endsection