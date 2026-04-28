@extends('layouts.app')
@section('title', isset($racesMultiples) && $racesMultiples->count() > 1 ? implode(' et ', $racesMultiples->pluck('nom')->toArray()) . ' - Adoption' : (isset($raceActuelle) ? $raceActuelle->nom . ' - Adoption' : 'Tous les ' . ($categorie ?? 'animaux') . 's - Adoption'))
@section('content')
<div class="container">
    @if(isset($racesMultiples) && $racesMultiples->count() > 1)
        {{-- Affichage pour deux races séparées --}}
        @foreach($racesMultiples as $race)
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 bg-light p-4">
                        <h1 class="display-4 mb-3">{{ $race->nom }}</h1>
                        @if($race->description)
                            <p class="lead text-muted">{{ $race->description }}</p>
                        @endif
                        @if($race->image)
                            <img src="{{ asset($race->image) }}" 
                                 alt="{{ $race->nom }}"
                                 style="height:auto; width: auto; object-fit: contain;">
                        @endif
                    </div>
                </div>
            </div>

            {{-- Liste des animaux de cette race --}}
            <div class="row mb-5">
                @php
                    $animauxDeLaRace = $animaux->filter(function($animal) use ($race) {
                        return $animal->race_id == $race->id || $animal->race == $race->nom;
                    });
                @endphp

                @forelse($animauxDeLaRace as $animal)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        @php
                            // Gérer les images
                            $images = null;
                            if (is_string($animal->images)) {
                                $images = json_decode($animal->images, true);
                            } elseif (is_array($animal->images)) {
                                $images = $animal->images;
                            }
                            
                            $firstImage = $images && is_array($images) && count($images) > 0 ? $images[0] : null;
                            
                            // Si pas d'image, utiliser l'image de la race
                            if (!$firstImage && $race->image) {
                                $firstImage = $race->image;
                            }
                            
                            // Nettoyer le prix
                            $prixClean = preg_replace('/[^0-9]/', '', $animal->prix);
                            $prixNumerique = floatval($prixClean ?: 0);
                        @endphp
                        
                        @if($firstImage)
                            <img src="{{ asset($firstImage) }}" 
                                 class="card-img-top" 
                                 alt="{{ $animal->nom }}"
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                                <span class="text-white">Photo non disponible</span>
                            </div>
                        @endif
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $animal->nom }}</h5>
                            <p class="card-text">
                                <strong>Race:</strong> {{ $animal->race }}<br>
                                @if(isset($animal->description) && $animal->description != '')
                                    <strong>Description:</strong> {{ Str::limit($animal->description, 100) }}<br>
                                @endif
                                <strong>Prix:</strong>€  {{ number_format($prixNumerique, 0, ',', ' ') }} 
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="{{ route('animal.show', ['lang' => app()->getLocale(), 'slug' => $animal->slug]) }}" class="btn btn-primary w-100">
                                Voir les détails
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        Aucun animal de race {{ $race->nom }} n'est disponible pour le moment.
                    </div>
                </div>
                @endforelse
            </div>
        @endforeach
        
    @elseif(isset($raceActuelle))
        {{-- Affichage pour une seule race --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 bg-light p-4">
                    <h1 class="display-4 mb-3">{{ $raceActuelle->nom }}</h1>
                    @if($raceActuelle->description)
                        <p class="lead text-muted">{{ $raceActuelle->description }}</p>
                    @endif
                    @if($raceActuelle->image)
                        <img src="{{ asset($raceActuelle->image) }}" 
                             alt="{{ $raceActuelle->nom }}"
                             style="height: 150px; width: auto; object-fit: contain;">
                    @endif
                </div>
            </div>
        </div>

        {{-- Liste des animaux de cette race --}}
        <div class="row mb-5">
            @forelse($animaux as $animal)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm">
                    @php
                        // Gérer les images
                        $images = null;
                        if (is_string($animal->images)) {
                            $images = json_decode($animal->images, true);
                        } elseif (is_array($animal->images)) {
                            $images = $animal->images;
                        }
                        
                        $firstImage = $images && is_array($images) && count($images) > 0 ? $images[0] : null;
                        
                        // Si pas d'image, utiliser l'image de la race
                        if (!$firstImage && $raceActuelle->image) {
                            $firstImage = $raceActuelle->image;
                        }
                        
                        // Nettoyer le prix
                        $prixClean = preg_replace('/[^0-9]/', '', $animal->prix);
                        $prixNumerique = floatval($prixClean ?: 0);
                    @endphp
                    
                    @if($firstImage)
                        <img src="{{ asset($firstImage) }}" 
                             class="card-img-top" 
                             alt="{{ $animal->nom }}"
                             style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                            <span class="text-white">Photo non disponible</span>
                        </div>
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $animal->nom }}</h5>
                        <p class="card-text">
                            <strong>Race:</strong> {{ $animal->race }}<br>
                            @if(isset($animal->description) && $animal->description != '')
                                <strong>Description:</strong> {{ Str::limit($animal->description, 100) }}<br>
                            @endif
                            <strong>Prix:</strong>€  {{ number_format($prixNumerique, 0, ',', ' ') }} 
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('animal.show', ['lang' => app()->getLocale(), 'slug' => $animal->slug]) }}" class="btn btn-primary w-100">
                            Voir les détails
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Aucun animal de race {{ $raceActuelle->nom }} n'est disponible pour le moment.
                </div>
            </div>
            @endforelse
        </div>
        
    @else
        {{-- Affichage pour toutes les races --}}
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="display-4 text-center">Tous les {{ $categorie }}s</h1>
            </div>
        </div>
        
        <div class="row">
            @forelse($animaux as $animal)
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm">
                    @php
                        // Gérer les images
                        $images = null;
                        if (is_string($animal->images)) {
                            $images = json_decode($animal->images, true);
                        } elseif (is_array($animal->images)) {
                            $images = $animal->images;
                        }
                        
                        $firstImage = $images && is_array($images) && count($images) > 0 ? $images[0] : null;
                        
                        // Nettoyer le prix
                        $prixClean = preg_replace('/[^0-9]/', '', $animal->prix);
                        $prixNumerique = floatval($prixClean ?: 0);
                    @endphp
                    
                    @if($firstImage)
                        <img src="{{ asset($firstImage) }}" 
                             class="card-img-top" 
                             alt="{{ $animal->nom }}"
                             style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                            <span class="text-white">Photo non disponible</span>
                        </div>
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $animal->nom }}</h5>
                        <p class="card-text">
                            <strong>Race:</strong> {{ $animal->race }}<br>
                            @if(isset($animal->description) && $animal->description != '')
                                <strong>Description:</strong> {{ Str::limit($animal->description, 100) }}<br>
                            @endif
                            <strong>Prix:</strong>€  {{ number_format($prixNumerique, 0, ',', ' ') }} 
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('animal.show', ['lang' => app()->getLocale(), 'slug' => $animal->slug]) }}" class="btn btn-primary w-100">
                            Voir les détails
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Aucun animal disponible pour le moment.
                </div>
            </div>
            @endforelse
        </div>
    @endif
</div>
@endsection