@extends('layouts.app')

@section('title', __($categorie . '.available_animals'))

@push('styles')
<style>
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
        font-size: 3rem;
        font-weight: bold;
    }
    
    .breed-badge {
        background: linear-gradient(135deg, rgba(251, 139, 67, 0.15) 0%, rgba(231, 119, 47, 0.15) 100%);
        color: var(--accent-orange, #fb8b43);
        border: 1px solid rgba(251, 139, 67, 0.2);
        
        padding: 0.35rem 1rem;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-block;
    }
    
    .btn-orange {
        background: linear-gradient(135deg, #fb8b43 0%, #e7772f 100%);
        color: white;
        border: none;
        
        padding: 0.75rem 1.25rem;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(251, 139, 67, 0.3);
    }
    
    .btn-orange:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(251, 139, 67, 0.4);
        color: white;
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
    .animal-card:nth-child(9) { animation-delay: 0.45s; }
    .animal-card:nth-child(10) { animation-delay: 0.5s; }
    .animal-card:nth-child(11) { animation-delay: 0.55s; }
    .animal-card:nth-child(12) { animation-delay: 0.6s; }
    
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
    
    .pagination {
        --bs-pagination-active-bg: var(--accent-orange, #fb8b43);
        --bs-pagination-active-border-color: var(--accent-orange, #fb8b43);
        --bs-pagination-color: var(--accent-orange, #fb8b43);
    }
    
    .text-orange {
        color: var(--accent-orange, #fb8b43);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                <h1 class="display-4 fw-bold mb-3 text-dark">
                    {{ __($categorie . '.available_animals') }}
                </h1>
                @if(!empty($raceName))
                    <p class="lead text-secondary">
                        {{ __($categorie . '.breed_filter') }}: <strong class="text-orange">{{ $raceName }}</strong>
                    </p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Grille des animaux -->
<section class="py-5">
    <div class="container">
        @if(count($animaux) > 0)
            <div class="row g-4">
                @foreach($animaux as $animal)
                    <div class="col-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="card border-0 shadow-sm h-100 animal-card">
                            <!-- Image -->
                            <div class="image-wrapper">
                                <a href="{{ route($categorie . '.show', ['lang' => app()->getLocale(), 'slug' => $animal->slug]) }}">
                                    @php
                                        $images = is_string($animal->images) ? json_decode($animal->images, true) : $animal->images;
                                        $firstImage = is_array($images) && !empty($images) ? $images[0] : null;
                                    @endphp
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
                                
                                @php
                                    $descriptionExcerpt = Str::limit(strip_tags($animal->description ?? ''), 80, '...');
                                @endphp
                                @if(!empty($descriptionExcerpt) && $descriptionExcerpt != '...')
                                    <p class="small text-secondary mb-3">
                                        <i class="bi bi-chat-dots me-1"></i>
                                        {{ $descriptionExcerpt }}
                                    </p>
                                @else
                                    <p class="small text-secondary mb-3">
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
                                   class="btn btn-orange mt-auto d-inline-flex align-items-center justify-content-center gap-2">
                                    <span>{{ __($categorie . '.buy_reserve_now') }}</span>
                                    <i class="bi bi-paw"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $animaux->appends(request()->query())->links() }}
            </div>
        @else
            <!-- Message si aucun animal -->
            <div class="text-center py-5">
                <i class="bi bi-emoji-frown fs-1 text-secondary mb-3"></i>
                <h3 class="h4 text-secondary">{{ __($categorie . '.no_animals_found') }}</h3>
                <p class="text-muted">{{ __($categorie . '.check_back_soon') }}</p>
                <a href="{{ route($categorie . '.vente', ['lang' => app()->getLocale()]) }}" class="btn btn-outline-dark mt-3 rounded px-4">
                    <i class="bi bi-arrow-left me-2"></i>
                    {{ __($categorie . '.back_to_animals') }}
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-dark text-white">
    <div class="container text-center">
        <h2 class="h3 fw-bold mb-3">{{ __($categorie . '.need_help_title') }}</h2>
        <p class="lead mb-4 opacity-75">{{ __($categorie . '.need_help_description') }}</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <!-- <a href="https://wa.me/393508724295" class="btn btn-success btn-lg px-4 rounded" target="_blank">
                <i class="bi bi-whatsapp me-2"></i>
                WhatsApp
            </a> -->
            <a href="{{ route('contact', ['lang' => app()->getLocale()]) }}" class="btn btn-outline-light btn-lg px-4 rounded">
                <i class="bi bi-envelope me-2"></i>
                {{ __($categorie . '.contact_us') }}
            </a>
        </div>
    </div>
</section>
@endsection