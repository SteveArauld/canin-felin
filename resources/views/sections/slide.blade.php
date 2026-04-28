{{-- sections/slide.blade.php --}}
@php
    // Récupérer l'image de fond depuis la configuration ou utiliser une valeur par défaut
    $backgroundImage = $backgroundImage ?? asset('assets/uploads/2025/12/1776887110700.png');
@endphp

<section class="hero-slide position-relative d-flex align-items-center py-5">
    <!-- Image de fond avec overlay sombre -->
    <div class="position-absolute top-0 start-0 w-100 h-100">
        <div class="position-relative w-100 h-100">
            <img src="{{ $backgroundImage }}"
                 alt="Hero Background"
                 class="w-100 h-100 object-fit-cover">
            <!-- Overlay sombre -->
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>
        </div>
    </div>

    <!-- Contenu -->
    <div class="container position-relative">
        <div class="row">
            <div class="col-12">
                <div class="text-white text-center text-lg-start py-3 py-lg-5">
                    <!-- Titre principal -->
                    <h1 class="display-1 fw-bold mb-2 mb-md-3" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.3);">
                        {{ __('hero.title_part1') }}
                        {{ __('hero.title_part2') }}
                        <span class="text-warning"> {{ __('hero.title_part3') }}</span>
                    </h1>


                    <!-- Sous-titre -->
                    <div class="mb-3 mb-md-5">
                        <p class="lead fw-bold mb-1 text-shadow">
                            {{ __('hero.subtitle_part1') }}
                        </p>
                        <p class="lead fw-bold text-shadow">
                            {{ __('hero.subtitle_part2') }}
                        </p>
                    </div>

                    <!-- Bouton -->
                    <a href="{{ route('chiens.vente', ['lang' => app()->getLocale()]) }}"
                       class="btn btn-outline-light btn-lg px-4 px-md-5 py-2 py-md-3 rounded fw-bold text-uppercase hover-scale transition">
                        <i class="bi bi-paw me-2 me-md-3"></i>
                        {{ __('hero.puppies_sale_button') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Styles pour la slide */
    .hero-slide {
        background-color: #000; /* Fallback */
        min-height: 350px; /* Hauteur réduite pour mobile */
    }

    @media (min-width: 576px) {
        .hero-slide {
            min-height: 400px;
        }
    }

    @media (min-width: 768px) {
        .hero-slide {
            min-height: 500px;
        }
    }

    @media (min-width: 992px) {
        .hero-slide {
            min-height: 600px;
        }
    }

    @media (min-width: 1200px) {
        .hero-slide {
            min-height: 700px;
        }
    }

    .object-fit-cover {
        object-fit: cover;
    }

    .text-shadow {
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
    }

    /* Bouton personnalisé */
    .btn-outline-light {
        border-width: 2px;
        backdrop-filter: blur(5px);
        background-color: rgba(255, 255, 255, 0.1);
        letter-spacing: 1px;
    }

    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.2);
        border-color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    /* Animations */
    .hover-scale {
        transition: all 0.3s ease;
    }

    .hover-scale:hover {
        transform: scale(1.05);
    }

    .transition {
        transition: all 0.3s ease;
    }

    /* ========== RESPONSIVE MOBILE - HAUTEUR RÉDUITE ========== */
    @media (max-width: 768px) {
        .hero-slide {
            min-height: 280px !important;
        }

        .display-1 {
            font-size: 2rem;
        }

        .display-2 {
            font-size: 1.75rem;
        }

        .display-3 {
            font-size: 1.5rem;
        }

        .lead {
            font-size: 0.85rem;
        }

        .btn-lg {
            padding: 0.5rem 1rem !important;
            font-size: 0.8rem !important;
        }

        .btn-lg i {
            font-size: 0.8rem;
        }
    }

    @media (max-width: 576px) {
        .hero-slide {
            min-height: 250px !important;
        }

        .display-1 {
            font-size: 1.5rem;
        }

        .lead {
            font-size: 0.7rem;
        }

        .btn-lg {
            padding: 0.4rem 0.8rem !important;
            font-size: 0.7rem !important;
        }
    }

    @media (max-width: 400px) {
        .hero-slide {
            min-height: 220px !important;
        }

        .display-1 {
            font-size: 1.2rem;
        }

        .lead {
            font-size: 0.65rem;
        }
    }
</style>

{{-- Version alternative avec slider multiple (si nécessaire) --}}
@if(isset($slides) && count($slides) > 0)
    <section class="hero-slider">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            @if(count($slides) > 1)
                <div class="carousel-indicators">
                    @foreach($slides as $index => $slide)
                        <button type="button"
                                data-bs-target="#heroCarousel"
                                data-bs-slide-to="{{ $index }}"
                                class="{{ $index === 0 ? 'active' : '' }}"
                                aria-label="Slide {{ $index + 1 }}">
                        </button>
                    @endforeach
                </div>
            @endif

            <div class="carousel-inner">
                @foreach($slides as $index => $slide)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="position-relative" style="min-height: 350px;">
                            <img src="{{ $slide['image'] }}"
                                 class="d-block w-100 h-100 object-fit-cover"
                                 alt="{{ $slide['alt'] ?? 'Slide ' . ($index + 1) }}">
                            <div class="carousel-overlay position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50"></div>

                            <div class="carousel-caption d-flex flex-column justify-content-center h-100 top-0 start-0">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 col-xl-6 text-center text-lg-start">
                                            <h2 class="display-4 fw-bold mb-3 text-white text-shadow">
                                                {{ $slide['title'] ?? '' }}
                                            </h2>
                                            <p class="lead mb-4 text-white text-shadow">
                                                {{ $slide['subtitle'] ?? '' }}
                                            </p>
                                            @if(isset($slide['button_text']) && isset($slide['button_url']))
                                                <a href="{{ $slide['button_url'] }}"
                                                   class="btn btn-outline-light btn-lg px-5 py-3 rounded fw-bold">
                                                    <i class="bi bi-paw me-2"></i>
                                                    {{ $slide['button_text'] }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if(count($slides) > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            @endif
        </div>
    </section>

    <style>
        .carousel-overlay {
            pointer-events: none;
        }

        .carousel-caption {
            bottom: 0;
            padding-bottom: 2rem;
        }

        .carousel-item {
            transition: transform 0.6s ease-in-out;
        }

        /* Hauteur réduite pour le slider sur mobile */
        @media (max-width: 768px) {
            .carousel-item .position-relative {
                min-height: 280px !important;
            }

            .carousel-caption .display-4 {
                font-size: 1.5rem;
            }

            .carousel-caption .lead {
                font-size: 0.8rem;
            }
        }

        @media (max-width: 576px) {
            .carousel-item .position-relative {
                min-height: 220px !important;
            }

            .carousel-caption .display-4 {
                font-size: 1.2rem;
            }

            .carousel-caption .lead {
                font-size: 0.7rem;
            }
        }
    </style>
@endif

{{-- Animation au scroll (optionnel) --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation d'apparition des éléments
        const heroContent = document.querySelector('.hero-slide .container');

        if (heroContent) {
            const elements = heroContent.querySelectorAll('h1, h2, h3, p, .btn');

            elements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';

                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, 100 * index);
            });
        }
    });
</script>