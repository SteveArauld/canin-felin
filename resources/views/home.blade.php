@extends('layouts.app')

@section('title', __('Éleveur certifié proposant la vente de chiots, chatons et perroquets de race pure.'))
@section('content')

<!-- Hero Section avec Slider -->
<section class="hero-section">
    @include('sections.slide')
</section>

<!-- Section Présentation de l'éleveuse -->
<section class="py-5 py-md-6 bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="pe-lg-4">
                    <h1 class="display-5 fw-bold mb-4" style="color: var(--primary-dark);">
                        Votre éleveur est en réalité une éleveuse passionnée par les animaux
                    </h1>
                    <p class="lead mb-4 text-muted">
                        Fille d'éleveurs canins, votre éleveuse a développé sa propre structure avec des partenaires pour vous fournir plusieurs races de chiots et chatons.
                    </p>
                    
                    <div class="mb-4">
                        <h6 class="fw-bold text-uppercase mb-3" style="color: var(--accent-orange); letter-spacing: 2px;">
                            {{ __('about.company_name') }}
                        </h6>
                        <p class="mb-3">{{ __('about.intro_part1') }}
                            <strong>C'est au cœur de la campagne que se développe depuis plus de 10 ans, dans un cadre privilégié pour le bien-être des animaux.</strong>
                        </p>
                        <p class="mb-3">
                            Passionnée de chiens et de chats, amoureuse des visages plats et expressifs des chiens et des têtes rondes des chats, votre éleveuse sélectionne des races au caractère affectueux et présent.
                        </p>
                        <p class="mb-3">
                            En tant que professionnelle très attachée à la santé de ses chiots et de ses chatons, votre éleveuse effectue tous les tests ADN permettant de repérer les maladies congénitales ou récurrentes telles que la PKD, la FIV et le CMH.
                        </p>
                        <p class="mb-0">
                            <strong>Les souches sont régulièrement renouvelées afin d'éviter toute consanguinité.</strong>
                        </p>
                    </div>

                    <a href="{{ route('qui-sommes-nous', ['lang' => app()->getLocale()]) }}" 
                       class="btn btn-dark px-4 py-3 rounded-pill fw-bold">
                        <i class="bi bi-arrow-right me-2"></i>
                        Découvrir l'élevage
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Carrousel d'images -->
                <div id="elevageCarousel" class="carousel slide carousel-fade shadow-lg rounded-4 overflow-hidden" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-4">
                        <div class="carousel-item active">
                          <div class="carousel-item active">
                            <img src="{{ asset('assets/uploads/2025/12/822649-dogs-cats-Pets-animal-mammal-domestic-Animals.jpg') }}" 
                                 class="d-block w-100 object-fit-cover" 
                                 alt="Chiots et chatons" 
                                 style="height: 450px;"
                                 onerror="this.src='{{ asset('/assets/uploads/2025/1.jpg') }}'">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/uploads/2025/12/1649436703748.jpg') }}" 
                                 class="d-block w-100 object-fit-cover" 
                                 alt="Animaux d'élevage" 
                                 style="height: 450px;"
                                 onerror="this.src='{{ asset('/assets/uploads/2025/2.jpg') }}'">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/uploads/2025/12/white-background-animals-dog-cat-baby-animals-wallpaper-preview.jpg') }}" 
                                 class="d-block w-100 object-fit-cover" 
                                 alt="Bébés animaux" 
                                 style="height: 450px;"
                                 onerror="this.src='{{ asset('/assets/uploads/2025/3.jpg') }}'">
                        </div>  
                    </div>
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#elevageCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Précédent</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#elevageCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                        <span class="visually-hidden">Suivant</span>
                    </button> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Chiens : Élevage canin -->
<section class="py-5 py-md-6 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-lg-2">
                <div class="ps-lg-4">
                    <h2 class="display-6 fw-bold mb-4" style="color: var(--primary-dark);">
                        Un élevage de chiens de race de grande et petite taille, pour toute la famille
                    </h2>
                    <p class="mb-3">
                        {{ __('about.company_name') }} s'est spécialisé dans plusieurs races de chiens, toutes sélectionnées pour leur caractère exceptionnel.
                    </p>
                    <p class="mb-4">
                        Les chiens d'élevage présentent tous un caractère attachant et sont faciles à vivre. La bienveillance, l'expressivité, l'affection : vous trouverez chez chacun de nos chiens, toutes les qualités d'un véritable compagnon de vie avec lequel vous pourrez lier des liens forts.
                    </p>
                    
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3" style="color: var(--accent-orange);">Nos races de chiens :</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--accent-orange);"></i>
                                <a href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'pomsky-et-golden-retriever']) }}" class="text-dark fw-bold text-decoration-none hover-link">
                                    Pomsky et Golden Retriever
                                </a>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--accent-orange);"></i>
                                <a href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'ckc-et-jack-russel']) }}" class="text-dark fw-bold text-decoration-none hover-link">
                                    Cavalier King Charles et Jack Russell
                                </a>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--accent-orange);"></i>
                                <a href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'spitz-nain-pomeranien-et-yorkshire-terrier']) }}" class="text-dark fw-bold text-decoration-none hover-link">
                                    Spitz nain et Yorkshire
                                </a>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--accent-orange);"></i>
                                <a href="{{ route('races.multiples', ['lang' => app()->getLocale(), 'slugs' => 'husky-siberien']) }}" class="text-dark fw-bold text-decoration-none hover-link">
                                    Husky Sibérien
                                </a>
                            </li>
                        </ul>
                    </div>

                    <p class="mb-4">
                        Membre du club canin, l'élevage vous propose des chiens aptes à la vie en intérieur, avec un équilibre naturel et attachés à leur maître.
                    </p>

                    <a href="{{ route('chiens.vente', ['lang' => app()->getLocale()]) }}" 
                       class="btn btn-dark px-4 py-3 rounded-pill fw-bold">
                        <i class="bi bi-arrow-right me-2"></i>
                        Tous nos chiens
                    </a>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <!-- Carrousel chiens -->
                <div id="chiensCarousel" class="carousel slide carousel-fade shadow-lg rounded-4 overflow-hidden" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-4">
                           <div class="carousel-item active">
                            <img src="{{ asset('assets/uploads/2025/12/822649-dogs-cats-Pets-animal-mammal-domestic-Animals.jpg') }}" 
                                 class="d-block w-100 object-fit-cover" 
                                 alt="Chiots et chatons" 
                                 style="height: 450px;"
                                 onerror="this.src='{{ asset('/assets/uploads/image1.jpg') }}'">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/uploads/2025/12/1649436703748.jpg') }}" 
                                 class="d-block w-100 object-fit-cover" 
                                 alt="Animaux d'élevage" 
                                 style="height: 450px;"
                                 onerror="this.src='{{ asset('/assets/uploads/image1.jpg') }}'">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('assets/uploads/2025/12/white-background-animals-dog-cat-baby-animals-wallpaper-preview.jpg') }}" 
                                 class="d-block w-100 object-fit-cover" 
                                 alt="Bébés animaux" 
                                 style="height: 450px;"
                                 onerror="this.src='{{ asset('/assets/uploads/image1.jpg') }}'">
                        </div>  
                    </div>
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#chiensCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#chiensCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                    </button> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Chats : Élevage félin -->
<section class="py-5 py-md-6 bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="pe-lg-4">
                    <h2 class="display-6 fw-bold mb-4" style="color: var(--primary-dark);">
                        Un élevage de chats affectueux, pour les amoureux des poils courts comme des poils longs
                    </h2>
                    <p class="mb-3">
                        <strong>Craquez pour les bouilles rondes et le naturel attachant de nos chats de race.</strong>
                    </p>
                    <p class="mb-3">
                        Vous aimez les chats "nounours", les félins qui aiment les câlins et les caresses ? Vous allez être servi avec les chats de l'élevage !
                    </p>
                    
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3" style="color: var(--accent-orange);">Nos races de chats :</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--accent-orange);"></i>
                                <span class="fw-bold">Bengale, Savane, Sphynx</span>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--accent-orange);"></i>
                                <span class="fw-bold">British Shorthair, British Longhair, Scottish Fold</span>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--accent-orange);"></i>
                                <span class="fw-bold">Chartreux et Bleu Russe</span>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--accent-orange);"></i>
                                <span class="fw-bold">Sacré de Birmanie et Siamois</span>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--accent-orange);"></i>
                                <span class="fw-bold">Sibérien, Ragdoll et Persan</span>
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill me-2" style="color: var(--accent-orange);"></i>
                                <span class="fw-bold">Main Coon</span>
                            </li>
                        </ul>
                    </div>

                    <p class="mb-4">
                        Vous trouverez chez les British cette bouille ronde et dodue qui fait tant craquer. À poils courts ou à poils longs, ces chats sont des compagnons agréables qui apprécient les gestes d'affection tout en restant indépendants. Vous trouverez un naturel tout aussi attachant, avec une touche d'originalité apportée par leurs oreilles pliées, typiques de ces races.
                    </p>

                    <a href="{{ route('chats.vente', ['lang' => app()->getLocale(), 'categorie' => 'chats']) }}" 
                       class="btn btn-dark px-4 py-3 rounded-pill fw-bold">
                        <i class="bi bi-arrow-right me-2"></i>
                        Tous nos chats
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Carrousel chats -->
                <div id="chatsCarousel" class="carousel slide carousel-fade shadow-lg rounded-4 overflow-hidden" data-bs-ride="carousel">
                    <div class="carousel-inner rounded-4">
                        <div class="carousel-item active">
                            <img src="{{ asset('/assets/uploads/image2.jpg') }}" 
                                 class="d-block w-100 object-fit-cover" 
                                 alt="Chatons d'élevage" 
                                 style="height: 450px;"
                                 onerror="this.src='{{ asset('/assets/uploads/image2.jpg') }}'">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('/assets/uploads/image2.jpg') }}" 
                                 class="d-block w-100 object-fit-cover" 
                                 alt="Chats de race" 
                                 style="height: 450px;"
                                 onerror="this.src='{{ asset('/assets/uploads/image2.jpg') }}'">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('/assets/uploads/image2.jpg') }}" 
                                 class="d-block w-100 object-fit-cover" 
                                 alt="Chatons disponibles" 
                                 style="height: 450px;"
                                 onerror="this.src='{{ asset('/assets/uploads/image2.jpg') }}'">
                        </div>
                    </div>
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#chatsCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#chatsCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                    </button> -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Engagements : Ce que nous offrons -->
<section class="py-5 py-md-6" style="background-color: #f8f4f0;">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <h2 class="display-6 fw-bold mb-3" style="color: var(--primary-dark);">
                    L'élevage s'engage pour le bien-être de ses animaux
                </h2>
                <p class="lead text-muted">
                    Notre priorité est d'offrir le meilleur à nos compagnons
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4 hover-shadow transition">
                    <div class="card-body">
                        <div class="mb-3">
                            <img src="{{ asset('assets/uploads/2025/12/116752111_582244202454646_4188760593582040662_n.jpg') }}" 
                                 alt="Environnement sain" 
                                 class="rounded-circle mb-3 object-fit-cover"
                                 style="width: 120px; height: 120px;"
                                 onerror="this.style.display='none'">
                        </div>
                        <h4 class="h5 fw-bold mb-3">Environnement sain</h4>
                        <p class="text-muted mb-0">
                            Nos animaux évoluent dans un environnement pensé pour leur bien-être, avec des espaces adaptés et sécurisés.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4 hover-shadow transition">
                    <div class="card-body">
                        <div class="mb-3">
                            <img src="{{ asset('assets/uploads/2025/12/troupe.jpg') }}" 
                                 alt="Alimentation adaptée" 
                                 class="rounded-circle mb-3 object-fit-cover"
                                 style="width: 120px; height: 120px;"
                                 onerror="this.style.display='none'">
                        </div>
                        <h4 class="h5 fw-bold mb-3">Alimentation adaptée</h4>
                        <p class="text-muted mb-0">
                            Aliments haut de gamme pour favoriser une croissance saine et un développement optimal de chaque animal.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4 hover-shadow transition">
                    <div class="card-body">
                        <div class="mb-3">
                            <img src="{{ asset('assets/uploads/2025/12/OgdenClinicBrittany2510sak_0.webp') }}" 
                                 alt="Suivi sanitaire" 
                                 class="rounded-circle mb-3 object-fit-cover"
                                 style="width: 120px; height: 120px;"
                                 onerror="this.style.display='none'">
                        </div>
                        <h4 class="h5 fw-bold mb-3">Suivi sanitaire</h4>
                        <p class="text-muted mb-0">
                            Tests ADN réguliers, renouvellement des souches pour éviter la consanguinité et garantir une santé optimale.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm text-center p-4 hover-shadow transition">
                    <div class="card-body">
                        <div class="mb-3">
                            <img src="{{ asset('assets/uploads/2025/12/425867445_363936276396781_6212901620377725189_n.jpg') }}" 
                                 alt="Écoute et conseil" 
                                 class="rounded-circle mb-3 object-fit-cover"
                                 style="width: 120px; height: 120px;"
                                 onerror="this.style.display='none'">
                        </div>
                        <h4 class="h5 fw-bold mb-3">Écoute et conseil</h4>
                        <p class="text-muted mb-0">
                            Suivi personnalisé pour accueillir au mieux votre futur compagnon et vous accompagner dans son éducation.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Chiens disponibles -->
<section class="py-5 py-md-6 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <div class="mb-3">
                    <i class="bi bi-dog fs-1" style="color: var(--accent-orange);"></i>
                </div>
                <h2 class="display-6 fw-bold mb-3" style="color: var(--primary-dark);">
                    Nos races de chiens disponibles
                </h2>
                <p class="lead" style="color: var(--accent-orange);">
                    Découvrez nos magnifiques chiots de race pure
                </p>
                <p class="text-muted fst-italic">
                    <i class="bi bi-info-circle me-2"></i>
                    Cliquez sur une carte pour voir les détails
                </p>
            </div>
        </div>

        <div class="row g-4">
            @foreach($chiots as $raza)
                @php
                    $count = $countchiens[$raza->id] ?? 0;
                    $slug = $raza->slug;
                    $imagenEjemplo = $raceImagesChiens[$raza->id] ?? null;
                @endphp
               
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('chiens.par-race', ['lang' => app()->getLocale(), 'slug' => $slug]) }}" 
                       class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm hover-scale transition">
                            <div class="card-img-top position-relative overflow-hidden" style="padding-top: 100%;">
                                @if($imagenEjemplo)
                                    <img src="{{ asset($imagenEjemplo) }}"
                                         alt="{{ $raza->nom }}"
                                         class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover">
                                @else
                                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-gradient" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        <span class="text-white fw-bold text-center px-2">{{ $raza->nom }}</span>
                                    </div>
                                @endif
                                <!-- Badge nombre -->
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge bg-dark rounded-pill px-3 py-2">
                                        {{ $count }} {{ __('disponible(s)') }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-body text-center p-3">
                                <h3 class="h6 fw-bold mb-0">
                                    {{ $raza->nom }}
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('chiens.vente', ['lang' => app()->getLocale(), 'categorie' => 'chiens']) }}" 
               class="btn btn-dark px-5 py-3 rounded-pill fw-bold">
                <i class="bi bi-grid-3x3-gap-fill me-2"></i>
                Voir tous nos chiens
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Section Chats disponibles -->
<section class="py-5 py-md-6 bg-white">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <div class="mb-3">
                    <i class="bi bi-cat fs-1" style="color: var(--accent-orange);"></i>
                </div>
                <h2 class="display-6 fw-bold mb-3" style="color: var(--primary-dark);">
                    Nos races de chats disponibles
                </h2>
                <p class="lead" style="color: var(--accent-orange);">
                    Découvrez nos adorables chatons de race
                </p>
                <p class="text-muted fst-italic">
                    <i class="bi bi-info-circle me-2"></i>
                    Cliquez sur une carte pour voir les détails
                </p>
            </div>
        </div>

        <div class="row g-4">
            @foreach($chats as $raza)
                @php
                    $count = $countchats[$raza->id] ?? 0;
                    $slug = $raza->slug;
                    $imagenEjemplo = $raceImagesChats[$raza->id] ?? null;
                @endphp
               
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('chats.par-race', ['lang' => app()->getLocale(), 'slug' => $slug]) }}" 
                       class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm hover-scale transition">
                            <div class="card-img-top position-relative overflow-hidden" style="padding-top: 100%;">
                                @if($imagenEjemplo)
                                    <img src="{{ asset($imagenEjemplo) }}"
                                         alt="{{ $raza->nom }}"
                                         class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover">
                                @else
                                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-gradient" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                        <span class="text-white fw-bold text-center px-2">{{ $raza->nom }}</span>
                                    </div>
                                @endif
                                <!-- Badge nombre -->
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge bg-dark rounded-pill px-3 py-2">
                                        {{ $count }} {{ __('disponible(s)') }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-body text-center p-3">
                                <h3 class="h6 fw-bold mb-0">
                                    {{ $raza->nom }}
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('chats.vente', ['lang' => app()->getLocale(), 'categorie' => 'chats']) }}" 
               class="btn btn-dark px-5 py-3 rounded-pill fw-bold">
                <i class="bi bi-grid-3x3-gap-fill me-2"></i>
                Voir tous nos chats
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Section Perroquets disponibles -->
<section class="py-5 py-md-6 bg-light">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <div class="mb-3">
                    <i class="bi bi-feather fs-1" style="color: var(--accent-orange);"></i>
                </div>
                <h2 class="display-6 fw-bold mb-3" style="color: var(--primary-dark);">
                    Nos perroquets disponibles
                </h2>
                <p class="lead" style="color: var(--accent-orange);">
                    Découvrez nos magnifiques perroquets élevés avec soin
                </p>
                <p class="text-muted fst-italic">
                    <i class="bi bi-info-circle me-2"></i>
                    Cliquez sur une carte pour voir les détails
                </p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            @foreach($perroquets as $raza)
                @php
                    $count = $countperroquets[$raza->id] ?? 0;
                    $slug = $raza->slug;
                    $imagenEjemplo = $raceImagesPerroquets[$raza->id] ?? null;
                @endphp
               
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ route('perroquets.par-race', ['lang' => app()->getLocale(), 'slug' => $slug]) }}" 
                       class="text-decoration-none">
                        <div class="card h-100 border-0 shadow-sm hover-scale transition">
                            <div class="card-img-top position-relative overflow-hidden" style="padding-top: 100%;">
                                @if($imagenEjemplo)
                                    <img src="{{ asset($imagenEjemplo) }}"
                                         alt="{{ $raza->nom }}"
                                         class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover">
                                @else
                                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-gradient" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                                        <span class="text-white fw-bold text-center px-2">{{ $raza->nom }}</span>
                                    </div>
                                @endif
                                <!-- Badge nombre -->
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge bg-dark rounded-pill px-3 py-2">
                                        {{ $count }} {{ __('disponible(s)') }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-body text-center p-3">
                                <h3 class="h6 fw-bold mb-0">
                                    {{ $raza->nom }}
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('perroquets.vente', ['lang' => app()->getLocale(), 'categorie' => 'perroquets']) }}" 
               class="btn btn-dark px-5 py-3 rounded-pill fw-bold">
                <i class="bi bi-grid-3x3-gap-fill me-2"></i>
                Voir tous nos perroquets
                <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Section Visite de l'élevage -->
<section class="py-5 py-md-6 text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);">
    <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25">
        <img src="{{ asset('assets/uploads/2025/12/white-background-animals-dog-cat-baby-animals-wallpaper-preview-1.jpg') }}" 
             alt="Background" 
             class="w-100 h-100 object-fit-cover"
             onerror="this.style.display='none'">
    </div>
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="display-6 fw-bold mb-4">
                    Rendez-nous visite à l'élevage pour découvrir tous nos chiots et nos chatons
                </h2>
                <p class="lead mb-5">
                    Vous voulez venir voir l'élevage et ses pensionnaires ? Nous vous accueillons avec plaisir, sur RDV, tous les après-midi (sauf le dimanche).
                </p>
                <a href="{{ route('contact', ['lang' => app()->getLocale()]) }}" 
                   class="btn btn-light px-5 py-3 rounded-pill fw-bold btn-lg">
                    <i class="bi bi-telephone-fill me-2"></i>
                    Venez nous voir
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Pourquoi nous choisir -->
<section class="py-5 py-md-6 bg-white">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <h2 class="display-6 fw-bold mb-3" style="color: var(--primary-dark);">
                    {{ __('why_choose.title') }}
                </h2>
            </div>
        </div>
        
        <div class="row g-4">
            @php
                $features = [
                    ['icon' => 'bi-shield-check', 'title' => 'why_choose.point1_title', 'desc' => 'why_choose.point1_description'],
                    ['icon' => 'bi-heart-pulse', 'title' => 'why_choose.point2_title', 'desc' => 'why_choose.point2_description'],
                    ['icon' => 'bi-house-heart', 'title' => 'why_choose.point3_title', 'desc' => 'why_choose.point3_description'],
                    ['icon' => 'bi-clipboard2-pulse', 'title' => 'why_choose.point4_title', 'desc' => 'why_choose.point4_description'],
                    ['icon' => 'bi-people', 'title' => 'why_choose.point5_title', 'desc' => 'why_choose.point5_description'],
                ];
            @endphp
            
            @foreach($features as $feature)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm hover-shadow transition">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi {{ $feature['icon'] }} fs-4 me-3" style="color: var(--accent-orange);"></i>
                            <h3 class="h5 fw-bold mb-0">{{ __($feature['title']) }}</h3>
                        </div>
                        <p class="text-secondary mb-0">{{ __($feature['desc']) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('qui-sommes-nous', ['lang' => app()->getLocale()]) }}" 
               class="btn btn-dark px-5 py-3 rounded-pill fw-bold">
                <i class="bi bi-arrow-right me-2"></i>
                {{ __('why_choose.read_more_button') }}
            </a>
        </div>
    </div>
</section>

<!-- Styles personnalisés -->
<style>
    :root {
        --primary-dark: #000000;
        --accent-orange: #fb8b43;
        --transition: all 0.3s ease;
    }
    
    .py-md-6 {
        padding-top: 5rem;
        padding-bottom: 5rem;
    }
    
    .hover-shadow:hover {
        box-shadow: 0 1rem 3rem rgba(0,0,0,0.15) !important;
    }
    
    .hover-scale {
        transition: var(--transition);
    }
    
    .hover-scale:hover {
        transform: translateY(-5px);
    }
    
    .transition {
        transition: var(--transition);
    }
    
    .object-fit-cover {
        object-fit: cover;
    }
    
    .card {
        border-radius: 1rem;
    }
    
    .btn {
        transition: var(--transition);
    }
    
    .btn:hover {
        transform: translateY(-2px);
    }
    
    .btn-dark {
        background-color: var(--primary-dark);
        border-color: var(--primary-dark);
    }
    
    .btn-dark:hover {
        background-color: #333;
        border-color: #333;
    }
    
    a.text-decoration-none .card {
        cursor: pointer;
    }
    
    .hover-link {
        transition: color 0.2s ease, transform 0.2s ease;
        display: inline-block;
    }

    .hover-link:hover {
        color: var(--accent-orange) !important;
        transform: translateX(3px);
    }
    
    /* Badge compteur */
    .badge.rounded-pill {
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    
    /* Carrousel */
    .carousel-item img {
        transition: transform 0.6s ease;
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 40px;
        height: 40px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .carousel-item img {
            height: 300px !important;
        }
        
        .rounded-circle {
            width: 100px !important;
            height: 100px !important;
        }
    }
    
    @media (max-width: 576px) {
        .carousel-item img {
            height: 250px !important;
        }
        
        .display-5 {
            font-size: 1.8rem;
        }
        
        .display-6 {
            font-size: 1.5rem;
        }
    }
</style>

@endsection