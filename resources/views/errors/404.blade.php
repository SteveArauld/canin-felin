@extends('layouts.app')

@section('title', 'Page non trouvée - Canin-Felin')

@push('styles')
    <style>
        .error-container {
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f5f7fa 0%, #eef2f6 100%);
        }

        .error-card {
            background: white;
            border-radius: 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .error-card:hover {
            transform: translateY(-5px);
        }

        .error-number {
            font-size: 8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #1e3a5f 0%, #2c4c7c 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1;
            letter-spacing: -0.05em;
        }

        .animal-emoji {
            font-size: 4rem;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .paw-print {
            position: absolute;
            opacity: 0.1;
            font-size: 2rem;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #1e3a5f 0%, #2c4c7c 100%);
            border: none;
            padding: 12px 30px;
            
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(30, 58, 95, 0.3);
        }

        .btn-outline-custom {
            border: 2px solid #1e3a5f;
            color: #1e3a5f;
            padding: 12px 30px;
            
            transition: all 0.3s ease;
            background: transparent;
        }

        .btn-outline-custom:hover {
            background: #1e3a5f;
            color: white;
            transform: scale(1.05);
        }

        .suggestion-card {
            background: #f8fafc;
            border-radius: 1rem;
            padding: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .suggestion-card:hover {
            background: #eef2ff;
            transform: translateX(5px);
        }

        .floating-animal {
            position: absolute;
            opacity: 0.05;
            pointer-events: none;
        }

        .floating-animal-1 { top: 10%; left: 5%; font-size: 6rem; animation: float 8s ease-in-out infinite; }
        .floating-animal-2 { bottom: 15%; right: 5%; font-size: 5rem; animation: float 6s ease-in-out infinite reverse; }
        .floating-animal-3 { top: 50%; left: 3%; font-size: 4rem; animation: float 10s ease-in-out infinite; }
        .floating-animal-4 { bottom: 30%; right: 8%; font-size: 7rem; animation: float 7s ease-in-out infinite; }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
    </style>
@endpush

@section('content')
    <div class="error-container position-relative overflow-hidden">

        <!-- Animaux flottants décoratifs -->
        <div class="floating-animal floating-animal-1">🐕</div>
        <div class="floating-animal floating-animal-2">🐈</div>
        <div class="floating-animal floating-animal-3">🦜</div>
        <div class="floating-animal floating-animal-4">🐾</div>

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <div class="error-card p-4 p-md-5 text-center">

                        <!-- Animal emoji animé -->
                        <div class="animal-emoji mb-4">🐾</div>

                        <!-- Code d'erreur -->
                        <div class="error-number mb-3">404</div>

                        <!-- Titre -->
                        <h1 class="h2 fw-bold text-dark mb-3">
                            Oups ! Page non trouvée
                        </h1>

                        <!-- Description -->
                        <p class="text-secondary mb-4">
                            On dirait que notre ami à quatre pattes a eu un peu trop d'énergie et a caché cette page !
                            La page que vous recherchez n'existe pas ou a été déplacée.
                        </p>

                        <!-- Liens d'action -->
                        <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">
                            <a href="{{ url('/') }}" class="btn btn-primary-custom text-white">
                                <i class="bi bi-house-door-fill me-2"></i>
                                Retour à l'accueil
                            </a>
                            <a href="{{ route('chiens.vente', ['lang' => app()->getLocale()]) }}" class="btn btn-outline-custom">
                                <i class="bi bi-paw me-2"></i>
                                Voir nos animaux
                            </a>
                        </div>

                        <!-- Suggestions -->
                        <div class="border-top pt-4">
                            <p class="text-muted small mb-3">
                                <i class="bi bi-lightbulb me-1"></i>
                                Voici quelques liens utiles :
                            </p>
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <div class="suggestion-card" onclick="window.location='{{ url('/') }}'">
                                        <i class="bi bi-house text-primary me-2"></i>
                                        <span class="small">Accueil</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="suggestion-card" onclick="window.location='{{ route('chiens.vente', ['lang' => app()->getLocale()]) }}'">
                                        <i class="bi bi-paw text-primary me-2"></i>
                                        <span class="small">Nos chiots</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="suggestion-card" onclick="window.location='{{ route('contact', ['lang' => app()->getLocale()]) }}'">
                                        <i class="bi bi-envelope text-primary me-2"></i>
                                        <span class="small">Nous contacter</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Message humoristique -->
                        <div class="mt-4 pt-3">
                            <p class="small text-muted">
                                <i class="bi bi-emoji-smile me-1"></i>
                                En attendant, voici une patte d'amitié virtuelle 🐾
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection