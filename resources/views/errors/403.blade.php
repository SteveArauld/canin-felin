@extends('layouts.app')

@section('title', 'Accès interdit - Canin-Felin')

@push('styles')
    <style>
        .error-container {
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
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
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1;
            letter-spacing: -0.05em;
        }

        .guard-dog {
            font-size: 5rem;
            animation: shake 0.5s ease-in-out infinite;
            display: inline-block;
        }

        @keyframes shake {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(5deg); }
            75% { transform: rotate(-5deg); }
        }

        .fence {
            display: inline-block;
            animation: fencePulse 2s ease-in-out infinite;
        }

        @keyframes fencePulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }

        .btn-danger-custom {
            background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
            border: none;
            padding: 12px 30px;
            
            transition: all 0.3s ease;
        }

        .btn-danger-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(220, 38, 38, 0.3);
        }

        .btn-outline-danger-custom {
            border: 2px solid #dc2626;
            color: #dc2626;
            padding: 12px 30px;
            
            transition: all 0.3s ease;
            background: transparent;
        }

        .btn-outline-danger-custom:hover {
            background: #dc2626;
            color: white;
            transform: scale(1.05);
        }

        .reason-card {
            background: #fef2f2;
            border-radius: 1rem;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .reason-card:hover {
            background: #fee2e2;
            transform: translateX(5px);
        }

        .floating-guard {
            position: absolute;
            opacity: 0.05;
            pointer-events: none;
        }

        .floating-guard-1 { top: 10%; left: 5%; font-size: 6rem; animation: float 8s ease-in-out infinite; }
        .floating-guard-2 { bottom: 15%; right: 5%; font-size: 5rem; animation: float 6s ease-in-out infinite reverse; }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
    </style>
@endpush

@section('content')
    <div class="error-container position-relative overflow-hidden">

        <!-- Animaux gardiens flottants -->
        <div class="floating-guard floating-guard-1">🐕‍🛡️</div>
        <div class="floating-guard floating-guard-2">🐈‍⬛🔒</div>

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <div class="error-card p-4 p-md-5 text-center">

                        <!-- Gardien animé -->
                        <div class="mb-4">
                            <span class="guard-dog">🐕‍🛡️</span>
                            <span class="fence ms-2">🚫</span>
                        </div>

                        <!-- Code d'erreur -->
                        <div class="error-number mb-3">403</div>

                        <!-- Titre -->
                        <h1 class="h2 fw-bold text-dark mb-3">
                            Accès interdit !
                        </h1>

                        <!-- Description -->
                        <p class="text-secondary mb-4">
                            Notre fidèle gardien a détecté une tentative d'entrée non autorisée.
                            Vous n'avez pas les permissions nécessaires pour accéder à cette page.
                        </p>

                        <!-- Raisons possibles -->
                        <div class="text-start mb-4">
                            <p class="small text-muted mb-2">
                                <i class="bi bi-info-circle me-1"></i>
                                Cela peut être dû à :
                            </p>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <div class="reason-card">
                                        <i class="bi bi-shield-exclamation text-danger me-2"></i>
                                        <span class="small">Compte non autorisé</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="reason-card">
                                        <i class="bi bi-clock-history text-danger me-2"></i>
                                        <span class="small">Session expirée</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="reason-card">
                                        <i class="bi bi-gear text-danger me-2"></i>
                                        <span class="small">Accès restreint</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="reason-card">
                                        <i class="bi bi-ip text-danger me-2"></i>
                                        <span class="small">IP non autorisée</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Liens d'action -->
                        <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                            <a href="{{ url('/') }}" class="btn btn-danger-custom text-white">
                                <i class="bi bi-house-door-fill me-2"></i>
                                Retour à l'accueil
                            </a>
                            <a href="{{ route('contact', ['lang' => app()->getLocale()]) }}" class="btn btn-outline-danger-custom">
                                <i class="bi bi-envelope me-2"></i>
                                Contacter le support
                            </a>
                        </div>

                        <!-- Message rassurant -->
                        <div class="border-top pt-4">
                            <p class="small text-muted">
                                <i class="bi bi-shield-check text-success me-1"></i>
                                Si vous pensez qu'il s'agit d'une erreur, contactez notre équipe.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection